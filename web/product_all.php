<?php require('header.php'); ?>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">All Product</div>
            <div class="panel-body">
                <div class="row">
                    <?php
                    $read  = $product->show();
                    while($row=$read->fetch_assoc()){
                        ?>
                        <div class="col-md-3">
                            <img src="../admin/data/<?php echo $row['image']; ?>" width="100%" height="250px">
                            <p><a href="single.php?product=<?php echo $row['id']; ?>"><?php echo $row['product_name']; ?></a></p>
                            <p>Price: <?php echo $row['price']; ?></p>
                            <a class="btn btn-primary" href="single.php?product=<?php echo $row['id']; ?>">Add to Cart</a>
                            <div style="margin-bottom:20px;"></div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php require('footer.php'); ?>