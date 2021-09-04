<?php

session_start();
session_unset();
session_destroy();
if(isset( $_COOKIE['userid'] )){
   setcookie('userid', $name, -100, "/");
}
header("location:  index.php");

?>