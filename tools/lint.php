<?php
$base = dirname(__DIR__);
$dirs = ['app', 'bootstrap', 'config', 'routes', 'views', 'tests'];
$errors = 0;
foreach ($dirs as $dir) {
    $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($base . '/' . $dir));
    foreach ($it as $file) {
        if (!$file->isFile() || $file->getExtension() !== 'php') continue;
        $cmd = 'php -l ' . escapeshellarg($file->getPathname());
        exec($cmd, $out, $code);
        if ($code !== 0) { echo implode("\n", $out) . "\n"; $errors++; }
    }
}
echo $errors === 0 ? "PHP_LINT_OK\n" : "PHP_LINT_FAILED: $errors\n";
exit($errors === 0 ? 0 : 1);
