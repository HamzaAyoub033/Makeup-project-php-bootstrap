<?php

// Start the session
session_start();

if(!isset($_SESSION["user"]))
{
      echo "<script>window.open('login.php','_self')</script>";
      die();
}


@include('header.php');
include('connection.php');
$selectquery= "select buyer_orders.*,buyers.* from buyer_orders inner join buyers on buyers.buyer_id=buyer_orders.buyer_id";
$result = mysqli_query($con,$selectquery);
?>
<!--main-container-part-->
   <div id="content">
   <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
  	<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h4><b>All Orders</b></h4>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Buyer ID</th>
                  <th>Buyer Name</th>
                  <th>Email</th>
                  <th>Product Price</th>
                  <th>Buyer Country</th>
                  <th>Buyer City</th>
                  <th>Buyer Address</th>
                  <th>Order Date</th>
                  <th>Delivery Status</th>
                  <th>Cancel Order</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                   if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
              ?>
                <tr class="gradeX" align="center">
                  <td><?php echo $row['buyer_id']; ?></td>
                  <td><?php echo $row['buyer_name']; ?></td>
                  <td><?php echo $row['buyer_email']; ?></td>
                  <td><?php echo $row['pro_price']; ?></td>
                  <td><?php echo $row['buyer_country']; ?></td>
                  <td><?php echo $row['buyer_city']; ?></td>
                  <td><?php echo $row['buyer_address']; ?></td>
                  <td><?php echo $row['order_date']; ?></td>
                  <td>
                  <?php if ($row['delete_id']==0) {
            ?>
            <button class="btn btn-primary"><a style="color: #fff; text-decoration: none;" href="order_pending.php?id=<?php echo $row['id']; ?>">Pending</a></button>
            <?php
        }elseif ($row['delete_id']==1) {
            ?>
            <button class="btn btn-success"><a style="color: #fff; text-decoration: none;" href="order_returnadd.php?id=<?php echo $row['id']; ?>">Delivered</a></button>
            <?php
        } ?>
          </td>
          <td>
              <?php if ($row['delete_id']==0) {
                ?>
                <button class="btn btn-danger"><a style="color: #fff; text-decoration: none;" href="order_cancel.php?id=<?php echo $row['id']; ?>">Cancel</a></button>
                <?php
              }elseif ($row['delete_id']==2){
               ?>
                <button class="btn btn-danger"><a style="color: #fff; text-decoration: none;" href="order_undo.php?id=<?php echo $row['id']; ?>">Undo Cacellation</a></button>
                <?php
              }
               ?>
          </td>
          <?php 
                    }
                  }
                ?> 
                </tr>
              </tbody>
            </table>
          </div>
        </div>	
     </div>
   </div>
  </hr>
</div>
  </div>
</div>

    
 </div>   

<?php

@include('footer.php');

?>