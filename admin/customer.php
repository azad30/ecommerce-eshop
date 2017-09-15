<?php require_once('header.php'); ?>
<!--inner block start here-->
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<div class="inner-block">
    <div class="product-block">
        <table class="table">
            <thead>
            <tr>
                <th>id</th>
                <th>Customer</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Country</th>
                <th>Zip Code</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $read  = $customer->all_customer();
            while($row=$read->fetch_array()){
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['user_name']; ?></td>
                    <td><?php echo $row['user_email']; ?></td>
                    <td><?php echo $row['user_mobile']; ?></td>
                    <td><?php echo $row['user_address']; ?></td>
                    <td><?php echo $row['user_country']; ?></td>
                    <td><?php echo $row['zip_code']; ?></td>
                    <td><?php echo ($row['status']==0)? 'Inactive' : 'Active'; ?></td>

                    <td>
                        <i data="<?php echo $row['id'];?>" data-toggle="tooltip" title="<?php echo ($row['status']==0)? 'Sure to Activate !!!' : 'Sure to Inactive ???'; ?>" class="status_checks btn
                            <?php
                                echo ($row['status'])? 'btn-danger': 'btn-success'?>"><?php echo ($row['status'])? 'Inactive' : 'Active';
                            ?>
                        </i>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<script type="text/javascript">
    $(document).on('click','.status_checks',function(){
        var status = ($(this).hasClass("btn-success")) ? '1' : '0';
        var msg = (status=='0')? 'Deactivate' : 'Activate';

        if(confirm("Are you want to "+ msg)){
            var current_element = $(this);
            $.ajax({
                type : "POST",
                url  : "../admin/class/customer_status.php",
                data : {'id':$(current_element).attr('data'),'status':status},
                success: function(html)
                {
                    cache: false,

                        location.href='customer.php';
                }
            });
        }
    });
</script>

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


                      
						
