<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Delight\Auth\Auth;

require("vendor/autoload.php");
$dbConfig = include('config/db.php');
$appConfig = include('config/app.php');


$capsule = new Capsule();
$capsule->addConnection($dbConfig);

$capsule->setAsGlobal();
$capsule->bootEloquent();


$layout = "/views/layouts/logout.php";
require_once __DIR__ . "/init.php";

\App\Controllers\AuthController::logout();
page_redirect('/');