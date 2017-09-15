<?php require('header.php'); ?><!--include header -->
<?php
if (!isset($_SERVER['HTTP_REFERER'])){

    echo "<script>window.location.href = 'index.php'</script>";
  }
?>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">Thank you.Your order has been received.</div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Order No</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th>Payment Method</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>012312</td>
                            <td><?php echo date("d-M-Y"); ?></td>
                            <td>250</td>
                            <td>Bank Transfer</td>
                        </tr>
                        </tbody>
                    </table>
                   <h4 style="margin:15px 0;">Order Details</h4>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Order No</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>012312</td>
                            <td>July 25, 2017</td>
                            <td>250</td>
                            <td>250</td>
                        </tr>
                        </tbody>
                    </table>
                   <h4>Our account details</h4>
                    <p>Bank Account: 234234234234234234324324 </p>
                    <p>Bkash: 324324234234</p>



                </div>
            </div>
        </div>
		
<?php require('footer.php'); ?><!--include footer -->
