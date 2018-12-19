<?php

// session start to make use of the User class
session_start();

// Setting the global url variable
if(!empty($_GET['url'])){
  $url = $_GET['url'];
}else{
  $url = "home";
}

// setting the $urlParams variable
$urlParams = explode("/", trim($url, "/"));

// Defining the global variable url
define("URL", $url, true);

// Defining the global variable $urlParams
define("URL_PARAMS", $urlParams, true);

// Defining the root folder
$root = __DIR__;
$root = $root."/../../";
define("ROOT", $root, true);

// Basic includes and running autoloader
include_once ROOT."system/functions/autoloader.php";
