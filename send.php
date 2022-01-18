<?php
// header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");
session_start();
$conn = mysqli_connect("localhost", "root", "", "myapplication");
// $conn = $this->connect();

// if(!empty($_POST['data'])){
//     return $_POST['data'];
// if(isset($_POST['data'])){
    // $data = json_decode($_POST['data'], true);
    return $_POST['data'];
    $s = mysqli_query($conn, "INSERT INTO `chat` (`sender_id`, `message_id`, `message`) VALUES (1,1,'hey');");
    
// }
?>