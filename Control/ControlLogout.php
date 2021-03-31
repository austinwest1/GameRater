<?php
session_start();
$path = $_SERVER['DOCUMENT_ROOT'];
require_once($path.'/Model/ModelSession.php');

$session = new session();
$login_result = $session->logout();
header("Location: ../login.php");
exit();
