<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
$path = $_SERVER['DOCUMENT_ROOT'];
require_once($path . '/Model/ModelGame.php');

$game = new game();
$game->setGameName($_POST["title"]);
$game->setGameRating($_POST["rating"]);
$game->setGameDescription($_POST["description"]);
$game->setUserLog($_SESSION["user_id"]);
$game->setGamePicture($_POST["picture"]);
$game->setGameUpVotes($_POST["gameUpVotes"]);
$game->setGameID($_POST["gameId"])
$game->updateGame();


header("Location: ../homepage/index.php");
?>