$ErrorActionPreference = 'Stop'
$root = Split-Path -Parent $PSScriptRoot

$replacements = @{
    'user'     = "<?php`r`nrequire_once __DIR__ . '/includes/auth_guard.php';`r`n"
    'farmer'   = "<?php`r`nrequire_once __DIR__ . '/auth_guard.php';`r`n"
    'officers' = "<?php`r`nrequire_once __DIR__ . '/auth_guard.php';`r`n"
}

foreach ($dir in $replacements.Keys) {
    $prefix = $replacements[$dir]
    Get-ChildItem -Path (Join-Path $root $dir) -Filter '*.php' -File | ForEach-Object {
        $name = $_.Name
        if ($name -in @('dashboardScripts.php', 'auth_guard.php')) { return }
        $path = $_.FullName
        $content = [IO.File]::ReadAllText($path)
        if ($content -notmatch 'session_start\s*\(') { return }
        if ($path -match 'PHPMailer') { return }

        $updated = $content

        $legacy = '(?s)^<\?php\s*session_start\s*\(\s*\)\s*;\s*if\s*\(\s*!isset\s*\(\s*\$_SESSION\s*\[\s*[''"]username[''"]\s*\]\s*\)\s*\)\s*\{.*?\}\s*\?>'
        $updated = [regex]::Replace($updated, $legacy, '', 1)

        $updated = [regex]::Replace($updated, '^(<\?php)\s*session_start\s*\(\s*\)\s*;\s*', ($prefix.TrimEnd() + "`r`n"), 1)

        if ($updated -eq $content) {
            Write-Warning "No change: $path"
            return
        }

        if ($updated -match 'session_start\s*\(') {
            Write-Warning "Still has session_start: $path"
        }

        [IO.File]::WriteAllText($path, $updated)
        Write-Host "Updated: $path"
    }
}
