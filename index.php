<?php
session_start();
error_reporting(E_ALL);

ini_set('display_errors', 'on');

require 'Autoloader.php';
require 'Route.php';

Autoloader::register();

Route::execute();

