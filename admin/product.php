<?php require_once('header.php'); ?>
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
<!--inner block start here-->
<div class="inner-block">
    <div class="product-block">

<!--        new section starts here.............-->
        <div class="container box">
            <div class="table-responsive">
                <div align="left">
                    <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">++</button>
                </div>
            </div>
        </div>
        <br><br>


        <div id="userModal" class="modal fade">
            <div class="modal-dialog">
                <form method="post" id="user_form" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add User</h4>
                        </div>
                        <div class="modal-body">
                            <label>Enter Product Name</label>
                            <input type="text" name="product_name" id="product_name" class="form-control" />
                            <br />
                            <div class="form-group">
                                <label for="produc">Select Category</label>
                                <select name="category_name" class="form-control" id="category_name" required>
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
                            <label>Enter Price</label>
                            <input type="number" name="price" id="price" class="form-control" />
                            <br />
                            <label>Enter Quantity</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" />
                            <br />
                            <label>Enter Discount</label>
                            <input type="number" name="discount" id="discount" class="form-control" />
                            <br />
                            <label>Enter Brand Name</label>
                            <input type="text" name="brand" id="brand" class="form-control" />
                            <br />
                            <label>Enter Description</label>
                            <input type="text" name="description" id="description" class="form-control" />
                            <br />
                            <label>Select User Image</label>
                            <input type="file" name="user_image" id="user_image" />
                            <span id="user_uploaded_image"></span>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="user_id" id="user_id" />
                            <input type="hidden" name="operation" id="operation" />
                            <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

<!--        script for product add section-->
        <script type="text/javascript" language="javascript" >
            $(document).ready(function(){
                $('#add_button').click(function(){
                    $('#user_form')[0].reset();
                    $('.modal-title').text("Add User");
                    $('#action').val("Add");
                    $('#operation').val("Add");
                    $('#user_uploaded_image').html('');
                });



                $(document).on('submit', '#user_form', function(event){
                    event.preventDefault();
                    var productName     = $('#product_name').val();
                    var categoryName    = $('#category_name').val();
                    var price           = $('#price').val();
                    var quantity        = $('#quantity').val();
                    var discount        = $('#discount').val();
                    var brand           = $('#brand').val();
                    var description     = $('#description').val();
                    var extension       = $('#user_image').val().split('.').pop().toLowerCase();

                    // For product validation area
                    var productLength                   = productName.length;
                    var checkFirstCharacterOfProduct    = productName.charAt(0);
                    var str = $('#product_name').val();
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


                    if(extension != '')
                    {
                        if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                        {
                            alert("Invalid Image File");
                            $('#user_image').val('');
                            return false;
                        }
                    }
                    if(productName != '' && categoryName != '' && price != '' && quantity != '' && brand != '' && description != '')
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
                                url:"../admin/class/product_crud.php",
                                method:'POST',
                                data:new FormData(this),
                                contentType:false,
                                processData:false,
                                success:function(data)
                                {
//                                alert(data);
                                    $('#user_form')[0].reset();
                                    $('#userModal').modal('hide');
                                    location.href = 'product.php';
                                }
                            });
                        }
                    }
                    else
                    {
                        alert("Fields are Required");
                    }
                });

            });
        </script>
<!--        end of product section script-->


        <?php
        $read  = $product->show();
        while($row=$read->fetch_array()){
            ?>
            <div class="col-md-3 product-grid">
                <div class="product-items deleteProduct<?php echo $row['id']; ?>">
                    <div class="project-eff">
                        <img width="100%" height="200px" src="data/<?php echo $row['image']; ?>">
                    </div>
                    <div class="produ-cost">
                        <h4>Category: <?php echo $row['name']; ?></h4>
                        <h4>Name:  <?php echo $row['product_name']; ?></h4>
                        <h5>Price: <?php echo $row['price']; ?>$</h5>
                    </div>
                    <a href="product-edit.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                    <a class="btn btn-danger" id="<?php echo $row['id']; ?>">Delete</a>
                </div>
            </div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>


            <!--             product delete section-->
            <script type="text/javascript">

                $('.btn-danger').click(function() {
                    var id = $(this).attr("id");
                    var divID = $(this).attr("divID");

                    var sureToDelete = confirm("Do you want to Delete ?");

                    if (sureToDelete)
                    {
                        $.ajax({
                            type: "POST",
                            url: "../admin/class/productDelete.php",
                            data: ({
                                id: id
                            }),
                            cache: false,
                            success: function(html) {
                                $(".deleteProduct" + id).fadeOut('slow');
                            }
                        });
                    }
                    else
                    {
                        return false;
                    }
                });

            </script>

        <?php } ?>
        <div class="clearfix"> </div>
    </div>
</div>
<?php
if(isset($_GET['delete'])){
    $delete =$product->delete();
}
?>
<!--inner block end here-->
<link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
<script type="text/javascript" src="js/nivo-lightbox.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#nivo-lightbox-demo a').nivoLightbox({ effect: 'fade' });
    });
</script>

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


<!--            product edit scripting section-->

<script type="text/javascript">
    $(document).ready(function(){
        $('.btn-primary').click(function() {

            var productName  = $("#product_name").val();
            var categoryName = $("#cat").val();
            var price        = $("#price").val();
            var quantity     = $("#quantity").val();
            var discount     = $("#discount").val();
            var brand        = $("#brand").val();
            var description  = $("#description").val();
            var image        = $("#image_id").val();

            var extension = $('#image_id').val().split('.').pop().toLowerCase();
            if(extension != '')
            {
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                {
                    alert("Invalid Image File");
                    $('#image_id').val('');
                    return false;
                }
            }


            $.ajax({
                method  : "POST",
                url     : "../admin/class/product_crud.php",
                data    : new FormData(this),
                contentType:false,
                processData:false,
                data    : ({
                    categoryName : categoryName, productName : productName, price : price, quantity : quantity, discount : discount, brand : brand, description : description, image :  image
                }),
                cache: false,
                success: function(data) {
                    console.log("success");
                },
                error: function () {
                    console.log("error");
                }
            });
        });
    });

    // end of product edit scripting section

</script>
<!--scrolling js-->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!--//scrolling js-->
<script src="js/bootstrap.js"> </script>
<!-- mother grid end here-->
</body>
</html>




