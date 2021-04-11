<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require_once($path . '/Request/gameDAO.php');


class Game implements \JsonSerializable
{
  // Properties
  private $userLog;
  private $gameID;
  private $gameName;
  private $gameDescription;
  private $gameRating;
  private $pictureLink;
  private $gameUpVotes;

  // Methods
  function __construct()
  {
  }
  function getGameID()
  {
    return $this->gameID;
  }
  function setGameID($Game_ID)
  {
    $this->gameID = $Game_ID;
  }
  function getUserLog()
  {
    return $this->userLog;
  }
  function setUserLog($userLogPassed)
  {
    $this->userLog = $userLogPassed;
  }
  function getGameName()
  {
    return $this->gameName;
  }
  function setGameName($gameNamePassed)
  {
    $this->gameName = $gameNamePassed;
  }
  function getGameDescription()
  {
    return $this->gameDescription;
  }
  function setGameDescription($gameDescriptionPassed)
  {
    $this->gameDescription = $gameDescriptionPassed;
  }
  function getGameRating()
  {
    return $this->gameRating;
  }
  function setGameRating($gameRatingPassed)
  {
    $this->gameRating = $gameRatingPassed;
  }
  function setGamePicture($pictureLink)
  {
    $this->pictureLink = $pictureLink;
  }

  function getGamePicture()
  {
    return $this->pictureLink;
  }

  function setGameUpVotes($upVotes)
  {
    $this->gameUpVotes = $upVotes;
  }

  function getGameUpVotes()
  {
    return $this->gameUpVotes;
  }
  function getAllGames()
  {
    $gameDAO = new GameDAO();
    $games = $gameDAO->getGames();
    return $games;
  }
  function getMyGames($user_id)
  {
    $gameDAO = new GameDAO();
    $games = $gameDAO->getMyGames($user_id);
    return $games;
  }


  function createGame()
  {
    $gameDAO = new GameDAO();
    $gameDAO->createGame($this);
  }

  function updateGame()
  {
    $gameDAO = new GameDAO();
    $gameDAO->updateGame($this);
  }

  function deleteGame($gameID, $username2)
  {
    $gameDAO = new GameDAO();
    $result = $gameDAO->deleteGame($gameID, $username2);
    return $result;
  }

  /************************************************************************Sorted Functionality Begin */
  /*
  * The sorted functions both take in a choice for the column to be sorted on, and a upDown direction for 
  * Ascending order or Descending Order. ['MyGamesSorted' version takes a userId as well]
  * For Choice:  (1,gameName)  (2,gameDescription) (3,gameRating) (4,gameUser) (5,GameUpVotes)
  * For upDown:  (0, Descending) (1,Ascending)
  */
  function getAllGamesSorted($choice, $upDown)
  {
    $chosen = "gameId";
    $direction = "DESC";
    switch ($choice) {
      case 1:
        $chosen = "gameName";
        break;
      case 2:
        $chosen = "gameDescription";
        break;
      case 3:
        $chosen = "gameRating";
        break;
      case 4:
        $chosen = "gameUser";
        break;
      case 5:
        $chosen = "gameUpVotes";
        break;
    }
    if ($upDown) {
      $direction = " ";
    }
    $gameDAO = new GameDAO();
    $games = $gameDAO->getGamesSorted($chosen, $direction);
    return $games;
  }

  function getMyGamesSorted($user_logged, $choice, $upDown)
  {
    $chosen = "gameId";
    $direction = "DESC";
    switch ($choice) {
      case 1:
        $chosen = "gameName";
        break;
      case 2:
        $chosen = "gameDescription";
        break;
      case 3:
        $chosen = "gameRating";
        break;
      case 4:
        $chosen = "gameUser";
        break;
      case 5:
        $chosen = "gameUpVotes";
        break;
    }
    if ($upDown) {
      $direction = " ";
    }
    $gameDAO = new GameDAO();
    $games = $gameDAO->getMyGamesSorted($user_logged, $chosen, $direction);
    return $games;
  }
  //***********************************************************************************Sorted Functionality End */

  public function jsonSerialize()
  {
    $vars = get_object_vars($this);
    return $vars;
  }
}
