<?php
require __DIR__ . "./../sys/Psr4AutoloaderClass.php";


$loader = new Psr4AutoloaderClass();
$loader->register();

$loader->addNamespace("Core\\", __DIR__ );
$loader->addNamespace("App\\", __DIR__ . "/../App");
$loader->addNamespace("sys\\", __DIR__ . "/../sys");

$app = new App\App();


$app->run();


?>