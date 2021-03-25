<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
session_start();
$path = (isset($_SESSION["SQLUSER"]) ? $_SERVER['DOCUMENT_ROOT']."/GameRater" : $_SERVER['DOCUMENT_ROOT']);
require_once($path.'/Model/ModelGame.php');

$game = new game();
$game->setGameName($_POST["title"]);
$game->setGameRating($_POST["rating"]);
$game->setGameDescription($_POST["description"]);
$game->setUserLog($_SESSION["user_id"]);
$game->createGame();


header("Location: ../dashboard.php");

?>