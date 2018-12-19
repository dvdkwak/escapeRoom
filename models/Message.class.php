<?php



  // error class to create and remember errors.
  // errors are stored in the session['errors'] variable

class Message
{

  // ** PROPERTIES **
  private $id; // to store the location in the session errors array (starting at zero)
  private $text; // text to explain the error


  // ** METHODS **

  // constructor
  public function __construct($text = null)
  {
    if(!is_array($_SESSION['messages'])){
      $_SESSION['messages'] = [];
    }
    return $this->setText($text);
  } // end of __construct()


  // method to save the error to $_SESSION['errors']
  public function save()
  {
    if(!empty($this->text)){
      if(!in_array($this->text, $_SESSION['messages'])){
        $_SESSION['messages'][] = $this->text;
      }
      return true;
    }
    return false;
  } // end of save()

  // function to clear the messages from the session
  public function clear()
  {
    unset($_SESSION['messages']);
    return true;
  }



  // ** SETTERS **

  public function setId($id = null)
  {
    if(isset($id)){
      $this->id = $id;
      return true;
    }
    return false;
  } // end of setId()

  public function setText($text = null)
  {
    if(isset($text)){
      $this->text = $text;
      return true;
    }
    return false;
  } // end of setText()

  // ** GETTERS **

  public function getId()
  {
    return $this->id;
  }

  public function getText()
  {
    return $this->text;
  }

} // end of the error class
