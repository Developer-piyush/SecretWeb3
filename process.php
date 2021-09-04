<?php

if(!isset($_COOKIE['userid'])){
    header("location: index.php");
}
else{
    require "partials/dbconnect.php";
    session_start();
    $_SESSION['userid'] = $_COOKIE['userid'];
    $user = $_SESSION['userid'];
    $existsql = "SELECT * FROM `usershost` WHERE username='$user'";
    $result = mysqli_query($conn, $existsql);
    $numExistrows = mysqli_num_rows($result);
    if($numExistrows > 0){
    header("location: welcome.php");
    }
    else{
        $sql = "INSERT INTO `usershost` (`sno`, `username`,  `password`, `date`) VALUES (NULL, '$user',  '123', current_timestamp());";
        $result = mysqli_query($conn, $sql);
        if($result){
            header("location: welcome2.php");
        }
    }
}
 ?>   