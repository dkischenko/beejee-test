<?php
use Illuminate\Database\Capsule\Manager as Capsule;

require("vendor/autoload.php");
$dbConfig = include ('config/db.php');
$appConfig = include('config/app.php');


$capsule = new Capsule();
$capsule->addConnection($dbConfig);

$capsule->setAsGlobal();
$capsule->bootEloquent();


$layout = "/views/layouts/task.php";
require_once __DIR__ . "/init.php";

\App\Controllers\TaskController::saveTask($_POST);