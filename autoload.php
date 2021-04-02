<?php

spl_autoload_register(function ($class) {
    $class = str_replace('FileProcessor\\','',$class);
    $class = str_replace('App\\','',$class);

    $path = (implode(
            "/",
            explode("\\", $class)
        )
    );

    $roots = [
        'src/',
        'app/',
    ];

    foreach ($roots as $root) {
        $file = '../' . $root. $path . '.php';

        if (file_exists("$file")) {
            require_once $file;

            return true;
        }
    }


    foreach ($roots as $root) {
        $file = $root. $path . '.php';

        if (file_exists("$file")) {
            require_once $file;

            return true;
        }
    }

    return false;
});

