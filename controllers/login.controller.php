<?php

// Login controller

// creating an user object
$user = new User;

// if username and password are set try to login the user
if(isset($_POST['username']) && isset($_POST['password'])){
  $user->login($_POST['username'], $_POST['password']);
  $user->move(); // on succes move back to the page we came from
}

?>
