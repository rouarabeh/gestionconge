<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
include("./function/connect.php");

session_start();// Starting Session
// Storing Session
$echeck= $_SESSION['username'];
// SQL Query To Fetch Complete Information Of User
$sql=mysqli_query($connect,"SELECT * FROM employe WHERE nom ='$echeck'");
$row = mysqli_fetch_assoc($sql);
$cusr =$row['nom'];
if(!isset($cusr)){
mysqli_close($connect); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}
?>