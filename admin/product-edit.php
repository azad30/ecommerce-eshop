<?php
require('header.php');
?>
<?php
if(isset($_POST['p_update'])){
$update = $product->update();
}
?>
<!--inner block start here-->
<div class="inner-block">
    <form method="POST" action="" enctype="multipart/form-data">
        <?php
        if(isset($_GET['edit'])){
            $read  = $product->single_product();
            while($row = $read->fetch_array())
            {
                ?>
                <div class="form-group">
                    <label for="product">Product Name</label>
                    <input type="text" name="product_name" id="productName" value="<?php echo $row['product_name']; ?>" class="form-control">
                </div>
                <input type="hidden" name="hiddenid" id="productId" value="<?php echo $row['id'];?>">
                <div class="form-group">
                    <label for="produc">Upload Image</label>
                    <input type="file" name="image" id="productImage" class="form-control">
                </div>
                <div class="form-group">
                    <label for="produc">Price</label>
                    <input type="number" name="price" id="price" value="<?php echo $row['price']; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="produc">Quantity</label>
                    <input type="number" name="quantity" id="quantity" value="<?php echo $row['qty']; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="produc">Discount</label>
                    <input type="number" name="discount" id="discount" value="<?php echo $row['discount']; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="produc">Brand</label>
                    <input type="text" name="brand" id="brand" value="<?php echo $row['brand']; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="produc">Description</label>
                    <textarea class="form-control" id="description" name="description"rows="5" id="comment"><?php echo $row['description']; ?></textarea>
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
            <?php } }?>
        <input type="submit" class="btn btn-info" name="p_update" value="UPDATE">
    </form>
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

<!-- product edit section starts here -->
<script type="text/javascript">

    $('.btn-info').click(function() {

        var productName  = $("#productName").val();
        var categoryName = $("#sel1").val();
        var price        = $("#price").val();
        var quantity     = $("#quantity").val();
        var discount     = $("#discount").val();
        var brand        = $("#brand").val();
        var description  = $("#description").val();
        var image        = $("#product_image").val();


        // For product validation area
        var productLength                   = productName.length;
        var checkFirstCharacterOfProduct    = productName.charAt(0);
        var str = $('#productName').val();
        var regex = /[^\w\s]/gi;

        // For Brand validation area
        var brandLength                   = brand.length;
        var checkFirstCharacterOfBrand    = brand.charAt(0);
        var str_brand = $('#brand').val();
        var regex_brand = /[^\w\s]/gi;

        // For Description Validation area
        var descriptionLength                   = description.length;
        var checkFirstCharacterOfDescription    = description.charAt(0);
        var str_description = $('#description').val();
        var regex_description = /[^\w\s]/gi;


        if(productName != '' && price != '' && quantity != '' && brand != '' && description != '')


        // if(productName != '')
        {

            // product validation section starts  //
            if(checkFirstCharacterOfProduct <='9' && checkFirstCharacterOfProduct >='0'){
                alert("Product can't be start with 0~9");
            }
            else if (checkFirstCharacterOfProduct == '_'){
                alert("Product Starts with underscore (_) is inavalid");
            }
            else if(regex.test(str) == true){
                alert("Product containing special character is inavalid");
            }
            else if(productLength > 15){
                alert("Product maxlength : 15");
            }
            else if(productLength < 3){
                alert("Product minlength : 3");
            }
            //   product validation section end //


            //  Brand Validation Section Starts

            else if(checkFirstCharacterOfBrand <='9' && checkFirstCharacterOfBrand >='0'){
                alert("Brand can't be start with 0~9");
            }
            else if (checkFirstCharacterOfBrand == '_'){
                alert("Brand Starts with underscore (_) is inavalid");
            }
            else if(regex_brand.test(str_brand) == true){
                alert("Brand containing special character is inavalid");
            }
            else if(brandLength > 15){
                alert("Brand maxlength : 15");
            }
            else if(brandLength < 3){
                alert("Brand minlength : 3");
            }
            //  Brand Validation Section end

            //  Description Validation Section Starts
            else if(checkFirstCharacterOfDescription <='9' && checkFirstCharacterOfDescription >='0'){
                alert("Description can't be start with 0~9");
            }
            else if (checkFirstCharacterOfDescription == '_'){
                alert("Description Starts with underscore (_) is inavalid");
            }
            else if(regex_description.test(str_description) == true){
                alert("Description containing special character is inavalid");
            }
            else if(descriptionLength > 50){
                alert("Description maxlength : 50");
            }
            else if(descriptionLength < 10){
                alert("Description minlength : 10");
            }
            //  Description Validation Section end

            // For Price, Quantity section starts
            else if(quantity >50){
                alert("Max Quantity: 50");
            }
            else if(quantity < 1){
                alert("Min Quantity: 1");
            }
            else if (price > 100000){
                alert("Max Price : 100000");
            }
            else if(price < 3000){
                alert("Min Price : 3000");
            }
            // For Price, Quantity section ends

            else {
                $.ajax({
                    url:"../admin/class/product_update.php",
                    method:'POST',
                    data:new FormData(this),
                    //   data : { productName : productName, categoryName : categoryName, price : price, quantity : quantity, dicount :discount, brand : brand, description : description, image :image },
                    contentType:false,
                    processData:false,
                    success:function(data)
                    {
//                                alert(data);
                        // $('#user_form')[0].reset();
                        // $('#userModal').modal('hide');
                        // location.href = 'product.php';
                        console.log(data);
                    },

                    error : function(){
                        console.log("error");
                    }

                });
            }
        }
        else
        {
            alert("Fields are Required");
        }

    });

</script>


// product edit section ends here



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


                      
						
