<?php
  // Including the main configuration file
  include_once "system/config/config.php";
  $route = new Route;

  // ____________________________ THE ROUTES _________________________________

  // home route to enter the codes
  $route->add("home", "home.view.php", "home.controller.php");

  // admin route to administrate groups and codes for the groups
  $route->add("beheer", "admin.view.php", "admin.controller.php");

  // login route
  $route->add("login", "login.view.php", "login.controller.php");

  // route to remove a group by id
  $route->add("remove/{id}", "", "removeGroup.controller.php");

  // route to validate the submitted code by a group
  $route->add("validate", "validate.view.php", "validate.controller.php");





  // for php lesson
  $route->add("php", "php.view.php");

  // _________________________________________________________________________

  // Here the page will be generated
  $page = $route->createPage(URL_PARAMS, URL);

  // including the right controller if set
  if(isset($page['controller']) && !empty($page['controller']))
  include_once ROOT."controllers/".$page['controller'];

  // including the right view and showing it if set
  if(isset($page['view']) && !empty($page['view'])){
    include_once ROOT."views/DOM/".$page['view'];
  }
?>
