<?php


class db
{

  // PROPERTIES
  private $host     = "127.0.0.1";
  private $username = "root";
  private $password = "root";
  private $database = "escapeRoom";
  private $port     = "3306";



  // METHODS

  public function connect()
  {
    $mysqli = new mysqli($this->host, $this->username, $this->password, $this->database);
    return $mysqli;
  } // end of connect();


} // End of class
