<?php


@include('header.php');
@include("productdir.php");
include("connection.php");
if (isset($_GET['product_detail'])) {
    $product_id = $_GET['product_detail'];

    $product_detail = "select products.*, categories.cat_name , brands.brand_name from products INNER JOIN categories ON categories.cat_id = products.cat_id INNER JOIN brands ON brands.brand_id=products.brand_id where products.pro_id = $product_id";

    $product_result_detail = $con->query($product_detail);
    $row_product_detail = mysqli_fetch_array($product_result_detail);
}
?>

<div class="content">
    <div class="container a1">
        <h1> <?php echo $row_product_detail['pro_name']; ?> </h1>
        <div class="col-md-5 image">
            <a href="#"><img class="img-responsive" src="<?php echo PRODUCT_DIR . $row_product_detail['pro_image1']; ?>"
                    alt="image" width="100%" style="position: relative;
    bottom: 17px;"></a>
        </div>
        <div class="col-md-7 details">
            <h4>Description</h4>
            <p class="desp"><?php echo $row_product_detail['pro_des']; ?></p>
            <hr>
            <div class="col-md-6">
                <table>

                    <tr>
                        <th>Category:</th>
                        <td><?php echo $row_product_detail['cat_name'];  ?></td>
                    </tr>

                </table>
                <hr>
            </div>
            <div class="col-md-6">
                <table>

                    <tr>
                        <th>Brand:</th>
                        <td><?php echo $row_product_detail['brand_name'];  ?></td>
                    </tr>

                </table>
                <hr>
            </div>
            <div class="col-md-12">
                <table class="ptable">
                    <tr>
                        <th>Price</th>
                    </tr>
                    <tr>
                        <td id="acctualPrice"><?php echo $row_product_detail['pro_price'];  ?>.RS</td>
                        <td>
                            <form id='myform' method='POST' action='cart.php'>
                                <input type='button' value='-' class='qtyminus' field='quantity' />
                                <input type='text' name='quantity' value='1' class="qty" />
                                <input type='button' value='+' class='qtyplus' field='quantity' />
                                <input type='hidden' name='pro_id' value='<?php echo $product_id ?>' />
                                <input type="hidden" name='pro_price' value="
                                    <?php echo $row_product_detail['pro_price'];  ?>" />
                                <hr>
                                <input id="submit_checkout" type='button' name="submit_checkout" value="Add to Cart">
                            </form>
                        </td>
                        <td id="productIncrementPrice"><?php echo $row_product_detail['pro_price'];  ?>.RS</td>
                    </tr>
                </table>

            </div>

            <!--  <div class="col-md-12 cart"> 
                                <div class="col-md-4" style="float:right;"></div>
                            </div> -->
        </div>
    </div>
    <div class="container a2">

    </div>


</div>

<script>
$(document).ready(function() {

    // This button will increment the value
    $('.qtyplus').click(function(e) {
        const targetNode = document.querySelector("#productIncrementPrice");
        const currentProductPrice = document.querySelector("#productIncrementPrice").innerText;
        let finalPrice = 0;

        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name=' + fieldName + ']').val());
        console.log(currentProductPrice, currentVal);
        finalPrice = parseInt(currentProductPrice) * parseInt(currentVal) + "RS";
        targetNode.innerText = finalPrice;

        //console.log(currentVal);
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name=' + fieldName + ']').val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('input[name=' + fieldName + ']').val(1);
        }
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {
        const acctualPrice = document.querySelector("#acctualPrice").innerText;
        const targetNode = document.querySelector("#productIncrementPrice");
        const currentProductPrice = document.querySelector("#productIncrementPrice").innerText;
        let finalPrice = 0;
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name=' + fieldName + ']').val());
        // console.log(currentVal);
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            if ($('input[name=' + fieldName + ']').val() > 1) {
                $('input[name=' + fieldName + ']').val(currentVal - 1);
            }
        } else {
            // Otherwise put a 0 there
            $('input[name=' + fieldName + ']').val(1);
        }
        finalPrice = parseInt(currentProductPrice) - parseInt(acctualPrice);
        if (acctualPrice == currentProductPrice) {
            return;
        }

        targetNode.innerText = finalPrice;
        // If it isn't undefined or its greater than 0

    });

    $('#submit_checkout').click(function(e) {
        $("#myform").submit()
    });

});
</script>



<?php
@include('footer.php');
?>