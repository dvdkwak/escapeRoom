<?php


  // Remove group controller

  // user must be logged in to do so
  $user = new User;
  $user->lock("login", "remove/".$page['id']);

  // get the id and try to remove the group by that id
  $group = new Group($page['id']);
  $group->delete();

  $user->move("/beheer");
