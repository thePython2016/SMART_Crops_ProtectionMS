<?php

declare(strict_types=1);

/**
 * Map PostgreSQL unique / duplicate-key errors to form field flash messages.
 */

function db_pg_error_is_unique_violation(string $message): bool
{
    if ($message === '') {
        return false;
    }

    $lower = strtolower($message);

    return str_contains($lower, 'duplicate key')
        || str_contains($lower, 'unique constraint')
        || (str_contains($lower, 'already exists') && str_contains($lower, 'key'));
}

/**
 * Extract column names from DETAIL: Key ("col")=(...) or Key (a, b)=(...).
 *
 * @return list<string>
 */
function db_pg_duplicate_key_columns(string $message): array
{
    $detail = $message;
    if (preg_match('/DETAIL:\s*(.+)/is', $message, $m)) {
        $detail = trim($m[1]);
    }

    if (!preg_match('/Key\s*\(([^)]+)\)/i', $detail, $keyMatch)) {
        return [];
    }

    $inner = $keyMatch[1];
    $parts = preg_split('/\s*,\s*/', $inner);
    $columns = [];

    foreach ($parts as $part) {
        $part = trim($part, " \t\n\r\"'");
        if ($part !== '') {
            $columns[] = $part;
        }
    }

    return $columns;
}

function app_duplicate_message_for_column(string $columnLower): string
{
    return match ($columnLower) {
        'mobilenumber' => 'This mobile number is already registered.',
        'email' => 'This email address is already in use.',
        'inputsnumber' => 'An agro input with this number already exists.',
        'id' => 'This message ID was already used. Refresh the page to generate a new ID.',
        default => 'This value already exists in the system.',
    };
}

/**
 * @param array<string, string> $columnToFormField lowercase DB column => HTML name attribute
 */
function app_flash_from_pg_insert_error(string $pgMessage, array $columnToFormField, string $genericMessage): void
{
    require_once __DIR__ . '/flash.php';

    if (!db_pg_error_is_unique_violation($pgMessage)) {
        app_flash_error($genericMessage);
        return;
    }

    $cols = db_pg_duplicate_key_columns($pgMessage);
    $fieldErrors = [];

    foreach ($cols as $col) {
        $key = strtolower((string) $col);
        if (isset($columnToFormField[$key])) {
            $field = $columnToFormField[$key];
            $fieldErrors[$field] = app_duplicate_message_for_column($key);
        }
    }

    if ($fieldErrors !== []) {
        app_flash_field_errors($fieldErrors);
        return;
    }

    app_flash_error('This record already exists. Please use different values.');
}
