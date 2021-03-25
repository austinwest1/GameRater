<?php
class GameDAO {
  function getGames(){
    $path1 = (isset($_SESSION["SQLUSER"]) ? $_SERVER['DOCUMENT_ROOT']."/GameRater" : $_SERVER['DOCUMENT_ROOT']);
    require_once($path1.'/Request/utilities/connection.php');
    
    $sql = "SELECT gameId,gameName, gameDescription, gameRating FROM games ORDER BY gameRating DESC ";
    $result = $conn->query($sql);
    $games;
    if ($result->num_rows > 0) {
    // output data of each row
    $gamesCount = 0;
    while($row = $result->fetch_assoc()) {
        $game = new game();
        $game->setGameID($row["gameId"]);
        $game->setGameName($row["gameName"]);
        $game->setGameDescription($row["gameDescription"]);
        $game->setGameRating($row["gameRating"]);
        $games[$gamesCount] = $game;
        $gamesCount ++;
    }
    } else {
        $games = false;
    }
    $conn->close();
    return $games;
  }
  function getMyGames($user_id){
    $path1 = (isset($_SESSION["SQLUSER"]) ? $_SERVER['DOCUMENT_ROOT']."/GameRater" : $_SERVER['DOCUMENT_ROOT']);
    require_once($path1.'/Request/utilities/connection.php');
    
    $sql = "SELECT gameId,gameName, gameDescription, gameRating FROM games where gameUser=".$user_id." ORDER BY gameRating DESC";
    $result = $conn->query($sql);
    $games;
    if ($result->num_rows > 0) {
    // output data of each row
    $gamesCount = 0;
    while($row = $result->fetch_assoc()) {
        $game = new game();
        $game->setGameID($row["gameId"]);
        $game->setGameName($row["gameName"]);
        $game->setGameDescription($row["gameDescription"]);
        $game->setGameRating($row["gameRating"]);
        $games[$gamesCount] = $game;
        $gamesCount ++;
    }
    } else {
        $games = false;
    }
    $conn->close();
    return $games;
  }

  function createGame($game){
    $path1 = (isset($_SESSION["SQLUSER"]) ? $_SERVER['DOCUMENT_ROOT']."/GameRater" : $_SERVER['DOCUMENT_ROOT']);
    require_once($path1.'/Request/utilities/connection.php');
    //prepare and bind
    $stmt = $conn->prepare(
    "INSERT INTO cs3620.games
    (
    gameName,
    gameDescription,
    gameRating,
    gameUser)
    VALUES
    (?, ?, ?, ?)");
    $gn= $game->getGameName();
    $gd= $game->getGameDescription();
    $gr= $game->getGameRating();
    $gu= $game->getUserLog();

    $stmt->bind_param("ssss",$gn,$gd,$gr,$gu);
    if(!$stmt->execute()){
      $stmt->close();
      $conn->close();
      session_start();
      $_SESSION['errorMessage'] = "An Error occured, no Game was created";
      header("Location: ".$path1."/addReview.php");
    }

    $stmt->close();
    $conn->close();
  }
  function deleteGame($gd,$ud){
    $path1 = (isset($_SESSION["SQLUSER"]) ? $_SERVER['DOCUMENT_ROOT']."/GameRater" : $_SERVER['DOCUMENT_ROOT']);
    require_once($path1.'/Request/utilities/connection.php');
    
    $sql = "DELETE FROM cs3620.games WHERE gameId = " . $gd . " AND gameUser = ".$ud.";";
  
    if ($conn->query($sql) === TRUE) {
      $conn->close();
      return "true";
    } else {
      $conn->close();
      return "false";
    }
  }
}
?>