<?php

  // admin controller

  // creating the user object and check if the user has been logged in
  $user = new User;
  $user->lock("/login", "/beheer");

  // if logout is in the get then we log the user out
  if(isset($_GET['logout'])){
    $user->logout();
    $user->move("/home");
  }

  // if submit is pressed to save a group, then we do:
  if(isset($_POST['save'])){
    $group = new Group();
    $group->setName($_POST['name']);
    $group->setCode($_POST['code1'], 1);
    $group->setCode($_POST['code2'], 2);
    $group->setCode($_POST['code3'], 3);
    $group->setAnswer($_POST['answer']);
    $group->setOutput($_POST['output']);
    $group->save();
  }


  // Calling all groups into objects in the groups array
  // so array groups = [group1, group2, group3, etc]
  $db = new db;
  $mysqli = $db->connect();
  $q = "SELECT `id` FROM `tbl_groups`";
  $result = $mysqli->query($q);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      $ids[] = $row['id'];
    }
    foreach($ids AS $id){
      $groups[] = new Group($id);
    }
  }else{
    $groups = array();
  }
