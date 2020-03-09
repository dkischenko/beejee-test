<?php
use App\Helpers\Session;

require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/helpers/functions.php";

Session::startSession();

require_once __DIR__ . "{$layout}";