<?php
use Illuminate\Database\Capsule\Manager as Capsule;

require("vendor/autoload.php");
$dbConfig = include ('config/db.php');
$appConfig = include('config/app.php');


$capsule = new Capsule();
$capsule->addConnection($dbConfig);

$capsule->setAsGlobal();
$capsule->bootEloquent();


$layout = "/views/layouts/edit.php";
require_once __DIR__ . "/init.php";

if (!isset($_SESSION['login'])) {
    page_redirect('/auth.php');
}

$id = (int)$_GET['id'];
$task = \App\Models\Task::getTask($id);

if ($_POST) {
    \App\Controllers\TaskController::editTask($_POST, $task);
}