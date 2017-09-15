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
                <li class="active">Single Page</li>
            </ol>
        </div>
    </div>
<!-- //breadcrumbs -->
<!-- single -->
    <div class="single">
        <div class="container">
            <div class="col-md-4 products-left">
                <div class="categories animated wow slideInUp" data-wow-delay=".5s">
                    <h3>Categories</h3>
                    <ul class="cate">
                        <?php
                        require_once 'class/category.php';
                        $category = new category();
                        $read  = $category->cat_all();
                        while($row=$read->fetch_array()){
                            ?>
                            <li><a href="products.php?id=<?php echo $row['id'];?>"><?php echo $row['name']; ?></a> <span>(<?php echo $row['COUNT(cat_id)']; ?>)</span></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

              <?php
                if(isset($_GET['product'])){
                 $read  = $product->single_product();
                while($row=$read->fetch_array())
                {
                ?>
        <form method="post" action="">
            <div class="col-md-8 single-right">
                <div class="col-md-5 single-right-left animated wow slideInUp" data-wow-delay=".5s">
                    <div class="flexslider">
                        <ul class="slides">
                            <li data-thumb="images/si.jpg">
                                <div class="thumb-image"><img src="../admin/data/<?php echo $row['image']; ?>" data-imagezoom="true" class="img-responsive"> </div>
                            </li>
                        </ul>
                    </div>
                    <!-- flixslider -->
                        <script defer src="js/jquery.flexslider.js"></script>
                        <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
                        <script>
                        // Can also be used with $(document).ready()
                        $(window).load(function() {
                          $('.flexslider').flexslider({
                            animation: "slide",
                            controlNav: "thumbnails"
                          });
                        });
                        </script>
                    <!-- flixslider -->
                </div>
                <div class="col-md-7 single-right-left simpleCart_shelfItem animated wow slideInRight" data-wow-delay=".5s">
                    <h3><?php echo $row['product_name']; ?></h3>
                    <input type="hidden" name="productid" id="productId" value="<?php echo $row['id']; ?>">
                    <input type="hidden" name="price" id="price" value="<?php echo $row['price']; ?>">
                    <h4><span class="item_price">$<?php echo $row['price']; ?></span></h4>
                    <div class="description">
                        <h5><i>Description</i></h5>
                        <p><?php echo $row['description']; ?></p>
                    </div>
                    <div class="color-quality-right">
                            <p>Quantity: <?php echo $row['qty']; ?></p>
                        </div>
                        <div class="clearfix"> </div>
                    <div class="color-quality">
                        <div class="color-quality-left">
                            <h5>Color :</h5>
                            <ul>
                                <li><a href="#"><span></span>Red</a></li>
                                <li><input type="radio" name="color" value="Red"></li>
                                <li><a href="#" class="brown"><span></span>Yellow</a></li>
                                <li><input type="radio" name="color" value="Yellow"></li>
                                <li><a href="#" class="purple"><span></span>Purple</a></li>
                                <li><input type="radio" name="color" value="Purple"></li>
                                <li><a href="#" class="gray"><span></span>Violet</a></li>
                                <li><input type="hidden" name="total_quantity" id="total_quantity" value="<?php echo $row['qty']; ?>"></li>
                                <li><input type="radio" name="color" id="color" value="Violet"></li>
                            </ul>
                        </div>
                        <br>
                        <input type="number" style="width:100%;height:36px;padding:0 10px;margin: 15px 0;" name="quantity" id="quantity" placeholder="Select Quantity">
                    </div>
                    <div class="occasional">
                        <div class="clearfix"> </div>
                    </div>
                    <div class="occasion-cart">
                        <input type="submit" style="width: 100%;padding: 10px 0;margin-bottom: 35px;border-radius: 0px;" name="add_cart" class="btn btn-info" value="Add TO Cart">
                    </div>
                </div>
            </div>
        </form>
  <?php }} ?>



<!--       Start     check all possible condition of adding product from add_to_cart to checkout page-->

            <script type="text/javascript">
                $(document).ready(function () {
                    $('.btn-info').click(function(event) {
                        event.preventDefault();
                        var productId       = $("#productId").val();
                        var color           = $("#color").val();
                        var price           = $("#price").val();
                        var quantity        = $("#quantity").val();
                        var  total_quantity = parseInt($("#total_quantity").val(), 10);


                        if(color != '' && quantity != ''){
                            if (quantity == 0){
                                alert("Quantity range (1 ~"+ total_quantity +")");
                            }
                            else if(quantity > total_quantity){
                                alert("Quantity range (1 ~"+ total_quantity +")");
                            }
                            else {
                                $.ajax({
                                    method: "GET",
                                    type: "GET",
                                    url: "../web/class/cart_to_single.php",
                                    data: {'id':productId, 'color':color, 'price': price, 'quantity': quantity},
                                    success: function(data)
                                    {
                                        alert(data);
                                        location.href='checkout.php';
                                    },
                                    error: function (data) {

                                    }
                                });
                            }
                        }
                        else{
                            alert("Both (color, quantity) fields are required");
                        }
                    });
                });
            </script>
            <!--        End    check all possible condition of adding product from add_to_cart to checkout page-->



<!--            review section starts here-->

<?php
if(isset($_POST['review'])){
    $product->product_review();
}
?>
<div class="add-review">
    <h4>add a review</h4>
    <div class="bootstrap-tab animated wow slideInUp" data-wow-delay=".5s">
        <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs" role="tablist">
                <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Reviews(2)</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="profile" aria-labelledby="profile-tab">
                    <div class="bootstrap-tab-text-grids">
                        <?php
                        $read  = $product->product_review_all();
                        while($row = $read->fetch_array())
                        {
                            if($row['Approve']=='Deactive'){
                                ?>
                                <div class="alert alert-danger">
                                    <strong><?php echo $row['user_name']; ?> </strong>Your review is awaiting admin approve.
                                </div>

                                <?php
                            }
                            else{
                                ?>
                                <div class="bootstrap-tab-text-grid">
                                    <div class="bootstrap-tab-text-grid-left">
                                        <img src="images/4.png" alt=" " class="img-responsive" />
                                    </div>
                                    <div class="bootstrap-tab-text-grid-right">
                                        <ul>
                                            <li><a href="#"><?php echo $row['user_name']; ?></a></li>
                                        </ul>
                                        <p><?php echo $row['user_review']; ?></p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <?php
                            }
                            ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

                <form method="post" action="">
                    <input type="text" name="user_name" placeholder="Your Name">
                    <?php
                    if(isset($_GET['product'])){
                        require_once 'class/product.php';
                        $product = new product();
                        $read  = $product->single_product();
                        while($row=$read->fetch_array())
                        {
                            ?>
                            <input type="hidden" name="productid" value="<?php echo $row['id']; ?>">
                        <?php } }?>
                    <input type="email" name="user_email" placeholder="Your Email">  <br><br>
                    <textarea name="user_review" maxlength="30" placeholder="Enter Review"></textarea>
                    <input type="submit" value="Send" name="review" >
                </form>


            </div>

            <div class="clearfix"> </div>
        </div>
    </div>
<?php require('footer.php'); ?>