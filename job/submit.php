<?php 
include 'dbconnect.php';
date_default_timezone_set("Asia/Bangkok");
$tglemail = date("D, d F Y");

use PHPMailer\PHPMailer\PHPMailer;  //gausah dirubah
		use PHPMailer\PHPMailer\Exception;  //gausah dirubah

		require 'phpmailer/src/Exception.php';	//arahkan ke folder phpmailer
		require 'phpmailer/src/PHPMailer.php';	//arahkan ke folder phpmailer
		require 'phpmailer/src/SMTP.php';	//arahkan ke folder phpmailer
		require 'phpmailer/class.phpmailer.php';	//arahkan ke folder phpmailer
		require 'phpmailer/PHPMailerAutoload.php';	//arahkan ke folder phpmailer



$pos=$_POST['position'];
$name1=$_POST['first_name'];
$name2=$_POST['last_name'];
$name = $name1 . ' ' . $name2;
$edu=$_POST['education'];
$spe=$_POST['speciality'];
$address=$_POST['street'];
$additional=$_POST['additional'];
$ph=$_POST['phone'];
$email=$_POST['your_email'];
$time = $_POST['time'];

$nama_file = $_FILES['file']['name'];
$ukuran_file = $_FILES['file']['size'];
$tipe_file = pathinfo($nama_file,PATHINFO_EXTENSION);
$random = md5(uniqid($nama_file, true) . time());
$tmp_file = $_FILES['file']['tmp_name'];
// $phot = "jpg/png/".$random.'.'.$tipe_file;
$path = "cv/".$random.'.'.$tipe_file;




if($tipe_file == 'pdf'){ 
  if($ukuran_file <= 5000000){ 
    if(move_uploaded_file($tmp_file, $path)){ 
	
      $query = "insert into applicant values('','$pos','$name','$edu','$spe','$path','$address','$additional','$ph','$email','$time','0')";
      $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
      
      if($sql){ 
	

				//Create a new PHPMailer instance
				$mail = new PHPMailer;
				$mail->isSMTP();
				$mail->SMTPDebug = SMTP::DEBUG_SERVER;
				$mail->Host = 'smtp.gmail.com';
				$mail->Port = 587;
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
				$mail->SMTPAuth = true;
				$mail->Username = 'nengmeymalutmaluku@gmail.com';						/////////////////////// ISI DENGAN ALAMAT GMAIL KALIAN
				$mail->Password = 'NMM16042013';						/////////////////////// ISI DENGAN PASSWORD GMAIL NYA
				
				//Recipients
				$mail->setFrom('noreply@richard.id', 'Job Application');
				$mail->addAddress($email, $name);     // Add a recipient

				$mail->Subject = 'Hi, ' . $name . '! Thank you for submitting the application';
				// Mengatur format email ke HTML
				$mail->isHTML(true);
				// Konten/isi email
				$mailContent = '<h1>We would like to appreciate your application submitted at ' . $tglemail . '.</h1>
					<h3>All next information including the interview will be informed later through email, Thank you very much.</h3>
					<br \>
					<p>This is an auto-generated email, please do not reply to this email.</p>
					';
				$mail->Body = $mailContent;
				// Kirim email
				if(!$mail->send()){
					echo "<br><meta http-equiv='refresh' content='5; URL=apply.php'> Pesan tidak dapat dikirim." . $mail->ErrorInfo ;
				}else{
					header("location: thanks.php");
				}
		
		
		
		
		
			// if($kirimemail){
        header("location: thanks.php"); // Redirectke halaman index.php
			// } else {
			// 	echo "<meta http-equiv='refresh' content='5; URL=apply.php'>Failed to execute. You will be redirected to the form in 5 seconds.";
			// }
			// }	
			
      }else{
        // Jika Gagal, Lakukan :
        echo "Sorry, there's a problem while submitting.";
        echo "<br><meta http-equiv='refresh' content='5; URL=apply.php'> You will be redirected to the form in 5 seconds";
      }
    }else{
      // Jika gambar gagal diupload, Lakukan :
      echo "Sorry, there's a problem while uploading the file.";
      echo "<br><meta http-equiv='refresh' content='5; URL=apply.php'> You will be redirected to the form in 5 seconds";
    }
  }else{
    // Jika ukuran file lebih dari 1MB, lakukan :
    echo "Sorry, the file size is not allowed to more than 5mb";
    echo "<br><meta http-equiv='refresh' content='5; URL=apply.php'> You will be redirected to the form in 5 seconds";
  }
}else{
  // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
  echo "Sorry, the CV format should be PDF.";
  echo "<br><meta http-equiv='refresh' content='5; URL=apply.php'> You will be redirected to the form in 5 seconds";
}



?>