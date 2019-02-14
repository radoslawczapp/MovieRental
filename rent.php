<?php
session_start();
include_once('db.php');
if($_SESSION['logged_in'] != 1){
    header('loaction: index.php');
} else{
    $info_id = $_GET['id'];
    $stmt = $conn->prepare("SELECT price, id FROM info WHERE id = $info_id");
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $price = $results[0]['price'];
    $email = $_SESSION['email'];

    $stmt = $conn->prepare("SELECT user_id FROM users WHERE email = '$email'");
    $stmt->execute();
    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $user_id = $user[0]['user_id'];


    $stmt = $conn->prepare("INSERT INTO `rented`(`user_id`, `info_id`) VALUES ('$user_id', '$info_id')");
    $stmt->execute();

    $balance = $_SESSION['account'] - $price;
    $stmt = $conn->prepare("UPDATE users SET account = '$balance' WHERE user_id = '$user_id'");
    $stmt->execute();

    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>
