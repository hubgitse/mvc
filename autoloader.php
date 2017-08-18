<?php

spl_autoload_register(function ($class) {
    // \\Some\\NameSpace --> "Some/NameSpace.php"
    $path = preg_replace('#\\\#', '/', $class);

    require $path.'.php';
});