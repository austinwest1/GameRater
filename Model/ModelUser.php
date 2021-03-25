<?php
require_once($path.'/Request/userDAO.php');

class User implements \JsonSerializable {
  // Properties
  private $user_id;
  private $username;
  private $first_name;
  private $last_name;
  private $password;

  // Methods
  function __construct() {
  }
  function getUserId(){
    return $this->user_id;
  }
  function setUserId($user_id){
    $this->user_id = $user_id;
  }
  function getUsername() {
    return $this->username;
  }
  function setUsername($username2){
    $this->username = $username2;
  }
  function getFirstName() {
    return $this->first_name;
  }
  function setFirstName($first_name){
    $this->first_name = $first_name;
  }
  function getLastName() {
    return $this->last_name;
  }
  function setLastName($last_name){
    $this->last_name = $last_name;
  }
  function setPassword($password2){
    $this->password = hash("sha256", trim($password2));
  }
  function getPassword(){
    return $this->password;
  }

  function getUser($user_id){
    $this->user_id = $user_id;
    $userDAO = new userDAO();
    $userDAO->getUser($this);
    return $this;
  }

  function createUser(){
    $userDAO = new userDAO();
    $userDAO->createUser($this);
  }

  function deleteUser($username2){
    $userDAO = new userDAO();
    $userDAO->deleteUser($username2);
  }

  function checkLogin($username2, $password2){
    $userDAO = new userDAO();
    return $userDAO->checkLogin($username2, $password2);
  }

  public function jsonSerialize(){
      $vars = get_object_vars($this);
      return $vars;
  }
}
?>