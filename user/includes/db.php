<?php

/**
 * PostgreSQL database layer for the crops application.
 */

function db_env(string $key): ?string
{
    $value = getenv($key);
    if (is_string($value) && $value !== '') {
        return $value;
    }

    if (isset($_ENV[$key]) && is_string($_ENV[$key]) && $_ENV[$key] !== '') {
        return $_ENV[$key];
    }

    if (isset($_SERVER[$key]) && is_string($_SERVER[$key]) && $_SERVER[$key] !== '') {
        return $_SERVER[$key];
    }

    return null;
}

function db_connection_string_from_url(string $url): string
{
    $parsed = parse_url($url);
    if ($parsed === false || empty($parsed['host'])) {
        return $url;
    }

    $parts = [
        'host=' . $parsed['host'],
    ];

    if (!empty($parsed['port'])) {
        $parts[] = 'port=' . $parsed['port'];
    }

    $path = $parsed['path'] ?? '';
    if ($path !== '' && $path !== '/') {
        $parts[] = 'dbname=' . ltrim($path, '/');
    }

    if (!empty($parsed['user'])) {
        $parts[] = 'user=' . rawurldecode($parsed['user']);
    }

    if (isset($parsed['pass'])) {
        $parts[] = 'password=' . rawurldecode((string) $parsed['pass']);
    }

    if (!empty($parsed['query'])) {
        parse_str($parsed['query'], $queryParams);
        if (!empty($queryParams['sslmode'])) {
            $parts[] = 'sslmode=' . $queryParams['sslmode'];
        }
    }

    $joined = implode(' ', $parts);
    if (!str_contains($joined, 'sslmode=')) {
        $parts[] = 'sslmode=require';
        $joined = implode(' ', $parts);
    }

    return $joined;
}

function db_connect()
{
    foreach (['DATABASE_URL', 'POSTGRES_URL', 'POSTGRES_PRISMA_URL', 'POSTGRES_URL_NON_POOLING'] as $envKey) {
        $databaseUrl = db_env($envKey);
        if ($databaseUrl === null) {
            continue;
        }

        $conn = @pg_connect($databaseUrl);
        if ($conn !== false) {
            return $conn;
        }

        $conn = @pg_connect(db_connection_string_from_url($databaseUrl));
        if ($conn !== false) {
            return $conn;
        }
    }

    return @pg_connect(db_build_connection_string());
}

function db_build_connection_string(): string
{
    $host = db_env('DB_HOST') ?? 'localhost';
    $port = db_env('DB_PORT') ?? '5432';
    $name = db_env('DB_NAME') ?? 'crops';
    $user = db_env('DB_USER') ?? 'postgres';
    $pass = db_env('DB_PASS') ?? db_env('DB_PASSWORD') ?? 'passcode2000';
    $sslmode = db_env('DB_SSLMODE') ?? '';

    $parts = [
        'host=' . $host,
        'port=' . $port,
        'dbname=' . $name,
        'user=' . $user,
        'password=' . $pass,
    ];

    if ($sslmode !== '') {
        $parts[] = 'sslmode=' . $sslmode;
    } elseif (!in_array($host, ['localhost', '127.0.0.1'], true)) {
        $parts[] = 'sslmode=require';
    }

    return implode(' ', $parts);
}

function db_connect_error_message(): string
{
    $hasUrl = db_env('DATABASE_URL') !== null || db_env('POSTGRES_URL') !== null;
    $hasParts = db_env('DB_HOST') !== null;

    if (!$hasUrl && !$hasParts) {
        return 'Database is not configured. In Vercel â†’ Settings â†’ Environment Variables, add DATABASE_URL '
            . '(from Neon, Supabase, or Vercel Postgres) for Production, then redeploy.';
    }

    return 'Could not connect to PostgreSQL. Check DATABASE_URL or DB_HOST, DB_PORT, DB_NAME, DB_USER, and DB_PASS. '
        . 'Use a cloud host with sslmode=require (localhost does not work on Vercel).';
}

function db_last_error_message($conn = null): string
{
    if (!function_exists('pg_last_error')) {
        return '';
    }

    if ($conn !== null && $conn !== false) {
        $message = pg_last_error($conn);
        return is_string($message) ? $message : '';
    }

    return '';
}

$conn = db_connect();

if ($conn === false) {
    die(db_connect_error_message());
}

/**
 * PostgreSQL lowercases unquoted identifiers; map rows to keys expected by the PHP UI.
 */
function db_normalize_row($row)
{
    if (!is_array($row)) {
        return $row;
    }

    $map = [
        'mobilenumber' => 'mobileNumber',
        'birthday' => 'birthDay',
        'birthmonth' => 'birthMonth',
        'birthyear' => 'birthYear',
        'inputsnumber' => 'inputsNumber',
        'farmerscount' => 'farmersCount',
        'inputscount' => 'inputsCount',
        'officerscount' => 'officersCount',
        'messagecount' => 'messageCount',
    ];

    $normalized = [];
    foreach ($row as $key => $value) {
        $lower = strtolower((string) $key);
        $normalized[$map[$lower] ?? $key] = $value;
    }

    return $normalized;
}

function db_adapt_sql($sql)
{
    $sql = preg_replace('/\bfrom\s+user\b/i', 'FROM "user"', $sql);
    $sql = preg_replace('/\binto\s+user\b/i', 'INTO "user"', $sql);
    $sql = preg_replace('/\bupdate\s+user\b/i', 'UPDATE "user"', $sql);
    $sql = preg_replace('/\bjoin\s+user\b/i', 'JOIN "user"', $sql);

    $camelIdentifiers = [
        'mobileNumber',
        'birthDay',
        'birthMonth',
        'birthYear',
        'inputsNumber',
    ];

    foreach ($camelIdentifiers as $identifier) {
        $sql = preg_replace(
            '/(?<!")' . preg_quote($identifier, '/') . '(?!")/i',
            '"' . $identifier . '"',
            $sql
        );
    }

    // Preserve camelCase column aliases (PostgreSQL lowercases unquoted AS names).
    $sql = preg_replace_callback(
        '/\bas\s+([a-zA-Z_][a-zA-Z0-9]*)\b/i',
        static function (array $matches): string {
            $alias = $matches[1];
            if (str_contains($alias, '"') || !preg_match('/[A-Z]/', $alias)) {
                return $matches[0];
            }

            return 'AS "' . $alias . '"';
        },
        $sql
    );

    return $sql;
}

class DbResultSet implements Countable, IteratorAggregate
{
    private array $rows = [];
    private int $position = 0;

    public function __construct($pg_result)
    {
        if ($pg_result === false) {
            return;
        }

        while ($row = pg_fetch_assoc($pg_result)) {
            $this->rows[] = db_normalize_row($row);
        }
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->rows);
    }

    public function count(): int
    {
        return count($this->rows);
    }

    public function first()
    {
        if ($this->rows === []) {
            return false;
        }

        return $this->rows[0];
    }

    public function fetchAssoc()
    {
        if ($this->position >= count($this->rows)) {
            return false;
        }

        return $this->rows[$this->position++];
    }
}

function db_query($conn, $sql)
{
    if ($conn === false || $conn === null) {
        return false;
    }

    $result = @pg_query($conn, db_adapt_sql($sql));

    if ($result === false) {
        return false;
    }

    $command = strtoupper(strtok(ltrim($sql), " \t\n\r"));

    if ($command === 'SELECT' || $command === 'WITH' || $command === 'SHOW') {
        return new DbResultSet($result);
    }

    return $result;
}

function db_escape($conn, $value)
{
    if ($conn === false || $conn === null) {
        return addslashes((string) $value);
    }

    return pg_escape_string($conn, (string) $value);
}

function db_fetch_array($result)
{
    if ($result instanceof DbResultSet) {
        return $result->first();
    }

    if ($result === false) {
        return false;
    }

    $row = pg_fetch_array($result, null, PGSQL_BOTH);

    return $row ? db_normalize_row($row) : false;
}

function db_fetch_assoc($result)
{
    if ($result instanceof DbResultSet) {
        return $result->fetchAssoc();
    }

    if ($result === false) {
        return false;
    }

    $row = pg_fetch_assoc($result);

    return $row ? db_normalize_row($row) : false;
}

function db_num_rows($result)
{
    if ($result instanceof DbResultSet) {
        return $result->count();
    }

    if ($result === false) {
        return 0;
    }

    return pg_num_rows($result);
}
