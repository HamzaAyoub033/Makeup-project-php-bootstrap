<?php  
include ('connection.php');

$id = $_GET['id'];

$query = "UPDATE buyer_orders set delete_id =1 where id = '$id'";/*soft delete*/

mysqli_query($con,$query);

header('location:view_orders.php');

?>