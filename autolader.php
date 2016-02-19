<?php

// src/Autoloader/NamespaceAutoloader.php

class Loader
{

    protected $namespacesMap = array();

    public function addNamespace($namespace, $rootDir)
    {
        if (is_dir($rootDir)) {
            $this->namespacesMap[$namespace] = $rootDir;
            //return true;
        }

        //return false;
        return $this;
    }

    public function register()
    {
        spl_autoload_register(array($this, 'autoload'));
        return $this;
    }

    protected function autoload($class)
    {

        $pathParts = explode('\\', $class);

        if (is_array($pathParts)) {
            $namespace = array_shift($pathParts);
            if (!empty($this->namespacesMap[$namespace])) {
                $filePath = $this->namespacesMap[$namespace] . '/' . implode('/', $pathParts) . '.php';

                require_once $filePath;
                return true;
            }
        }

        return false;
    }

}