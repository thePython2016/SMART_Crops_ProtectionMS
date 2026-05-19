<?php

/**
 * PostgreSQL database layer for the crops application.
 */

$db_host = getenv('DB_HOST') ?: 'localhost';
$db_port = getenv('DB_PORT') ?: '5432';
$db_name = getenv('DB_NAME') ?: 'crops';
$db_user = getenv('DB_USER') ?: 'postgres';
$db_pass = getenv('DB_PASS') ?: 'passcode2000';

$conn_string = sprintf(
    'host=%s port=%s dbname=%s user=%s password=%s',
    $db_host,
    $db_port,
    $db_name,
    $db_user,
    $db_pass
);

$conn = @pg_connect($conn_string);

if ($conn === false) {
    die('Could not connect to PostgreSQL: ' . (function_exists('pg_last_error') ? pg_last_error() : 'connection failed'));
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
