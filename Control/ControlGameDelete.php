<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
$path = $_SERVER['DOCUMENT_ROOT'];
require_once($path . '/Model/ModelGame.php');

$game = new game();
$result = $game->deleteGame($_GET["gameId"], $_SESSION["user_id"]);

header("Location: ../homepage/index2.php?0&sort=0");
