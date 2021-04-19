<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
$path = $_SERVER['DOCUMENT_ROOT'];
require_once($path . '/Model/ModelGame.php');
$num = 0;
$game = new game();
$game->setGameName($_POST["title"]);
$game->setGameRating($_POST["rating"]);
$game->setGameDescription($_POST["description"]);
$game->setUserLog($_SESSION["user_id"]);

// inserts a palceholder image if none are entered by the user
if ($_POST["picture"] == "") {
    $game->setGamePicture("https://alphasys.com.au/wp-content/themes/corporate-theme/images/placeholder.png");
}
else {
    $game->setGamePicture($_POST["picture"]);
}

$game->setGameUpVotes($num);
$game->createGame();

header("Location: ../homepage/index2.php?0&sort=0");
