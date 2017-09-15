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
        <!--        <div class="pro-head">-->
        <!--            <a href="product-add.php" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i></a>-->
        <!--        </div>-->

        <div class="pro-head">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">+</button>
            <form method="post" action="" id="product_form" enctype="multipart/form-data">
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title" style="text-align: center">Product Info Entry</h4>
                            </div>

                            <div class="modal-body">

                                <div id="errordiv" align="left" style="margin-left: auto; color:red;  margin-right: auto;">
                                </div>
                                <div id="errord" align="left" style="margin-left: auto; color:red;  margin-right: auto;">
                                </div>
                                <div class="blank">
                                    <h2>Product Upload</h2>
                                    <div class="blankpage-main">

                                        <div class="form-group">
                                            <label for="produc">Product Name</label>
                                            <input type="text" name="product_name" id="product_name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="produc">Select Category</label>
                                            <select name="cat" class="form-control" id="cat" required>
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
                                            <input type="number" name="price" id="price" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="produc">Quantity</label>
                                            <input type="number" name="quantity" id="quantity" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="produc">Discount</label>
                                            <input type="number" name="discount" id="discount" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="produc">Brand</label>
                                            <input type="text" name="brand" id="brand" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="produc">Description</label>
                                            <textarea class="form-control" name="description" id="description" rows="5" id="comment"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="produc">Upload Image</label>
                                            <input type="file" name="image" id="image_id" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <button type="button" name="submit" class="btn btn-primary">Save</button>

                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
        <br>

        <br>
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


<!--            product create section-->

<script type="text/javascript">
    $(document).ready(function(){
        $('.btn-primary').click(function() {

//           var image = $('input[type=file]').val();
//           var formData = new FormData($('#form')[0]);


            var categoryName = $("#cat").val();
            var productName  = $("#product_name").val();
            var price        = $("#price").val();
            var quantity     = $("#quantity").val();
            var discount     = $("#discount").val();
            var brand        = $("#brand").val();
            var description  = $("#description").val();
            var image        = $("#image_id").val();


            var extension = $('#image_id').val().split('.').pop().toLowerCase();
            //alert(extension);
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
//                contentType: false,
//                processData: false,
                success: function(data) {
                    // location.href = 'product.php';
                    console.log("success");
                },
                error: function () {
                    console.log("error");
                }
            });
        });
    });

</script>







<!--scrolling js-->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!--//scrolling js-->
<script src="js/bootstrap.js"> </script>
<!-- mother grid end here-->
</body>
</html>




