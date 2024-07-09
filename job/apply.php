<?php
date_default_timezone_set("Asia/Bangkok");

$session_start;
include 'dbconnect.php';
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<style>body{overflow-x:hidden}</style>
	<title>Apply a Job</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/montserrat-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css"/>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-144808195-1');
	</script>

	
	<script type="text/javascript">
	  function capitalize(textboxid, str) {
		  // string with alteast one character
		  if (str && str.length >= 1)
		  {       
			  var firstChar = str.charAt(0);
			  var remainingStr = str.slice(1);
			  str = firstChar.toUpperCase() + remainingStr;
		  }
		  document.getElementById(textboxid).value = str;
	  }
    </script>
</head>
<body class="form-v10">
	<div class="page-content">
		<div class="form-v10-content">
			<form class="form-detail" action="submit.php" enctype="multipart/form-data" method="post" id="myform">
				<div class="form-left">
					<h2>General Infomation</h2>
					<div class="form-row">
						<select name="position" required>
							<option class="option" value="title">Position</option>
							<?php
							$jobname = mysqli_query($conn,"select * from applicant_job where id > 1 and status='Active'");
							$no=1;
							while($p=mysqli_fetch_array($jobname)){
								
								$namajob = $p['jobname'];
						    echo "<option class='option' value='".$namajob."'>".$namajob."</option>";
							
							}
							?>
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="first_name" id="first_name" class="input-text" placeholder="First Name" style="text-transform: capitalize;" onkeyup="javascript:capitalize(this.id, this.value);" required>
						</div>
						<div class="form-row form-row-2">
							<input type="text" name="last_name" id="last_name" class="input-text" placeholder="Last Name" style="text-transform: capitalize;" onkeyup="javascript:capitalize(this.id, this.value);" required>
						</div>
					</div>
					<div class="form-row">
						<select name="education">
						    <option>Education</option>
						    <option value="SMA">Senior High School</option>
						    <option value="S1">Bachelor / S1</option>
						    <option value="S2">Master / S2</option>
							<option value="S3">Doctor / S3</option>
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div>
					<div class="form-row">
						<input type="text" name="speciality" class="company" id="company" placeholder="My Speciality" style="text-transform: capitalize;" onkeyup="javascript:capitalize(this.id, this.value);" minlength="10" required>
					</div>
					<div class="form-row">
						<div class="custom-file">
						<label>Upload CV & Foto (PDF & Foto Only max 25mb)</label>
						<input type="file" name="file" class="form-control-file border"  accept="application/pdf" required>
						</div>
					</div>
				</div>
				<div class="form-right">
					<h2>Contact Details</h2>
					<div class="form-row">
						<input type="text" name="street" class="street" id="street" placeholder="Full Address" minlength="15" onkeyup="javascript:capitalize(this.id, this.value);" required>
					</div>
					<div class="form-row">
						<input type="text" name="additional" class="additional" id="additional" placeholder="About yourself" onkeyup="javascript:capitalize(this.id, this.value);" minlength="20" required>
					</div>
					
					<div class="form-row">
						<input type="text" name="phone" class="phone" id="phone" placeholder="Phone Number" maxlength="13" minlength="10" required>
					</div>
					
					<div class="form-row">
						<input type="text" name="your_email" id="your_email" class="input-text" minlength="10" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Your Email">
					</div>
					<input type="hidden" name="time" value="<?php echo date("Y-m-d H:i:s") ?>">
					<!--
					<div class="form-checkbox">
						<label class="container"><p>I do accept the <a href="#" class="text">Terms and Conditions</a> of your site.</p>
						  	<input type="checkbox" name="checkbox">
						  	<span class="checkmark"></span>
						</label>
					</div>
					-->
					<div class="form-row-last">
						<input type="submit" name="submit" class="register" value="Submit">
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>