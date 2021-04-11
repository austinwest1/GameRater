<?php
class GameDAO
{

  function getGames()
  {
    $path1 = $_SERVER['DOCUMENT_ROOT'];
    require($path1 . '/Request/utilities/connection.php');

    $sql = "SELECT gameId, gameName, gameDescription, gameRating, gamePicture, gameUpVotes FROM games ORDER BY gameRating DESC";
    //echo $sql;
    $result = $conn->query($sql);
    $games;
    if ($result->num_rows > 0) {
      // output data of each row
      $gamesCount = 0;
      while ($row = $result->fetch_assoc()) {
        $game = new game();
        $game->setGameID($row["gameId"]);
        $game->setGameName($row["gameName"]);
        $game->setGameDescription($row["gameDescription"]);
        $game->setGameRating($row["gameRating"]);
        $game->setGamePicture($row["gamePicture"]);
        $game->setGameUpVotes($row["gameUpVotes"]);
        $games[$gamesCount] = $game;
        $gamesCount++;
      }
    } else {
      $games = false;
    }
    $conn->close();
    return $games;
  }

  function getGamesSorted($choice, $upDown)
  {
    $path1 = $_SERVER['DOCUMENT_ROOT'];
    require_once($path1 . '/Request/utilities/connection.php');

    $sql = "SELECT gameId,gameName, gameDescription, gameRating, gamePicture, gameUpVotes FROM games ORDER BY " . $choice . " " . $upDown;
    $result = $conn->query($sql);
    $games;
    if ($result->num_rows > 0) {
      // output data of each row
      $gamesCount = 0;
      while ($row = $result->fetch_assoc()) {
        $game = new game();
        $game->setGameID($row["gameId"]);
        $game->setGameName($row["gameName"]);
        $game->setGameDescription($row["gameDescription"]);
        $game->setGameRating($row["gameRating"]);
        $game->setGamePicture($row["gamePicture"]);
        $game->setGameUpVotes($row["gameUpVotes"]);
        $games[$gamesCount] = $game;
        $gamesCount++;
      }
    } else {
      $games = false;
    }
    $conn->close();
    return $games;
  }
  function getMyGames($user_id)
  {
    $path1 = $_SERVER['DOCUMENT_ROOT'];
    require_once($path1 . '/Request/utilities/connection.php');

    $sql = "SELECT gameId, gameName, gameDescription, gameRating, gamePicture, gameUpVotes FROM games where gameUser=" . $user_id . " ORDER BY gameRating DESC";
    $result = $conn->query($sql);
    $games = array();
    if ($result->num_rows > 0) {
      // output data of each row
      $gamesCount = 0;
      while ($row = $result->fetch_assoc()) {
        $game = new game();
        $game->setGameID($row["gameId"]);
        $game->setGameName($row["gameName"]);
        $game->setGameDescription($row["gameDescription"]);
        $game->setGameRating($row["gameRating"]);
        $game->setGamePicture($row["gamePicture"]);
        $game->setGameUpVotes($row["gameUpVotes"]);
        $games[$gamesCount] = $game;
        $gamesCount++;
      }
    } else {
      //$games = false;
    }
    $conn->close();
    return $games;
  }

  function getMyGamesSorted($user_id, $choice, $upDown)
  {
    $path1 = $_SERVER['DOCUMENT_ROOT'];
    require_once($path1 . '/Request/utilities/connection.php');

    $sql = "SELECT gameId, gameName, gameDescription, gameRating, gamePicture, gameUpVotes FROM games where gameUser=" . $user_id . " ORDER BY " . $choice . " " . $upDown;
    $result = $conn->query($sql);
    $games = array();
    if ($result->num_rows > 0) {
      // output data of each row
      $gamesCount = 0;
      while ($row = $result->fetch_assoc()) {
        $game = new game();
        $game->setGameID($row["gameId"]);
        $game->setGameName($row["gameName"]);
        $game->setGameDescription($row["gameDescription"]);
        $game->setGameRating($row["gameRating"]);
        $game->setGamePicture($row["gamePicture"]);
        $game->setGameUpVotes($row["gameUpVotes"]);
        $games[$gamesCount] = $game;
        $gamesCount++;
      }
    } else {
      //$games = false;
    }
    $conn->close();
    return $games;
  }

  function createGame($game)
  {
    $path1 = $_SERVER['DOCUMENT_ROOT'];
    require($path1 . '/Request/utilities/connection.php');
    //prepare and bind
    $stmt = $conn->prepare(
      "INSERT INTO gamerater.games
    (
    gameName,
    gameDescription,
    gameRating,
    gameUser,
    gamePicture,
    gameUpVotes)
    VALUES
    (?, ?, ?, ?, ?, ?)"
    );
    $gn = $game->getGameName();
    $gd = $game->getGameDescription();
    $gr = $game->getGameRating();
    $gu = $game->getUserLog();
    $gp = $game->getGamePicture();
    $guv = $game->getGameUpVotes();

    $stmt->bind_param("ssssss", $gn, $gd, $gr, $gu, $gp, $guv);
    if (!$stmt->execute()) {
      $stmt->close();
      $conn->close();
      session_start();
      $_SESSION['errorMessage'] = "An Error occured, no Game was created";
      header("Location: " . $path1 . "/addReview.php");
    }

    $stmt->close();
    $conn->close();
  }
  function updateGame($game)
  {
    $path1 = $_SERVER['DOCUMENT_ROOT'];
    require($path1 . '/Request/utilities/connection.php');
    //prepare and bind
    $stmt = $conn->prepare(
      "UPDATE gamerater.games SET
    gameName=?,
    gameDescription=?,
    gameRating=?,
    gamePicture=?,
    gameUpVotes=?
    WHERE
    gameId=?"
    );
    $gn = $game->getGameName();
    $gd = $game->getGameDescription();
    $gr = $game->getGameRating();
    $gu = $game->getUserLog();
    $gp = $game->getGamePicture();
    $guv = $game->getGameUpVotes();
    $gi = $game->getGameID();

    $stmt->bind_param("ssisii", $gn, $gd, $gr, $gp, $guv, $gi);
    if (!$stmt->execute()) {
      $stmt->close();
      $conn->close();
      session_start();
      $_SESSION['errorMessage'] = "An Error occured, no Game was Updated";
      header("Location: " . $path1 . "/addReview.php");
    }

    $stmt->close();
    $conn->close();
  }
  function deleteGame($gd, $ud)
  {
    $path1 = $_SERVER['DOCUMENT_ROOT'];
    require_once($path1 . '/Request/utilities/connection.php');

    $sql = "DELETE FROM gamerater.games WHERE gameId = " . $gd . " AND gameUser = " . $ud . ";";

    if ($conn->query($sql) === TRUE) {
      $conn->close();
      return "true";
    } else {
      $conn->close();
      return "false";
    }
  }
}
