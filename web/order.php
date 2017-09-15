<?php require('custom-header.php'); ?> <!-- include custom-header specially for session check -->
<!-- check user session or not -->
<?php
if (!isset($_SERVER['HTTP_REFERER'])){
    echo "<script>window.location.href = 'index.php'</script>";
  }
?>
<?php
if(isset($_SESSION['username']) != true){
    echo "<script>window.location.href = 'login.php'</script>";
}
// $_SESSION['id'];

?>
<!--End check user session or not -->
<!-- Show all customer order data in table format -->
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Your Order</div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <!-- User order form start -->
                <?php
                    require_once 'class/order.php';
                    if(isset($_POST['order'])){
                        $order = new order();
                        $order->user_order();
                    }
                ?>
                <!--  -->
                <form method="post" action="">

                    <!--  Select customer to check customer current session id -->
                    <?php
                    $read  = $cart->all_customer();
                    while($row=$read->fetch_array()){
                        ?>
                        <input type="hidden" name="customerid" value="<?php echo $_SESSION['id']; ?>">
                    <?php } ?>
                    <!--  End customer to check customer current session id -->

                    <!-- all cart data -->
                    <?php
                    $read  = $cart->cart_all();
                    while($row=$read->fetch_array()){
                        ?>
                        <tr>
                            <td><?php echo $row['product_name']; ?></td>
                            <td>$<?php echo $row['price']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td>$<?php echo $row['total']; ?></td>
                        </tr>
                    <?php } ?>
                    <!--End all cart data -->
                </tbody>
            </table>
            <!--  cart total price -->
            <?php
            $read  = $cart->cart_total_price();
            while($row=$read->fetch_assoc()){
                ?>
                <h3 style="color:red">Grand total: $<?php echo $row['SUM(total)']; ?></h3>
            <?php } ?>
            <!-- End cart total price -->
			    <br>
            <div class="panel panel-default">
                <div class="panel-heading">Select payment method</div>
                <div class="panel-body">
                    <input type="radio" name="payment" value="Bank Transfer"> Direct Bank Transfer
                    <input type="radio" name="payment" value="Cash On Delivery"> Cash on Delivery
                    <input type="radio" name="payment" value="Bkash"> Bkash
                </div>
            </div>
            <div class="pull-right"><button type="submit" name="order" class="btn btn-info">Place Order</button></div>
            </form>
            <!--End user order form -->
        </div>
    </div>
</div>
<!-- End show all customer order data in table format -->
<?php require('footer.php'); ?> <!-- include footer -->