<?php

namespace ItechSup\AutoLaoder;

class ClassLoader
{

    private $listPrefix;

    public function register()
    {
        spl_autoload_register(array($this, 'loadClass'));
    }

    public function addPrefix($prefix)
    {
        $this->listPrefix [] = $prefix;
    }

    public function loadClass($className)
    {
        $file = str_replace("\\", DIRECTORY_SEPARATOR, $className);
        $file .= ".php";
        foreach ($this->listPrefix as $prefix) {
            $this->requireFile($prefix . $file);
        }
    }

    private function requireFile($file)
    {
        $isRequire = false;
        if (file_exists($file)) {
            require_once $file;
            $isRequire = true;
        }
        return $isRequire;
    }

}
