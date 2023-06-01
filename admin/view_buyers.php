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
$select= "Select * from buyers";
$result= mysqli_query($con,$select);

?>

<!--main-container-part-->




   <div id="content">
   <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
  	<div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h4><b>All Buyers</b></h4>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Buyer ID</th>
                  <th>Buyer Name</th>
                  <th>Email</th>
                  <th>Country</th>
                  <th>Phone No</th>
                  <th>Address</th>
                </tr>
              </thead>
              <tbody>
              <?php
                if(mysqli_num_rows($result)>0){
                  while($row = mysqli_fetch_assoc($result)){
                    ?>
                 <tr class="gradeX" align="center">
                  <td><?php echo $row['buyer_id']; ?></td>
                  <td><?php echo $row['buyer_name']; ?></td>
                  <td><?php echo $row['buyer_email']; ?></td>
                  <td><?php echo $row['buyer_country']; ?></td>
                  <td><?php echo $row['buyer_phone']; ?></td>
                  <th><?php echo $row['buyer_address']; ?></th>
                </tr>
                <?php
                  }

                }
              ?>

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
<!--Footer-part-->
<?php

@include('footer.php');

?>