<?php
error_reporting(0);
@include('header.php');
@include("connection.php");
$allRecord = null;
$totall = 0;
if (!isset($_SESSION["user"])) {
    echo "<script>window.open('login_register.php','_self')</script>";
    die();
}
$email = $_SESSION['email'];
$allRecord = mysqli_query($con, "select*from cart where buyer_email='$email'");

if (!$allRecord) {
    echo mysqli_error($con);
}

$totall = mysqli_query($con, "SELECT sum(price) from cart");
if (!$totall) {
    echo mysqli_error($con);
} else {
    $totall = mysqli_fetch_array($totall)[0];
    $_SESSION['totall'] = $totall;
}


?>

<div class="wrapper">
    <div class="container">
        <h1>CHECKOUT</h1>
    </div>
    <div class="container pannel">


        <div class="col-md-12 tod">
            <h3>Your order</h3>
            <table class="table table-bordered">
                <tr>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Price</th>


                </tr>
                <?php
                if (isset($allRecord)) {

                    $totalamout = 0;
                    while ($row = mysqli_fetch_assoc($allRecord)) {

                ?>


                <tr>
                    <td><?php echo $row['id'] ?></b></td>
                    <td><?php echo $row['qty'] ?></td>
                    <td><?php echo $row['price'] ?></td>
                </tr>


                <?php
                        $totalamout = $totalamout + $orderlineitem->price;
                    }
                }
                ?>
                <tr>
                    <td colspan="2"> <b>Total</b></td>
                    <td><b><?php echo $totall ?></b></td>
                </tr>
            </table>

            <div>

                <a href="cart.php"><button>Back to Edit</button></a>
                <a href="confirm.php"> <button>Confirm Order</button> </a>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $("#hide").hide();
});
$(document).ready(function() {
    $("#sh").click(function() {
        $("#hide").toggle(300);
    });
});
$(document).ready(function() {
    $("#hf").hide();
});
$(document).ready(function() {
    $("#cmn-toggle-1").click(function() {
        $("#hf").toggle(300);
    });
});
$(document).ready(function() {
    $("#lc").hide();
});
$(document).ready(function() {
    $("#login").click(function() {
        $("#lc").toggle(300);
    });
});
$(document).ready(function() {
    $("#ecc").hide();
});
$(document).ready(function() {
    $("#cc").click(function() {
        $("#ecc").toggle(300);
    });
});
</script>


<?php

@include('footer.php');

?>