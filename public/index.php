<?php
session_start();

require __DIR__ . '/../autoload.php';
require __DIR__ . '/../secure.php';
require __DIR__ . '/../app.php';
require __DIR__ . '/../config.php';

$app = new App();
$secure = new Secure();

echo $secure->secureApp($app);

?>