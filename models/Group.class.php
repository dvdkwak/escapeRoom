<?php


// This class will create group objects with all data and methods for groups

class Group extends db
{

  // **PROPERTIES**
  public $id;
  private $name;
  private $code1;
  private $code2;
  private $code3;
  private $answer;
  private $output;


  // **METHODS**


  // constuct will load all group data by id
  function __construct($id = null)
  {
    if(isset($id) && !empty($id)){
      $this->id = $id;
      return $this->getById($id);
    }
    return false;
  }


  // function to set data by id of a group
  public function getById($id)
  {
    if(isset($id) && !empty($id)){
      $mysqli = $this->connect();
      $id = $mysqli->real_escape_string($id);
      $q = "SELECT * FROM `tbl_groups` WHERE `id` = '$id'";
      $result = $mysqli->query($q);
      if($result->num_rows === 1){
        $data = $result->fetch_assoc();
        $this->setName($data['name']);
        $this->setCode($data['code1'], "1");
        $this->setCode($data['code2'], "2");
        $this->setCode($data['code3'], "3");
        $this->setAnswer($data['answer']);
        $this->setOutput($data['output']);
        return true;
      }
    }
    return false;
  }

  // function to set data by name of a group
  public function getByName($name)
  {
    if(isset($name) && !empty($name)){
      $mysqli = $this->connect();
      $name = $mysqli->real_escape_string($name);
      $q = "SELECT * FROM `tbl_groups` WHERE `name` = '$name'";
      $result = $mysqli->query($q);
      if($result->num_rows === 1){
        $data = $result->fetch_assoc();
        $this->id = $data['id'];
        $this->setName($data['name']);
        $this->setCode($data['code1'], "1");
        $this->setCode($data['code2'], "2");
        $this->setCode($data['code3'], "3");
        $this->setAnswer($data['answer']);
        $this->setOutput($data['output']);
        return true;
      }
    }
    return false;
  }

  // function to write this group to the database as a new group
  public function save()
  {
    if(empty($this->name) || empty($this->code1) || empty($this->code2) || empty($this->code3) || empty($this->answer) || empty($this->output)){
      return false;
    }
    // creating the mysqli object
    $mysqli = $this->connect();
    // real escape string on everything to prevent sql injection
    $name = $mysqli->real_escape_string($this->name);
    $code1 = $mysqli->real_escape_string($this->code1);
    $code2 = $mysqli->real_escape_string($this->code2);
    $code3 = $mysqli->real_escape_string($this->code3);
    $answer = $mysqli->real_escape_string($this->answer);
    $output = $mysqli->real_escape_string($this->output);
    $q = "INSERT INTO `tbl_groups` (`name`, `code1`, `code2`, `code3`, `answer`, `output`) VALUES ('$name', '$code1', '$code2', '$code3', '$answer', '$output')";
    $result = $mysqli->query($q);
    if($result){
      return true; // $result has a value
    }
    return false; // result went wrong
  }

  // function to remove this group from the database
  public function delete()
  {
    // when id not set dont remove anything
    if(empty($this->id)){
      return false;
    }
    // here we start removing stuff
    $mysqli = $this->connect();
    $id = $mysqli->real_escape_string($this->id);
    $q = "DELETE FROM `tbl_groups` WHERE `id` = '$id'";
    $result = $mysqli->query($q);
    if($result){
      return true; // we removed the item
    }
    return false; // something went wrong
  }

  // function to validate the group (Groupname and answer must be set)
  public function validate()
  {
    if(!empty($this->name) && !empty($this->answer)){
      // checking if the answer given by the user is the same as the group's answer from the db
      $controlObject = new Group;
      $controlObject->getByName($this->name);
      if($controlObject){
        if($controlObject->getAnswer() === $this->getAnswer()){
          return true;
        }
      }
    }
    return false;
  }


  // **SETTERS**

  public function setName($name)
  {
    $this->name = $name;
  }

  // setting the code ([code], [number of the code])
  public function setCode($code, $num)
  {
    switch($num)
    {
      case "1":
        $this->code1 = $code;
        break;
      case "2":
        $this->code2 = $code;
        break;
      case "3":
        $this->code3 = $code;
        break;
      default:
        return false;
        break;
    }
  }

  public function setAnswer($answer)
  {
    $this->answer = $answer;
  }

  public function setOutput($output)
  {
    $this->output = $output;
  }



  // **GETTERS**

  public function getName()
  {
    return $this->name;
  }

  // returns code 1, 2 or 3
  public function getCode($num)
  {
    switch($num)
    {
      case "1":
        return $this->code1;
        break;
      case "2":
        return $this->code2;
        break;
      case "3":
        return $this->code3;
        break;
      default:
        return false;
        break;
    }
  }

  public function getAnswer()
  {
    return $this->answer;
  }

  public function getOutput()
  {
    return $this->output;
  }

}
