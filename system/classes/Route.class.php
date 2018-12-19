<?php

// Class Route to create routes and get the right view, models and controller

class Route
{

  // ** PROPERTIES **

  private $routes; // This is the "route container" -> this keeps track of all routes


  // ** METHODS **

  // add($path, $view, $controller) => Boolean
  // This will add the route to the route container
  public function add($path = "home", $view = "home.view.html", $controller = NULL)
  {
    $this->routes[] = array(
      "route" => $path,
      "view" => $view,
      "controller" => $controller
    );
  } // End of add();


  // createPage() => $data[];
  // This will return the right route and thus the riht files to load
  public function createPage($urlParams, $url)
  {
    foreach($this->routes AS $key => $route){ // Foreach route
      $uri_path = explode("/", $route['route']); // create an array with all route params
      if(count($uri_path) === count($urlParams)){ // When the user given route and the existing route have the same amount of items
        $values = array(); // Route url where the variablese are replaced with the given ones
        foreach($uri_path AS $keyUri => $val){ // Replace variables in the url
          if(preg_match('/{([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)}/', $val)){
            $values[] = $urlParams[$keyUri]; // Set the variable to the user input
            $varKey = str_replace("{", "", $val);
            $varKey = str_replace("}", "", $varKey);
            $this->routes[$key][$varKey] = $urlParams[$keyUri];
          }else{
            $values[] = $val;
          }
        }
        $checkUrl = implode("/", $values);
        if($checkUrl === $url){
          $data = $this->routes[$key];
          return $data;
        }
      }
    }
    // When no key is set give the standard 404 error
    $data = array( // Set the data to the 404
      'route' => '404',
      'model' => '404.php',
      'view' => '404.php'
    );
    return $data;
  } // End of createPage();


} // End of class Route
