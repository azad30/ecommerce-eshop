<?php require_once('header.php'); ?>
<!--inner block start here-->
<div class="inner-block">
    <div class="product-block">
<!--        Calling modal for create_category-->
    	<div class="pro-head">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">+</button>
<!--            <form name="category" method="POST" onsubmit="return validateForm()" action="">-->
            <form name="category" method="POST" action="">
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" style="text-align: center">Enter Category Name</h4>
                        </div>

                        <div class="modal-body">

                                <div id="errordiv" align="left" style="margin-left: auto; color:red;  margin-right: auto;">
                                </div>
                                <div id="errord" align="left" style="margin-left: auto; color:red;  margin-right: auto;">
                                </div>
                                <div class="form-group">
                                    <label for="name">Category Name</label>
                                    <input type="text" name="category_name" id="categoryName" class="form-control">
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Save</button>

                        </div>

                    </div>
                </div>
            </div>
            </form>
    	</div>
		<br>



<!--                    calling modal for edit_category-->

            <div class="pro-head">
                <form name="category" method="POST" onsubmit="return validateForm()" action="">
                    <div class="modal fade" id="categoryEdit" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title" style="text-align: center">Edit Category</h4>
                                </div>

                                <div class="modal-body">
                                    <div id="errordiv" align="left" style="margin-left: auto; color:red;  margin-right: auto;">
                                    </div>
                                    <div id="errord" align="left" style="margin-left: auto; color:red;  margin-right: auto;">
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Category Name</label>
                                        <input type="hidden" name="categoryID" id="categoryID" class="form-control">
                                        <input type="text" name="category_name" id="categoryName" class="form-control" minlength="1" maxlength="20" required>
                                        <div id="dynamic-content"></div>
                                    </div>
                                    <button type="button" name="submit" class="btn btn-warning" id="catUpdateID">Save</button>

                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>


        <table class="table" id="myTable">
    <thead>
      <tr>
        <th>id</th>
        <th>Category Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
	<?php
	$read  = $crud->show();
	$s_id = 1;
	while($row=$read->fetch_array()){
	?>
      <tr class="deleteCategory<?php echo $row['id']; ?>">
        <td id="catID"><?php echo $s_id ++; ?></td>
        <td id="categoryName"><?php echo $row['name']; ?></td>
        <td>
            <a class="btn btn-info" cat_name="<?php echo $row['name']; ?>" id="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#categoryEdit">Edit</a>
            <a class="btn btn-danger" id="<?php echo $row['id']; ?>">Delete</a>
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
    </div>
</div>

<div class="category"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<!--category Edit (data show into popup modal) section-->
<script type="text/javascript">

$(document).ready(function(){
    $("#myTable").on('click','.btn-info',function(){

        var catID = $(this).attr("id");
        var catName = $(this).attr("cat_name");

         $(".modal-body #categoryID").val(catID);
         $(".modal-body #categoryName").val(catName);

            $.ajax({
                type: "POST",
                url: "../admin/class/categoryDelete.php",
                data: ({
                    catID : catID
                }),
                cache: false,
                success: function(data) {
                    console.log(data);
                },
                error: function (data) {
                    console.log('error');
                }
            });
    });
});
</script>


<!--category update section-->

<script type="text/javascript">

    $('#catUpdateID').click(function() {

        var categoryID = $("#categoryID").val();
        var categoryName = $("#categoryEdit").find("input[name='category_name']").val();

        var str = $('#categoryName').val();
        var regex = /[^\w\s]/gi;
        var catLength = categoryName.length;
        var checkFirstCharacter = categoryName.charAt(0);

        if (categoryName == ''){
            alert('Filed is required');
        }
        else if( checkFirstCharacter == '_') {
            alert("First Character Underscore not allowed");
        }
        else if( checkFirstCharacter <='9' && checkFirstCharacter >='0') {
            alert("First Character must be a string");
        }
        else if(regex.test(categoryName) == true){
            alert('Special Character Forbidden');
        }
        else if(catLength > 20){
            alert('Category Name Must be within 5-20 characters');
        }
        else if(catLength < 5){
            alert('Category Name Must be within 5-20 characters');
        }
        else {
            $.ajax({
                method: "POST",
                url: "../admin/class/categoryDelete.php",
                data: ({
                    cat_update_id : categoryID, updateCategoryName : categoryName
                }),

                success: function(data) {
                    //$("#myTable" + id).fadeOut('slow');
                    location.href = 'category.php';
                }
            });
        }
    });

</script>


<!--category create section-->
<script type="text/javascript">
    $(document).ready(function(){

    $('.btn-primary').click(function() {

        var categoryName = $("#categoryName").val();
        var str = $('#categoryName').val();
        var regex = /[^\w\s]/gi;
        var catLength = categoryName.length;
        var checkFirstCharacter = categoryName.charAt(0);

        if (categoryName == ''){
            alert('Category Filed is required');
        }
        else if(checkFirstCharacter == '_') {
            alert("First Character Underscore not allowed");
        }
        else if( checkFirstCharacter <='9' && checkFirstCharacter >='0') {
            alert("First Character must be a string");
        }
        else if(regex.test(str) == true){
            alert('Special Character Forbidden');
        }
        else if(catLength > 20){
            alert('Category Name Must be within 5-20 characters');
        }
        else if(catLength < 5){
            alert('Category Name Must be within 5-20 characters');
        }
        else {

            $.ajax({
                type: "POST",
                url: "../admin/class/categoryDelete.php",
                data: ({
                    categoryName : categoryName
                }),
                cache: false,
                success: function(data) {
                    location.href = 'category.php';
                }
            });
        }
    });

    });

</script>


<!--category delete section-->

<script type="text/javascript">

    $('.btn-danger').click(function() {
        var id = $(this).attr("id");
        var divID = $(this).attr("divID");

        var sureToDelete = confirm("Do you want to Delete ?");

        if (sureToDelete)
        {
            $.ajax({
                type: "POST",
                url: "../admin/class/categoryDelete.php",
                data: ({
                    id: id
                }),
                cache: false,
                success: function(html) {
                    $(".deleteCategory" + id).fadeOut('slow');
                }
            });
        }
        else
        {
            return false;
        }
    });

</script>
<script>
    function validateForm() {
        var x = document.forms["category"]["category_name"].value;
        if (x == "") {
            document.getElementById('errordiv').innerHTML="*Please enter a category*";
            $("#errordiv").delay(12000).fadeOut(3000);
            return false;
        }
//        if (^[a-zA-Z][a-zA-Z0-9.,$;]+$.test(document.category.category_name.value)) {
//            document.getElementById('errord').innerHTML="*Invalid name*";
//            $("#errord").delay(1200).fadeOut(300);
//            document.category.category_name.focus();
//            return false;
//        }
    }
</script>


<?php
if(isset($_GET['delete'])){
  $delete =$crud->delete();
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
<!--scrolling js-->
		<script src="js/jquery.nicescroll.js"></script>
		<script src="js/scripts.js"></script>
		<!--//scrolling js-->
<script src="js/bootstrap.js"> </script>
<!-- mother grid end here-->
</body>
</html>


                      
						
