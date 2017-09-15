<?php require('header.php'); ?>
    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Products</li>
            </ol>
        </div>
    </div>
    <div class="products">
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
                <div class="new-products animated wow slideInUp" data-wow-delay=".5s">
                    <h3>New Products</h3>
                    <?php
                    require_once 'class/product.php';
                    $product = new product();
                    $read  = $product->limit_show();
                    while($row=$read->fetch_assoc()){
                        ?>
                        <div class="new-products-grids">
                            <div class="new-products-grid">
                                <div class="new-products-grid-left">
                                    <a href="single.php?product=<?php echo $row['id'];?>"><img src="../admin/data/<?php echo $row['image']; ?>" alt=" " class="img-responsive" /></a>
                                </div>
                                <div class="new-products-grid-right">
                                    <h4><a href="single.php?product=<?php echo $row['id'];?>"><?php echo $row['product_name']; ?></a></h4>
                                    <p><span style="color:red;">Category:</span> <?php echo $row['name']; ?></p>
                                    <div class="simpleCart_shelfItem new-products-grid-right-add-cart">
                                        <p> <span class="item_price">$<?php echo $row['price']; ?></span><a class="item_add" href="single.php?product=<?php echo $row['id'];?>">add to cart </a></p>
                                    </div>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                    <?php } ?>
                    <a class="btn btn-primary" href="product_all.php">Show all</a>
                </div>
                <div class="men-position animated wow slideInUp" data-wow-delay=".5s">
                    <a href="single.php"><img src="images/27.jpg" alt=" " class="img-responsive" /></a>
                    <div class="men-position-pos">
                        <h4>Summer collection</h4>
                        <h5><span>55%</span> Flat Discount</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-8 products-right">
                <div class="products-right-grid">
                    <div class="products-right-grids animated wow slideInRight" data-wow-delay=".5s">
                        <div class="sorting">
                            <select id="country" onchange="change_country(this.value)" class="frm-field required sect">
                                <option value="null">Default sorting</option>
                                <option value="null">Sort by popularity</option>
                                <option value="null">Sort by average rating</option>
                                <option value="null">Sort by price</option>
                            </select>
                        </div>
                        <div class="sorting-left">
                            <select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
                                <option value="null">Item on page 9</option>
                                <option value="null">Item on page 18</option>
                                <option value="null">Item on page 32</option>
                                <option value="null">All</option>
                            </select>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="products-right-grids-bottom">
                    <?php
                    require_once 'class/product.php';
                    $product = new product();
                    $read  = $product->category_product();
                    while($row=$read->fetch_array()){
                        ?>
                        <div class="col-md-4 products-right-grids-bottom-grid">
                            <div class="new-collections-grid1 products-right-grid1 animated wow slideInUp" data-wow-delay=".5s">
                                <div class="new-collections-grid1-image">
                                    <a href="single.php?product=<?php echo $row['id']; ?>" class="product-image"><img src="../admin/data/<?php echo $row['image']; ?>" alt=" " class="img-responsive"></a>
                                    <div class="new-collections-grid1-image-pos products-right-grids-pos">
                                        <a href="single.php?product=<?php echo $row['id']; ?>">Quick View</a>
                                    </div>
                                </div>
                                <h4><a href="single.php?product=<?php echo $row['id']; ?>"><?php echo $row['product_name']; ?></a></h4>
                                <p><span style="color:red;">Brand:</span> <?php echo $row['brand']; ?></p>
                                <div class="simpleCart_shelfItem products-right-grid1-add-cart">
                                    <p><i>$<?php echo $row['discount']; ?></i> <span class="item_price">$<?php echo $row['price']; ?></span><a class="item_add" href="single.php?product=<?php echo $row['id']; ?>">add to cart </a></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="clearfix"> </div>
                </div>
                <nav class="numbering animated wow slideInRight" data-wow-delay=".5s">
                    <ul class="pagination paging">
                        <li>
                            <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="active"><a href="#">1<span class="sr-only">(current)</span></a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li>
                            <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- //breadcrumbs -->
<?php require('footer.php'); ?>