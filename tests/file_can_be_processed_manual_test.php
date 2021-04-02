<?php

include 'autoload.php';

error_reporting(E_ALL);

$processor = new \FileProcessor\Services\FileProcessor(
    new \FileProcessor\Repositories\ProductWriteRepository()
);


$processor->loadFile(__DIR__ . '/example.csv');

