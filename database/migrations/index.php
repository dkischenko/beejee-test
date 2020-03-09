<?php

require("../../vendor/autoload.php");
$dbConfig = include ('../../config/db.php');

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

$capsule = new Capsule();
$capsule->addConnection($dbConfig);

$capsule->setAsGlobal();
$capsule->bootEloquent();

Capsule::schema()->dropIfExists('tasks');
Capsule::schema()->create('tasks', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->string('username');
    $table->string('email');
    $table->text('text');
    $table->boolean('done')->default(0);
    $table->dateTime('created_at');
    $table->dateTime('updated_at');
});
