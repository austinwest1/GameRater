<?php
require_once($path.'/Request/gameDAO.php');

class Game implements \JsonSerializable {
  // Properties
  private $userLog;
  private $gameID;
  private $gameName;
  private $gameDescription;
  private $gameRating;

  // Methods
  function __construct() {
  }
  function getGameID(){
    return $this->gameID;
  }
  function setGameID($Game_ID){
    $this->gameID = $Game_ID;
  }
  function getUserLog(){
    return $this->userLog;
  }
  function setUserLog($userLogPassed){
    $this->userLog = $userLogPassed; 
  }
  function getGameName(){
    return $this->gameName;
  }
  function setGameName($gameNamePassed){
    $this->gameName = $gameNamePassed;
  }
  function getGameDescription(){
    return $this->gameDescription;
  }
  function setGameDescription($gameDescriptionPassed){
    $this->gameDescription= $gameDescriptionPassed;
  }
  function getGameRating(){
    return $this->gameRating;
  }
  function setGameRating($gameRatingPassed){
    $this->gameRating = $gameRatingPassed;
  }

  function getAllGames(){
    $gameDAO = new GameDAO();
    $games = $GameDAO->getGames();
    return $games;
  }
  function getMyGames($user_id){
    $gameDAO = new GameDAO();
    $games = $gameDAO->getMyGames($user_id);
    return $games;
  }

  function createGame(){
    $gameDAO = new GameDAO();
    $gameDAO->createGame($this);
  }

  function deleteGame($gameID,$username2){
    $gameDAO = new GameDAO();
    $result = $gameDAO->deleteGame($gameID,$username2);
    return $result;
  }

  public function jsonSerialize(){
      $vars = get_object_vars($this);
      return $vars;
  }
}
?>