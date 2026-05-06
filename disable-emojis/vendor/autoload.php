<?php

spl_autoload_register(static function (string $class): void {
    $prefixes = [
        'RyanHellyer\\DisableEmojis\\Vendor\\Psr\\Container\\' => __DIR__ . '/psr/container/src/',
        'RyanHellyer\\DisableEmojis\\Vendor\\Inpsyde\\Modularity\\' => __DIR__ . '/inpsyde/modularity/src/',
    ];
    foreach ($prefixes as $prefix => $baseDir) {
        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) !== 0) {
            continue;
        }
        $file = $baseDir . str_replace('\\', '/', substr($class, $len)) . '.php';
        if (file_exists($file)) {
            require $file;
            return;
        }
    }
});
