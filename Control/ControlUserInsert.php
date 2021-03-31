<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
session_start();

$path = $_SERVER['DOCUMENT_ROOT'];
require_once($path.'/Model/ModelUser.php');
require_once($path.'/Model/ModelSession.php');

$session = new session();
$login_result = $session->logout();

$user = new user();
$user->setUsername($_POST["username"]);
$user->setFirstName($_POST["firstName"]);
$user->setLastName($_POST["lastName"]);
$user->setPassword($_POST["password"]);
$user->createUser();


header("Location: ../login.php?userCreated=true");

?>