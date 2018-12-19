<?php

  // validate controller

  // user object
  $user = new User;


  // if anything is not set return to the home
  if(!isset($_POST['nr1']) || !isset($_POST['nr2']) || !isset($_POST['nr3']) || !isset($_POST['groupName'])){
    $message = new Message;
    $message->setText("Je hebt niet alle velden ingevult...");
    $message->save();
    $user->move("/home");
  }

  // here we got input, now we are gona validate teh given code and group
  $group = new Group;
  $group->setName($_POST['groupName']);
  $group->setAnswer($_POST['nr1'].$_POST['nr2'].$_POST['nr3']);
  if($group->validate()){
    $groupControle = new Group;
    $groupControle->getByName($group->getName());
    $message = new Message;
    $message->setText("Gefeliciteerd!<br><br>Jullie code is ".$groupControle->getOutput()."!");
    $message->save();
    $merryChristmas = new Message;
    $merryChristmas->setText("Het team It, Media & Games wenst u prettige feestdagen!");
    $merryChristmas->save();
  }else{
    $message = new Message;
    $message->setText("De code was onjuist!");
    $message->save();
  }
