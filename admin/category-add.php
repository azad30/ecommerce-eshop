<?php 
require('header.php'); 
?>
<?php
if(isset($_POST['submit'])){
	$crud->insert();
}
?>
<!--inner block start here-->

<script>
    function validateForm() {
        var x = document.forms["category"]["category_name"].value;
        if (x == "") {
            document.getElementById('errordiv').innerHTML="*Please enter a category*";
            $("#errordiv").delay(1200).fadeOut(300);
            return false;
        }
        if (!/^[a-zA-Z]*$/g.test(document.category.category_name.value)) {
            document.getElementById('errord').innerHTML="*Invalid name*";
            $("#errord").delay(1200).fadeOut(300);
            document.category.category_name.focus();
            return false;
        }
    }
</script>
<div class="inner-block">
    <div class="blank">
    	<h2>Category</h2>
    	<div class="blankpage-main">
	    <form name="category" method="post" onsubmit="return validateForm()" action="">
            <div id="errordiv" align="left" style="margin-left: auto; color:red;  margin-right: auto;">
            </div>
            <div id="errord" align="left" style="margin-left: auto; color:red;  margin-right: auto;">
            </div>
		  <div class="form-group">
			<label for="name">Category Name</label>
			<input type="text" name="category_name" class="form-control">
		  </div>
		  <button type="submit" name="submit" class="btn btn-info">Save</button>
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


                      
						
