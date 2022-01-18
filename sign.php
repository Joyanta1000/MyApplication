<?php 
include_once 'db_connection.php';
$obj=new Database();
extract($_POST);
//Saved Records Inside Database
if(isset($signin))
{
    echo $email;
    echo $pass;
    $obj->signIn($email, $pass);
}
 ?>