<?php
use Illuminate\Database\Capsule\Manager as Capsule;

require("vendor/autoload.php");
$dbConfig = include ('config/db.php');
$appConfig = include('config/app.php');


$capsule = new Capsule();
$capsule->addConnection($dbConfig);

$capsule->setAsGlobal();
$capsule->bootEloquent();


$layout = "/views/layouts/auth.php";
require_once __DIR__ . "/init.php";

if (!\App\Controllers\AuthController::auth($_POST, $appConfig) && $_POST) {
    require_once "views/errors/error.php";
} else if (\App\Controllers\AuthController::auth($_POST, $appConfig) && $_POST){
    page_redirect('/');
}