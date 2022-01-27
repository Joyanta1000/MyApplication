<?php

$conn = mysqli_connect("localhost", "root", "", "myapplication");

    $sender_id = $_POST['sender_id'];
    $message_id = $_POST['message_id'];
    $message = $_POST['message'];

    $s = mysqli_query($conn, "INSERT INTO `chat` (`sender_id`, `message_id`, `message`) VALUES ('".$sender_id."','".$message_id."','".$message."');");
    return json_encode($s);
?>
