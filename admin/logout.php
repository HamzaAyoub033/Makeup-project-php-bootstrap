<?php

session_start();

if(isset($_SESSION["user"]))
{
	  $_SESSION["user"] = null;
      echo "<script>window.open('login.php','_self')</script>";
      die();
}

?>