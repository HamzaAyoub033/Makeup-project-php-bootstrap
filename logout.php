<?php

session_start();

if(isset($_SESSION["user"]))
{
	  $_SESSION["user"] = null;
      echo "<script>window.open('index.php','_self')</script>";
      die();
}

?>