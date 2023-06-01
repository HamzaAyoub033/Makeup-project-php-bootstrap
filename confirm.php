<?php
// Start the session
session_start();

include("connection.php");

$totalamount = 0;
$buyer_id = $_SESSION['user'];
$totall = $_SESSION['totall'];
$email = $_SESSION['email'];
echo $email;
$add_order = "insert into buyer_orders (buyer_id,pro_price) values ($buyer_id,$totall)";
$exe_brand = mysqli_query($con, $add_order);
if (!$exe_brand) {
  echo $mysqli_error($con);
} else {
  echo "done";
}
$rr = mysqli_query($con, "DELETE FROM cart where buyer_email='$email'");
if (!$rr) {
  echo mysqli_error($con);
}
header("Location:index.php");