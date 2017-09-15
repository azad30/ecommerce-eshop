<?php require('header.php'); ?>
<?php
if (!isset($_SERVER['HTTP_REFERER'])){
    echo "<script>window.location.href = 'index.php'</script>";
}
?>
    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Checkout Page</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- checkout -->
    <!--message area-->
    <div class="checkout">
        <div class="container">
            <h3 class="animated wow slideInLeft" data-wow-delay=".5s">Your shopping cart contains: <span>
			<?php
            $read  = $cart->cart_item();
            while($row=$read->fetch_array()){
                ?>
                <?php echo $row['COUNT(quantity)']; ?>
            <?php } ?>
                    Products</span></h3>

            <!--show the success message-->
            <div id="successMessage"> </div>

            <div class="checkout-right animated wow slideInUp" data-wow-delay=".5s">
                <form method="" action="" enctype="multipart/form-data">
                    <table class="timetable_sub mytable" id="myTable">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $serial=0;
                        $read  = $cart->cart_all();
                        while($row=$read->fetch_array()){
                        $serial++;
                        ?>
                        <tr class="rem1<?php echo $row['product_id'] ?>">
                            <td class="invert"><?php echo $serial; ?></td>
                            <td id="image_id"><img width="60px" height="50px" src="../admin/data/<?php echo $row['image']; ?>" alt="" /></td>
                            <td class="invert">
                                <div class="qty">
                                    <div class="quantity-select">
                                        <input style="width: 100%;" type="number" id="quantity" placeholder="Select Quantity" value="<?php echo $row['quantity']; ?>">
                                    </div>
                                </div>
                            </td>
                            <td class="invert" id="<?php echo $row['id']; ?>"><?php echo $row['product_name']; ?></td>
                            <td class="invert_price" id="price">$<?php echo $row['price']; ?></td>
                            <td class="invert" id="total">$<?php echo $row['total']; ?></td>
                            <td class="invert">
                                <a class="btn btn-success" style="width: 50%; border-radius: 0px;margin:5px 0;" id="<?php echo $row['product_id']; ?>">Edit</a>
                                <a class="btn btn-danger" style="width: 50%; border-radius: 0px;margin:5px 0;" id="<?php echo $row['product_id']; ?>">Delete</a>
                            </td>
                        </tr>
                        </tbody>

                        <?php } ?>
                    </table>
                </form>
            </div>
            <div class="checkout-left">
                <!-- for session check -->
                <?php
                require_once 'class/session.php';
                if(isset($_POST['check'])){
                    $session = new session_check();
                    $session -> user_auth();
                }
                ?>
                <!--End session check -->

                <!--Display all cart data-->
                <div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
                    <form method="post" action="">
                        <button style="width: 100%;padding: 10px 0;margin-bottom: 35px;border-radius: 0px;" type="submit" name="check" class="btn btn-info">Continue to basket</button>
                    </form>
                    <ul>
                        <?php
                        $read  = $cart->cart_all();
                        while($row=$read->fetch_array()){
                            ?>
                            <li><?php echo $row['product_name']; ?> <i>-</i> <span>$<?php echo $row['price']; ?> *<?php echo $row['quantity']; ?> </span></li>
                        <?php } ?>

                        <li>Total <i>-</i> <span>

                           <!--Display cart total price-->
                                <?php
                                $read  = $cart->cart_total_price();
                                while($row=$read->fetch_assoc()){
                                    ?>
                                    $<?php echo $row['SUM(total)']; ?>
                                <?php } ?>
                                <!--End Display cart total price-->
						</span></li>
                    </ul>
                </div>
                <!--End display cart data -->

                <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
                    <a href="index.php"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continue Shopping</a>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    </div>

    <script type="text/javascript">

        $('.btn-danger').click(function() {
            var id = $(this).attr("id");
            var divID = $(this).attr("divID");

            var sureToDelete = confirm("Do you want to Delete ?");

            if (sureToDelete)
            {
                $.ajax({
                    type: "POST",
                    url: "../web/class/update_checkout.php",
                    data: ({
                        id: id
                    }),
                    cache: false,
                    success: function(html) {
                        $(".rem1" + id).fadeOut('slow');
                    }
                });
            }
            else
            {
                return false;
            }
        });
    </script>


    <script type="text/javascript">
        $(document).ready(function(){

            // code to read selected table row cell data (values).
            $("#myTable").on('click','.btn-success',function(){


                var id = $(this).attr("id");

                var currentRow = $(this).closest("tr");

                var quantity = currentRow.find("#quantity").val();
                var price = currentRow.find("#price").html().replace('$','');
                var total = quantity * price;

                $.ajax({
                    type: "POST",
                    url: "../web/class/update_checkout.php",
                    data: ({
                        checkout_id: id, quantity : quantity, total : total
                    }),
                    cache: false,
                    success: function(data) {
                        //$(".rem1" + id).fadeIn('slow');

                        //$("#successMessage").html("Record Updated Successfully").fadeOut(3000);
                        location.href='checkout.php';

                    },
                    error: function () {
                        console.log('error');
                    }
                });


            });
        });
    </script>


    <!-- //checkout -->
<?php require('footer.php'); ?>