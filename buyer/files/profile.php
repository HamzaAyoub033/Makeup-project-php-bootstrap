<?php


@include('header.php');
include("connection.php");

if(isset($_SESSION['buyer_email'])){
	
	
	echo $_SESSION['buyer_name'];
	
	
}

?>


                <div class="banner3">
                    <div class="container">
                    	<div class="col-md-3">
                    		<div class="main-list" style="height:800px;">
                    			<h3>ACCOUNT SETTINGS</h3>
                    		
                    			
                                <p><a href="all_products.php"></a></p><hr>
                                <p><a href="profile.php">My Profile</a></p><hr>
                                <p><a href="edit_account.php">Edit Account</a></p><hr>
                                <p><a href="my_orders.php">My Orders</a></p><hr>
                                <p><a href="logout.php">Logout</a></p><hr>
                    			
                        
                                
                    		</div>
                    	</div>
                    	<div class="col-md-9">
	                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 products">
	                        	<h2 style="width:1000px; padding: 10px 10px 10px 10px; height:50px; background-color:#000000; color:#F4E4E4;"> My Account</h2>
	                        </div> 
                        </div>
                        <div class="col-md-9">
	                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 products">
	                        	
										<div class="col-md-12">
                            <h3>My Profile</h3>
                            <div class="content ap">
                                <form action="" method="post" enctype="multipart/form-data">
                                	 <div class="form-group">
                                        <label for="image"><span></span></label>
                                        <?php 
										
										$buyer_session = $_SESSION['user']['buyer_email'];
										
										$get_buyer_pic = "select * from buyers where buyer_email = '$buyer_session'";
										
										$run_buyer = mysqli_query($con, $get_buyer_pic);
										
										$row_buyer = mysqli_fetch_array($run_buyer);
										
										$buyer_pic = $row_buyer['buyer_image'];
										
										
                                        echo "<img src='buyer_photos/$buyer_pic' width='150' height='150' border: '2px solid blue' >";
										
										?>	
                                    </div>
                                    <div class="form-group">
                                        
                                        <h1 style="font-weight:100; margin-top:50px;"><?php echo $_SESSION['user']['buyer_name']; ?></h1>
                                    </div>
                                    <div class="form-group" style="margin-top:50px;">
                                        <label for="email">Email address:</label>
                                        <h5 style="font-weight:100;"><a href="#"><?php echo $_SESSION['user']['buyer_email']; ?></a></h5>
                                    </div>
        
                                </form>
                                
                            </div>
                            
                        </div>
      				</div>
        						<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 products" style="float:right;">
                            <div class="col-md-12">
                            	</div>
                                <form action="" method="post" enctype="multipart/form-data">
                                	<div class="form-group"  style="margin-top:50px";>
                                        <label for="country">Country:</label>
                                       <h5 style="font-weight:100;"><a href="#"><?php echo $_SESSION['user']['buyer_country']; ?></a></h5>
                                    </div>
                                     <div class="form-group">
                                        <label for="city">City:</label>
                                       <h5 style="font-weight:100;"><a href="#"><?php echo $_SESSION['user']['buyer_city']; ?></a></h5>
                                    </div>
                                  
                                    <div class="form-group">
                                        <label for="add">Address <span>*</span></label>
                                       <h5 style="font-weight:100;"><a href="#"><?php echo $_SESSION['user']['buyer_address']; ?></a></h5>
                                    </div>
                                	<div class="form-group">
                                        <label for="phone">Contact No <span>*</span></label>
                                       <h5 style="font-weight:100;"><a href="#"><?php echo $_SESSION['user']['buyer_phone']; ?></a></h5>
                                    </div>
                                   
                                 </form>   
                            </div>	
	                        </div> 
                        </div>
                         
                    </div>
                </div>

<?php

@include('footer.php');


?>
