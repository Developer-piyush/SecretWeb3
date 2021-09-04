<?php

session_start();
$name = $_SESSION['name'];


    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
       
        require "partials/dbconnect.php";
        $message = $_POST['message'];

        $sql = "INSERT INTO `usershostf` (`id`, `username`, `mssg`) VALUES (NULL, '$name', '$message');";
        $result = mysqli_query($conn, $sql);

        if($result){
          $_SESSION['sent'] = true;
          header("location: index.php");
        }
}



?>