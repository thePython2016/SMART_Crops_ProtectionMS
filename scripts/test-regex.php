<?php
$c = file_get_contents(dirname(__DIR__) . '/user/farmers.php');
$header = "<?php\nrequire_once __DIR__ . '/includes/auth_guard.php';\n";
$pattern = '/^\s*<\?php\s*\R+\s*session_start\s*\(\s*\)\s*;\s*\R+if\s*\(\s*!isset\s*\(\s*\$_SESSION\s*\[\s*[\'"]username[\'"]\s*\]\s*\)\s*\)\s*\{.*?\}\s*\R+\?>\s*\R*/s';
$r = preg_replace($pattern, $header, $c, 1, $n);
echo "n=$n changed=" . ($r !== $c ? 'yes' : 'no') . "\n";
if ($n === 0) {
    echo "First 200 bytes hex:\n";
    echo bin2hex(substr($c, 0, 200)) . "\n";
}
