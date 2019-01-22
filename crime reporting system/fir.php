<?php
include('admin/includes/conn.php')
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Crime Reporting</title>
 
	<link href="css/style.css" rel="stylesheet">

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="admin/assets/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="admin/assets/css/style.css">
        <link rel="stylesheet" href="admin/assets/awesome/font-awesome.css">
        <link rel="stylesheet" href="admin/assets/css/animate.css">
    </head>
    <body>

<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top " id="home">
	<div class="container-fluid">
		<a class="navbar-brand" href="#">
			<img src="images/logo.jpg">
		</a>
		
		
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarResponsive">
	<ul class="navbar-nav ml-auto">
		<li class="nav-item active">
			<a class="nav-link" href="index.php" style="color: white;">Home</a>
		</li>

	</ul>

	</div>

	</div>

	
</nav>


<div class="line"></div>

                            <?php
                            if(isset($mysqli,$_POST['submit'])){
                            $employee_id = mysqli_real_escape_string($mysqli,$_POST['employee_id']);
                            $severity = mysqli_real_escape_string($mysqli,$_POST['severity']);
                            $notes = mysqli_real_escape_string($mysqli,$_POST['notes']);
                            $as = rand(1000,9999);     
                            $case_num = date("YmdHis").'.'.$as;
      
                  
                            $sql = "INSERT INTO cases(employee_id,severity,case_num,notes)VALUES('$employee_id','$severity','$case_num','$notes')";
                            $results = mysqli_query($mysqli,$sql);

                        if($results==1){
                              ?>
                        <div class="alert alert-success strover animated bounce" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Successfully! </strong><?php echo'Case has successfully added';?></div>
                        <?php

                          }else{
                                ?>
                        <div class="alert alert-danger samuel animated shake" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Danger! </strong><?php echo'OOPS something went wrong';?></div>
            
                        <?php    
                          }      
                
            }
                
                ?>
		<div class="panel panel-default sammacmedia">
            <div class="panel-heading">Register Complaint</div>
        <div class="panel-body">
            <form method="post" action="fir.php">
        <div class="row form-group">
          <div class="col-lg-6">
            <label>Select Case ID</label>
             <?php
                       
                    $query1 = "SELECT * FROM `employees`";
                    $result1 = mysqli_query($mysqli, $query1);
                    ?>
                    <select class="form-control" name="employee_id">
                    <?php while($row1 = mysqli_fetch_array($result1)):;?>
                        <option><?php echo $row1['employee_id'];?></option>
                        <?php endwhile;?>
                       
                       </select>
            </div>  
            <div class="col-lg-6">
            <label>Case Severity</label>
                <select class="form-control" name="severity">
                <option>Normal</option>
                <option>Critical</option>  
                <option>Danger</option>    
                </select>
            </div>
           </div>
                <div class="row form-group">
          <div class="col-lg-12">
              <textarea class="form-control" id="editor" name="notes"></textarea>
            </div>  
             
           </div>
                
                <div class="row">
                <div class="col-md-6">
                  <button type="submit" name="submit" class="btn btn-suc btn-block"><span class="fa fa-plus"></span> Process</button>  
                </div>
                     <div class="col-md-6">
                  <button type="reset" class="btn btn-dan btn-block"><span class="fa fa-times"></span> Cancel</button>  
                </div>
                </div>
            </form>
<!--- Footer -->
<footer>
	<div class="container-fluid padding">
		<div class="row text-center">
			<div class="col-md-4">
				<img src="images/logo.jpg">
				<hr class="light">
				<p>+91-000-000-0000</p>
				<p>jcepolice@email.com</p>
				
				<p>belgaum,karnataka, 00000</p>
		</div>
		<div class="col-md-4">
			<hr class="light">
			<h5>Our Hours</h5>
			<hr class="light">
			<p>24/7 at your service</p>
			<img src="images/100.png">
	</div >
	<div class="col-md-4">
			<hr class="light">
			<h5>Designed By</h5>
			<hr class="light">
			<p>Akhil & Abhay</p>
			

	</div >

	<div class="col-12">
		<hr class="light-100">
		<h5>&copy; jcepolice</h5>


<div class="arr-w3ls" style="float: right;">
	<a href="#home" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> <img src="images/arr.png"></span></a>

	</div>
	</div>
</div>
</div>

</footer>




<script type="text/javascript" src="admin/assets/js/jquery-2.1.4.min.js"></script>


<script type="text/javascript" src="admin/assets/js/move-top.js"></script>
<script type="text/javascript" src="admin/assets/js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>


<!-- smooth scrolling -->
	<script type="text/javascript"">
		$(document).ready(function() {
		
		/*	var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
			*/						
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	



	
<!-- //smooth scrolling -->

<script type="text/javascript" src="admin/assets/js/bootstrap-3.1.1.min.js"></script>



<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5bf70a8040105007f379358f/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->


</body>
</html>













