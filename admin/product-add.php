<?php
require('header.php');
?>
<?php
if(isset($_POST['upload'])){
    $product->insert();
}
?>
<!--inner block start here-->
<div class="inner-block">
    <div class="blank">
        <h2>Product Upload</h2>
        <div class="blankpage-main">
            <form method="post" action="product-add.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="produc">Product Name</label>
                    <input type="text" name="product_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="produc">Select Category</label>
                    <select name="cat" class="form-control" id="sel1">
                        <?php
                        $crud = new category();
                        $query = "SELECT * FROM category";
                        $read  = $crud->show($query);
                        while($row=mysqli_fetch_assoc($read)){
                            ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="produc">Price</label>
                    <input type="number" name="price" class="form-control">
                </div>
                <div class="form-group">
                    <label for="produc">Quantity</label>
                    <input type="number" name="quantity" class="form-control">
                </div>
                <div class="form-group">
                    <label for="produc">Discount</label>
                    <input type="number" name="discount" class="form-control">
                </div>
                <div class="form-group">
                    <label for="produc">Brand</label>
                    <input type="text" name="brand" class="form-control">
                </div>
                <div class="form-group">
                    <label for="produc">Description</label>
                    <textarea class="form-control" name="description"rows="5" id="comment"></textarea>
                </div>
                <div class="form-group">
                    <label for="produc">Upload Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <button type="submit" name="upload" class="btn btn-info">Save</button>
            </form>
        </div>
    </div>
</div>
<!--inner block end here-->
<?php require_once('footer.php'); ?>
</div>
</div>
<?php require_once('sidebar.php'); ?>
<script>
    var toggle = true;

    $(".sidebar-icon").click(function() {
        if (toggle)
        {
            $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
            $("#menu span").css({"position":"absolute"});
        }
        else
        {
            $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
            setTimeout(function() {
                $("#menu span").css({"position":"relative"});
            }, 400);
        }
        toggle = !toggle;
    });
</script>
<!--scrolling js-->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!--//scrolling js-->
<script src="js/bootstrap.js"> </script>
<!-- mother grid end here-->
<!-- script-for sticky-nav -->
<script>
    $(document).ready(function() {
        var navoffeset=$(".header-main").offset().top;
        $(window).scroll(function(){
            var scrollpos=$(window).scrollTop();
            if(scrollpos >=navoffeset){
                $(".header-main").addClass("fixed");
            }else{
                $(".header-main").removeClass("fixed");
            }
        });

    });
</script>
<!-- /script-for sticky-nav -->
</body>
</html>


                      
						
