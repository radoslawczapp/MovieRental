<?php
include_once('db.php');

$email = $mysqli->escape_string($_GET['email']);
$result = $mysqli->query("SELECT permission FROM users WHERE email='$email'");
$user = $result->fetch_assoc();

$permission = $user['permission'];
echo 'Persmisson: '.$permission.';';


$conn = null;
 ?>
