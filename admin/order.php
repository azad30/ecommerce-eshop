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
    <div class="blank">
    	<h2>Product Order List</h2>
    	<div class="blankpage-main">
		   <table class="table table-striped">
			<thead>
			  <tr>
				<th>Order Id</th>
				<th>L</th>
				<th>Email</th>
			  </tr>
			</thead>
			<tbody>
			  <tr>
				<td>John</td>
				<td>Doe</td>
				<td>john@example.com</td>
			  </tr>
			  <tr>
				<td>Mary</td>
				<td>Moe</td>
				<td>mary@example.com</td>
			  </tr>
			  <tr>
				<td>July</td>
				<td>Dooley</td>
				<td>july@example.com</td>
			  </tr>
			</tbody>
          </table>
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
</body>
</html>


                      
						
