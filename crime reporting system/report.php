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
                            $name = mysqli_real_escape_string($mysqli,$_POST['fname']);
                            $surname = mysqli_real_escape_string($mysqli,$_POST['surname']);
                            $email = mysqli_real_escape_string($mysqli,$_POST['email']);
                            $phon = mysqli_real_escape_string($mysqli,$_POST['phone']); 
                            $gender = mysqli_real_escape_string($mysqli,$_POST['gender']);     
                            $joined = date(" d M Y ");
                            $employee_id = rand(9999999,1000000);    
                            $tmp = rand(1,9999);
                            $phone = '263'.$phon;   
                            $file = $_FILES['file'];
                            $fileName =$file['name'];
                            $fileTmpName = $file['tmp_name'];
                            $fileSize = $file['size'];
                            $fileError = $file['error'];
                            $fileType = $file['type'];
                            $fileExt = explode('.', $fileName);
                            $fileActualExt = strtolower(end($fileExt));
                            $allowed = array('jpg','jpeg','png');
    

                            $sql_n = "SELECT * FROM employees WHERE phone ='$phone'";
                            $res_n = mysqli_query($mysqli, $sql_n);    
                            $sql_e = "SELECT * FROM employees WHERE email ='$email'";
                            $res_e = mysqli_query($mysqli, $sql_e);
                            if(mysqli_num_rows($res_e) > 0){
                            ?>
                             <div class="alert alert-danger samuel animated shake" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Danger! </strong><?php echo'sorry the email is already allocated to someone';?></div>
                        <?php    
                       }elseif(mysqli_num_rows($res_n) > 0){
                        ?>
                        <div class="alert alert-danger samuel animated shake" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Danger! </strong><?php echo'sorry the phone is already allocated to someone';?></div>
                        <?php    
                        }
                    else{      
                  
                $sql = "INSERT INTO employees(name,surname,email,joined,gender,phone,tmp,employee_id)VALUES('$name','$surname','$email','$joined','$gender','$phone','$tmp','$employee_id')";
                $results = mysqli_query($mysqli,$sql);
                if(in_array($fileActualExt, $allowed)){
                if($fileError === 0){
                if($fileSize < 1000000){
                $fileNameNew = "user".$tmp.".".$fileActualExt;
                $fileDestination ='admin/assets/image/uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $sqli = "INSERT INTO picture(name,tmp)VALUES('$fileNameNew','$tmp')";
                mysqli_query($mysqli,$sqli);
                //header('Location:acc.php');
                    }
                        }
                            }
                        
                        
                        if($results==1){
                              ?>
                        <div class="alert alert-success strover animated bounce" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Successfully! </strong><?php echo'Thank you for adding new employee';?></div>
                        <?php

                          }else{
                                ?>
                        <div class="alert alert-danger samuel animated shake" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Danger! </strong><?php echo'OOPS something went wrong';?></div>
            
                        <?php    
                          }      
                 }
            }
                
                ?>
        <div class="panel panel-default sammacmedia">
            <div class="panel-heading">Report</div>
        <div class="panel-body">
            <form method="post" action="report.php" enctype="multipart/form-data">
        <div class="row form-group">
          <div class="col-lg-6">
            <label>Name</label>
              <input type="text" class="form-control" name="fname" pattern="[A-Za-z]{3,}" required>
            </div>  
             <div class="col-lg-6">
            <label>Surname</label>
              <input type="text" class="form-control" name="surname" pattern="[A-Za-z]{3,}" required>
            </div>  
        </div>
            <div class="row form-group">
          <div class="col-lg-6">
            <label>Email</label>
              <input type="email" class="form-control" name="email" required>
            </div>  
             <div class="col-lg-6">
            <label>Phone</label>
              <input type="text" class="form-control" name="phone" pattern="[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]" placeholder="773452120" required>
            </div>  
        </div>   
         <div class="row form-group">
          <div class="col-lg-6">
            <label>Picture</label>
             <input type="file" class="form-control" name="file" required>
            </div>  
             <div class="col-lg-6">
            <label>Gender</label>
             <select class="form-control" name="gender">
              <option>F</option>
              <option>M</option>      
              </select>
            </div>  
        </div>

                <div class="row">
                <div class="col-md-4">
                  <button type="submit" name="submit" class="btn btn-suc btn-block"><span class="fa fa-plus"></span> Process</button>  
                </div>

                              <div class="col-md-4">
                  <button type="button" class="btn btn-dan btn-block"><span class="fa fa-times"></span> <a href="fir.php">Next</a></button>  
                </div>

                     <div class="col-md-4">
                  <button type="reset" class="btn btn-dan btn-block"><span class="fa fa-times"></span> Cancel</button>  
                </div>
   
                </div>
            </form>

            </div>
                </div>
                <div class="line"></div>
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



<script>

// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


</script>














</body>
</html>



            </div>
            
        </div>





        <!-- jQuery CDN -->
         <script src="assets/js/jquery-1.10.2.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="assets/js/bootstrap.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
             $('sams').on('click', function(){
                 $('makota').addClass('animated tada');
             });
         </script>
         <script type="text/javascript">

        $(document).ready(function () {
 
            window.setTimeout(function() {
        $("#sams1").fadeTo(1000, 0).slideUp(1000, function(){
        $(this).remove(); 
        });
            }, 5000);
 
        });
    </script>
    </body>
</html>
