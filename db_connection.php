<?php

session_start();

class Database
{
	var $host = "localhost";
	var $user = "root";
	var $pass = "";
	var $db = "myapplication";
	public function connect()
	{
		$con = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
		return $con;
	}

	public function saveRecords($name, $email, $pass, $re_pass)
	{
		$conn = $this->connect();
		$s = mysqli_query($conn, "INSERT INTO `user` (`name`, `email`, `password`, `avatar`) VALUES ('" . $name . "', '" . $email . "', '" . $pass . "', '');");
		echo "<script>alert('Registered Successfully')</script>";
	}

	public function signIn($email, $pass)
	{
		$conn = $this->connect();
		$s = mysqli_query($conn, "SELECT * FROM `user` WHERE `email` = '" . $email . "' AND `password` = '" . $pass . "';");
		$row = mysqli_fetch_array($s);
		if ($row['email'] == $email && $row['password'] == $pass) {
			session_start();
			$_SESSION['id'] = $row['id'];
			$_SESSION['email'] = $email;
			$_SESSION['name'] = $row['name'];
			$_SESSION['avatar'] = $row['avatar'];
			header("location:home.php");
		} else {
			echo "<script>alert('Invalid Email or Password')</script>";
		}
	}
}
