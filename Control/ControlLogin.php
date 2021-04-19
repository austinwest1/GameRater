<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$path = $_SERVER['DOCUMENT_ROOT'];
require_once($path . "/Model/ModelSession.php");

$session = new session();
$login_result = $session->login($_POST["username"], $_POST["password"]);
if (!$login_result) {
    header("Location: ../login.php?result=0");
    exit();
} else {
    header("Location: ../homepage/index2.php?0&sort=0");
    exit();
}
