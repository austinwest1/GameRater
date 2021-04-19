<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once('../Control/ControlSessionCheck.php');
// include_once('../View/Common/header.php');
include_once('../Model/ModelGame.php');


$game2 = new Game();
$allGames = $game2->getAllGames();

$upvotes = $allGames[$_GET["n"]]->getGameUpVotes();

// echo $upvotes;
$upvotes++;
// echo $upvotes;

$allGames[$_GET["n"]]->setGameUpVotes($upvotes);

$allGames[$_GET["n"]]->updateGame();

header("Location: index2.php?2");
