<?php require('header.php'); ?>
<?php
if(isset($_POST['update'])){
  $update = $crud->update();
}
?>
<!--inner block start here-->
<div class="inner-block">
<form method="POST" action="">
 <?php
if(isset($_GET['edit'])){
    $read  = $crud->single_cat();
while($row=$read->fetch_array())
{
?>
 <input type="text" name="name" class="form-control" value="<?php echo $row['name'];?>">
 <input type="hidden" name="hiddenid" value="<?php echo $row['id'];?>">
 <?php } }?>
    <br>
 <input type="submit" class="btn btn-info" name="update" value="Update">
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


                      
						
