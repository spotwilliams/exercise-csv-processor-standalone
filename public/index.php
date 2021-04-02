<?php
define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));

require __DIR__ . '/../autoload.php';
require __DIR__ . '/../app.php';

$app = new App();

echo $app->execute();

?>