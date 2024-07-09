<?php
require 'dbconnect.php';
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Job Applicant System</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		
		<!-- all css here -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/pe-icon-7-stroke.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/meanmenu.css">
        <link rel="stylesheet" href="assets/css/shortcodes/shortcode.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
        <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body style="font-family:verdana">
        
        <div class="wraper">
            
            <!-- header end -->
            <!-- slider start -->
            <div style="background-image:url('bg.jpg');background-repeat:no-repeat; width:100%; height:420px;">
                <div class="container-fluid text-center">
                    <div class="slider-text" style="margin-top:7%; margin-left:45%;">
                        <h2 style="color:white; font-family:verdana">Career</h2>
						<a href="../join/login.php">Login as admin</a>
                    </div>
                </div>
            </div>
            <!-- slider end -->
            
            <!-- blog area start -->
            <div class="blog-area pb-70" style="margin-top:5%">
                <div class="container-fluid">
                    <div class="section-title text-center mb-50">
                        <h3>Available Jobs</h3>
                        <p>Select due to your speciality.</p>
                    </div>
					
			  

					<?php
					$sql = mysqli_query($conn,"SELECT * FROM applicant_job where status='Active' ORDER BY id ASC");
					
					if (mysqli_fetch_array($sql)>0) {
						$i=1;
						while ($row = mysqli_fetch_assoc($sql)) {
							if ($i++ % 4 == 0 || $i++ <2) echo "<div class='row'>";
					?>    

							<div class="col-md-3 col-sm-6">
								<div class="single-blog mb-30">
									<a href="apply.php">
										<img src="admin/<?php echo $row['img'] ?>" alt="">
									</a>
									<div class="blog-title">
										<h4><?php echo $row["requirement"]; ?></h4>
										<a href="apply.php" type="button" class="btn btn-primary"><font color="white">Apply</font></a>
									</div>
								</div>
								<h4 align="center" style="font-family:verdana"><?php echo $row["jobname"]; ?></h4>
							</div>
							
							
					<?php
							if ($i % 4 == 0 ) echo "</div>";
					?>
					<?php
						}
						if ($i % 4 != 0) echo "</div>";
					} else {
					
						echo "No Data Found";
					}
					?>



					
                </div>
            </div>
            <!-- blog area end -->
            
        </div>
        
        
        
        
        
        
        
        
        
        
        

		<!-- all js here -->
        <script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.meanmenu.js"></script>
        <script src="assets/js/isotope.pkgd.min.js"></script>
        <script src="assets/js/imagesloaded.pkgd.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/jquery.counterup.min.js"></script>
        <script src="assets/js/waypoints.min.js"></script>
        <script src="assets/js/ajax-mail.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>
    </body>
</html>
