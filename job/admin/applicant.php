<?php 
	session_start();
	include '../dbconnect.php';
	if($_SESSION['log']!="Logged"){
		// header("location:login.php");
	}
	
	date_default_timezone_set("Asia/Bangkok");

	use PHPMailer\PHPMailer\PHPMailer;  //gausah dirubah
		use PHPMailer\PHPMailer\Exception;  //gausah dirubah

		require '../phpmailer/src/Exception.php';	//arahkan ke folder phpmailer
		require '../phpmailer/src/PHPMailer.php';	//arahkan ke folder phpmailer
		require '../phpmailer/src/SMTP.php';	//arahkan ke folder phpmailer
		require '../phpmailer/class.phpmailer.php';	//arahkan ke folder phpmailer
		require '../phpmailer/PHPMailerAutoload.php';	//arahkan ke folder phpmailer
	
?>
	
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
	<link rel="icon" 
      type="image/png" 
      href="../favicon.png">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Application Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-144808195-1');
	</script>
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
	<!-- Start datatable css -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
	
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                    <!-- <a href="index.php"><img src="../logo.png" alt="logo" width="100%"></a> -->
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li>
                                <a href="index.php"><i class="ti-dashboard"></i><span>Manage Job</span></a>
                            </li>
							<li class="active">
                                <a href="applicant.php"><i class="ti-dashboard"></i><span>Manage Applicant</span></a>
                            </li>
							<li>
                                <a href="scheduling.php"><i class="ti-dashboard"></i><span>Scheduling</span></a>
                            </li>
                            <li>
                                <a href="logout.php"><span>Logout</span></a>
                                
                            </li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box pull-left">
                            <form action="#">
                                <h2>Hi Admin!</h2>
                            </form>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li><h3><div class="date">
								<script type='text/javascript'>
						<!--
						var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
						var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
						var date = new Date();
						var day = date.getDate();
						var month = date.getMonth();
						var thisDay = date.getDay(),
							thisDay = myDays[thisDay];
						var yy = date.getYear();
						var year = (yy < 1000) ? yy + 1900 : yy;
						document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);		
						//-->
						</script></b></div></h3>

						</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
			
			
 
            <!-- page title area end -->
            <div class="main-content-inner">
               
                <!-- market value area start -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>Manage Applicant (Belum Diproses)</h2>
									
                                </div>
                                    <div class="data-tables datatable-dark">
										 <table id="dataTable3" class="display" style="width:100%"><thead class="thead-dark">
											<tr>
												<th>No</th>
												<th>Name</th>
												<th>Position</th>
												<th>Education</th>
												<th>Address</th>
												<th>CV</th>
												<th>Action</th>
												
												<!--<th>Opsi</th>-->
											</tr></thead><tbody>
											<?php 
											$job1=mysqli_query($conn,"SELECT * from applicant where applicant_position!='title' and action='0' order by applicant_id ASC");
											$no=1;
											while($p=mysqli_fetch_array($job1)){
												$id = $p['applicant_id'];
												$nama = $p['applicant_name'];
												$posisi = $p['applicant_position'];
												$edu = $p['applicant_edu'];
												$spe = $p['applicant_speciality'];
												$adr = $p['applicant_address'];
												$info = $p['applicant_info'];
												$phone = $p['applicant_phone'];
												$email = $p['applicant_email'];
												$submit = $p['submit_date'];
												$cv = $p['applicant_cv'];
												?>
												
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $nama ?></td>
													<td><?php echo $posisi ?></td>
													<td><?php echo $edu ?></td>
													<td><?php echo $adr ?></td>
													<td><a href="../<?php echo $cv ?>">Download</a></td>
													<td>
													<form action="applicant.php" method="post" enctype="multipart/form-data">
													<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
													  Action
													</button>
													<div class="dropdown-menu">
													  <input type="button" class="dropdown-item" data-toggle="modal" data-target="#person<?php echo $id;?>" value="Detail" \>
													  <input type="submit" class="dropdown-item" name="hapus1" value="Delete" \>
													</div>
													</form>
													
													</td>
												</tr>

												<!-- modal input -->
														<div id="person<?php echo $id;?>" class="modal fade">
															<div class="modal-dialog modal-lg">
																<div class="modal-content">
																	<div class="modal-header">
																		<h4 class="modal-title"><?php echo $nama ?></h4>
																		<p><?php echo $id;?></p>
																	</div>
																	<div class="modal-body">
																			<div class="form-group">
																				<label>Nama Lengkap</label>
																				<input type="text" class="form-control" value="<?php echo $nama ?>" disabled>
																			</div>
																			<div class="form-group">
																				<label>Nama Posisi</label>
																				<input type="text" class="form-control" value="<?php echo $posisi ?>" disabled>
																			</div>
																			<div class="form-group">
																				<label>Pendidikan</label>
																				<input type="text" class="form-control" value="<?php echo $edu ?>" disabled>
																			</div>
																			<div class="form-group">
																				<label>Kemampuan</label>
																				<input type="text" class="form-control" value="<?php echo $spe ?>" disabled>
																			</div>
																			<div class="form-group">
																				<label>Info Tambahan</label>
																				<input type="text" class="form-control" value="<?php echo $info ?>" disabled>
																			</div>
																			<div class="form-group">
																				<label>Alamat</label>
																				<input type="text" class="form-control" value="<?php echo $adr ?>" disabled>
																			</div>
																			<div class="form-group">
																				<label>No.Telepon</label>
																				<input type="text" class="form-control" value="<?php echo $phone ?>" disabled>
																			</div>
																			<div class="form-group">
																				<label>Email</label>
																				<input type="text" class="form-control" value="<?php echo $email ?>" disabled>
																			</div>
																			<div class="form-group">
																				<label>Tanggal submit</label>
																				<input type="datetime" class="form-control" value="<?php echo $submit ?>" disabled>
																			</div>
																		</div>
																		<div class="modal-footer">
																			<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
																			<input type="submit" data-toggle="modal" data-target="#interview<?php echo $id;?>" class="btn btn-primary" value="Jadwalkan Interview">
																		</div>
																</div>
															</div>
														</div>
														
														<!-- modal input -->
														<div id="interview<?php echo $id;?>" class="modal fade">
															<div class="modal-dialog">
																<div class="modal-content">
																	<div class="modal-header">
																		<h4 class="modal-title">Jadwalkan interview</h4>
																	</div>
																	<div class="modal-body">
																	<form action="applicant.php" method="post" enctype="multipart/form-data" >
																			<div class="form-group">
																				<label>Nama Lengkap</label>
																				<input type="text" class="form-control" name="namas" value="<?php echo $nama ?>" disabled>
																			</div>
																			<div class="form-group">
																				<label>Nama Posisi</label>
																				<input type="text" class="form-control" name="posisi1" value="<?php echo $posisi ?>" disabled>
																			</div>
																			<div class="form-group">
																				<label>Tempat (alamat lengkap tempat bertemu)</label>
																				<input type="text" class="form-control" name="alamat" required>
																			</div>
																			<div class="form-group">
																				<label>Tanggal dan waktu</label>
																				<input type="datetime-local" class="form-control" name="tanggal" required>
																			</div>
																			<div class="form-group">
																				<label>Bertemu dengan (PIC)</label>
																				<input type="text" class="form-control" name="pic" required>
																			</div>
																			<div class="form-group">
																				<label>No Telp PIC</label>
																				<input type="text" class="form-control" name="telp" required>
																			</div>
																			<input type="hidden" name="ids" value="<?php echo $id ?>" \>
																			<input type="hidden" name="nama" value="<?php echo $nama ?>" \>
																			<input type="hidden" name="posisi" value="<?php echo $posisi ?>" \>
																			<input type="hidden" name="email" value="<?php echo $email ?>" \>
																		</div>
																		<div class="modal-footer">
																			<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
																			<input type="submit" name="schedule" class="btn btn-primary" value="Jadwalkan">
																		</div>
																		</form>
																</div>
															</div>
														</div>
												<?php 
											}

											
											if(isset($_POST["hapus1"])){
													$hapusin = mysqli_query($conn,"delete from applicant where applicant_id='$id'");
													if($hapusin){
														unlink($cv);
														echo "<meta http-equiv='refresh' content='1; URL=applicant.php'> Deleting";
													} else {
														echo "<meta http-equiv='refresh' content='1; URL=applicant.php'> Failed";	
													}
												};
												
											if(isset($_POST["schedule"])){
													$ids = $_POST['ids'];
													$nama1 = $_POST['nama'];
													$email = $_POST['email'];
													$posisi1 = $_POST['posisi'];
													$alamat = $_POST['alamat'];
													$tanggal = $_POST['tanggal'];
													
													$formatdate=strtotime($tanggal);
													
													$tgl = date("D, d F Y",$formatdate);
													$waktu = date("H:i",$formatdate);
													$pic = $_POST['pic'];
													$telp = $_POST['telp'];
													$intview = mysqli_query($conn,"insert into applicant_scheduling values('','$ids','$alamat','$tanggal','$pic','$telp');");
														if($intview){
																mysqli_query($conn,"update applicant set action='1' where applicant_id='$ids'");
														
																//Create a new PHPMailer instance
																$mail = new PHPMailer;
																$mail->isSMTP();
																$mail->SMTPDebug = SMTP::DEBUG_SERVER;
																$mail->Host = 'smtp.gmail.com';
																$mail->Port = 587;
																$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
																$mail->SMTPAuth = true;
																$mail->Username = 'alamat gmail';						/////////////////////// ISI DENGAN ALAMAT GMAIL KALIAN
																$mail->Password = 'password nya';						/////////////////////// ISI DENGAN PASSWORD GMAIL NYA
																
																//Recipients
																$mail->setFrom('noreply@richard.id', 'Job Application');
																$mail->addAddress($email, $name);     // Add a recipient

																$mail->Subject = 'Hi, ' . $nama1 . '! Interview invitation for '.$posisi1.' in our company';
																// Mengatur format email ke HTML
																$mail->isHTML(true);
																// Konten/isi email
																$mailContent = '
																	
																	<h2>We would like to let you know that your application has been considered.</h2>
																	<h4>We would like to invite you to do an interview at :</h4>
																	<br 
																	<table><strong>
																	<tr>
																		<td>Tanggal</td>
																		<td>:      '.$tgl.'</td>
																	</tr>
																	<tr>
																		<td>Tempat</td>
																		<td>:      '.$alamat.'</td>
																	</tr>
																	<tr>
																		<td>Waktu</td>
																		<td>:      '.$waktu.'</td>
																	</tr>
																	<tr>
																		<td>Interviewer</td>
																		<td>:      '.$pic.'</td>
																	</tr>
																	<tr>
																		<td>PIC Phone</td>
																		<td>:      '.$telp.'</td>
																	</tr>
																	</strong>
																	</table>
																	
																	<br \><br \>
																	<br \>We are looking forward to get in touch with you.
																	<br \>If you need further information, please call the PIC.
																
																	<p>This is an auto-generated email, please do not reply to this email.</p>
																	';
																$mail->Body = $mailContent;
																// Kirim email
																if(!$mail->send()){
																	echo "<br><meta http-equiv='refresh' content='5; URL=applicant.php'> Pesan tidak dapat dikirim." . $mail->ErrorInfo ;
																}else{
																	header("location: thanks.php");
																}
															
																echo "<meta http-equiv='refresh' content='1; URL=scheduling.php'> Berhasil dijadwalkan";
															
														} else {
															echo "Eksekusi Query gagal";
														}
												};
											?>
										</tbody>
										</table>
                                    </div>
									<!--
									<a href="exportstkbhn.php" target="_blank" class="btn btn-info">Export Data</a>
									-->
                                </div>
                            </div>
                        </div>
                    </div>
					
					
<!-- market value area start -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>Manage Applicant (Sudah Diproses)</h2>
									
                                </div>
                                    <div class="data-tables datatable-dark">
										 <table id="dataTable2" class="display" style="width:100%"><thead class="thead-dark">
											<tr>
												<th>No</th>
												<th>Name</th>
												<th>Position</th>
												<th>Education</th>
												<th>Address</th>
												<th>CV</th>
												<th>Action</th>
												
												<!--<th>Opsi</th>-->
											</tr></thead><tbody>
											<?php 
											$job=mysqli_query($conn,"SELECT * from applicant where applicant_position!='title' and action='1' order by applicant_id ASC");
											$no=1;
											while($p=mysqli_fetch_array($job)){
												$id = $p['applicant_id'];
												$nama = $p['applicant_name'];
												$posisi = $p['applicant_position'];
												$edu = $p['applicant_edu'];
												$spe = $p['applicant_speciality'];
												$adr = $p['applicant_address'];
												$info = $p['applicant_info'];
												$phone = $p['applicant_phone'];
												$email = $p['applicant_email'];
												$submit = $p['submit_date'];
												$cv = $p['applicant_cv'];
												?>
												
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $nama ?></td>
													<td><?php echo $posisi ?></td>
													<td><?php echo $edu ?></td>
													<td><?php echo $adr ?></td>
													<td><a href="../<?php echo $cv ?>">Download</a></td>
													<td><form action="applicant.php" method="post" enctype="multipart/form-data" >
													<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
													  Action
													</button>
													<div class="dropdown-menu">
													  <input type="button" class="dropdown-item" data-toggle="modal" data-target="#person1<?php echo $id;?>" value="Detail" \>
													  <input type="submit" class="dropdown-item" name="hapus2" value="Delete" \>
													</div>
													</form>
													</td>
												</tr>
												

												<!-- modal input -->
														<div id="person1<?php echo $id;?>" class="modal fade">
															<div class="modal-dialog modal-lg">
																<div class="modal-content">
																	<div class="modal-header">
																		<h4 class="modal-title"><?php echo $nama ?></h4>
																	</div>
																	<div class="modal-body">
																			<div class="form-group">
																				<label>Nama Lengkap</label>
																				<input type="text" class="form-control" value="<?php echo $nama ?>" disabled>
																			</div>
																			<div class="form-group">
																				<label>Nama Posisi</label>
																				<input type="text" class="form-control" value="<?php echo $posisi ?>" disabled>
																			</div>
																			<div class="form-group">
																				<label>Pendidikan</label>
																				<input type="text" class="form-control" value="<?php echo $edu ?>" disabled>
																			</div>
																			<div class="form-group">
																				<label>Kemampuan</label>
																				<input type="text" class="form-control" value="<?php echo $spe ?>" disabled>
																			</div>
																			<div class="form-group">
																				<label>Info Tambahan</label>
																				<input type="text" class="form-control" value="<?php echo $info ?>" disabled>
																			</div>
																			<div class="form-group">
																				<label>Alamat</label>
																				<input type="text" class="form-control" value="<?php echo $adr ?>" disabled>
																			</div>
																			<div class="form-group">
																				<label>No.Telepon</label>
																				<input type="text" class="form-control" value="<?php echo $phone ?>" disabled>
																			</div>
																			<div class="form-group">
																				<label>Email</label>
																				<input type="text" class="form-control" value="<?php echo $email ?>" disabled>
																			</div>
																			<div class="form-group">
																				<label>Tanggal submit</label>
																				<input type="datetime" class="form-control" value="<?php echo $submit ?>" disabled>
																			</div>

																		</div>
																		<div class="modal-footer">
																			<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
																		</div>
																</div>
															</div>
														</div>
												<?php 
											}
											
											if(isset($_POST["hapus2"])){
													$hapusin = mysqli_query($conn,"delete from applicant where applicant_id='$id'");
													if($hapusin){
														unlink($cv);
														echo "<meta http-equiv='refresh' content='1; URL=applicant.php'> Deleting";
													} else {
														echo "<meta http-equiv='refresh' content='1; URL=applicant.php'> Failed";	
													}
												};
											?>
										</tbody>
										</table>
                                    </div>
									<!--
									<a href="exportstkbhn.php" target="_blank" class="btn btn-info">Export Data</a>
									-->
                                </div>
                            </div>
                        </div>
                    </div>
					
					
					
                </div>
              
                
                <!-- row area start-->
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>PT.Nengmeypratama Malut Maluku</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
	
	
	
	<script>
		$(document).ready(function() {
		$('input').on('keydown', function(event) {
			if (this.selectionStart == 0 && event.keyCode >= 65 && event.keyCode <= 90 && !(event.shiftKey) && !(event.ctrlKey) && !(event.metaKey) && !(event.altKey)) {
			   var $t = $(this);
			   event.preventDefault();
			   var char = String.fromCharCode(event.keyCode);
			   $t.val(char + $t.val().slice(this.selectionEnd));
			   this.setSelectionRange(1,1);
			}
		});
	});
	
	$(document).ready(function() {
    $('#dataTable3').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
	
	$('#dataTable2').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
	
	} );
	</script>
	
	<!-- jquery latest version -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
		<!-- Start datatable js -->
	 <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
	
	
</body>

</html>
