<?php
namespace loader;

class ClassLoader {
    private string $prefix;
    private string $base_dir;

    public function __construct(string $prefix, string $base_dir) {
        $this->prefix = $prefix;
        $this->base_dir = rtrim($base_dir, '/') . '/';
    }

    public function loadClass(string $classname): void {
        $len = strlen($this->prefix);
        if (strpos($classname, $this->prefix) !== 0) {
            return;
        }

        $relative_class = substr($classname, $len);
        $file = $this->base_dir . str_replace('\\', '/', $relative_class) . '.php';

        if (is_file($file)) {
            require_once $file;
        }
    }

    public function register(): void {
        spl_autoload_register([$this, 'loadClass']);
    }
}