<!DOCTYPE HTML>
<!--
	Aesthetic by gettemplates.co
	Twitter: http://twitter.com/gettemplateco
	URL: http://gettemplates.co
-->
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cube &mdash; Free Website Template, Free HTML5 Template by gettemplates.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="gettemplates.co" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="gtco-loader"></div>
	
	<div id="page">

		<nav class="gtco-nav" role="navigation">
			<div class="gtco-container">
				
				<div class="row">
					<div class="col-sm-2 col-xs-12">
						<div id="gtco-logo"><a href="index.html"><img src="images/logo.png" alt="Free HTML5 Website Template by GetTemplates.co"></a></div>
					</div>
					<div class="col-xs-10 text-right menu-1">
						<ul>
							<li class="active"><a href="halo.html">Home</a></li>
							<li><a href="about_login.html">Informasi</a></li>
							<li class="has-dropdown">
								<a href="services.html">Kegiatan</a>
								<ul class="dropdown">
									<li><a href="pengmas_login.html">Pengabdian Masyarakat</a></li>
									<li><a href="donasi_login.html">Donasi</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
				
			</div>
		</nav>

		
		<!-- END #gtco-header -->

		<br>
		<br>
		<br>
		<br>
		<br>
		<br>

<div id="colorlib-contact">
		<div class="container">
			<div class="row">
				
				<div class="col-md-10 col-md-offset-1 animate-box">
					<?php
						include('connect.php');
						if (isset($_POST['upload'])){
							$allowed_ext	= array('jpg', 'jpeg', 'png', 'bmp', 'gif', 'tiff');

							$file_name		= $_FILES['file']['name'];
							$file_ext		= pathinfo ($file_name, PATHINFO_EXTENSION);
							$file_size		= $_FILES['file']['size'];
							$file_tmp		= $_FILES['file']['tmp_name'];
							$nama_donasi		= $_POST['nama_donasi'];
							$metode_donasi		= $_POST['metode_donasi'];
							$nominal_donasi		= $_POST['nominal_donasi'];
							$tanggal_donasi			= date("Y-m-d");
							if(in_array($file_ext, $allowed_ext) === true){
								if($file_size < 2044070){
									$open = fopen ($_FILES['file']['tmp_name'], 'r');
			                        $read = fread ($open, $_FILES['file']['size']);
			                        $data = addslashes ($read);
			                        $location ='/admin/files/'.$file_name.'.'.$file_ext;
			                        move_uploaded_file($file_tmp, $location);
			                        $in = mysqli_query($con, "INSERT INTO donasi VALUES(NULL, '$nama_donasi','$metode_donasi','$nominal_donasi','$tanggal_donasi','$file_ext', '$file_size', '$location')");
									if($in){
										echo '<div class="ok" style=" text-align: center; color: green;">SUCCESS: File berhasil di Upload!</div>';
									}else{
										echo '<div class="ok" style=" text-align: center; color: red;">ERROR: Gagal upload file!</div>';
									}
								}else{
									echo '<div class="ok" style=" text-align: center; color: red;">ERROR: Besar ukuran file (file size) maksimal 1 Mb!</div>';
								}
							}else{
								echo '<div class="ok" style=" text-align: center; color: red;">ERROR: Ekstensi file tidak di izinkan!</div>';
							}
						}
						?>

						<h1 style="text-align: center;">Upload Bukti Pembayaran</h1>

					<form action="" method="post" enctype="multipart/form-data">

						
							<div class="row form-group">
								<label for="Nama">Nama</label>
								<input type="text" id="Nama" class="form-control mb" placeholder="Nama" name="nama_donasi" required/>
							</div>
							<div class="row-group row">
                                            <label for="Pembayaran">Metode Pembayaran</label>
                                                <select class="form-control" id="val-skill" name="metode_donasi" required/>
                                                    <option value="">Mohon Pilih</option>
                                                    <option value="Transfer">Transfer</option>
                                                    <option value="Langsung">Bayar Langsung</option>

                                                </select>
                           </div>

							<div class="row form-group">
								<label for="kelamin">Nominal</label>
								<input type="number" id="kelamin" class="form-control" placeholder="Nominal" name="nominal_donasi" required/>
							</div>
							<div class="row form-group">

									<label for="Alamat">Upload</label>
									<input type="file" id="Angkatan" class="form-control" placeholder="" name="file" required/>
							</div>

						<div class="form-group text-center">
							<input type="submit" value="Submit" class="btn btn-primary" name="upload">
						</div>

					</form>		
				</div>
			</div>
		</div>
	</div>		
		<!-- END .gtco-client -->

		<footer id="gtco-footer" class="gtco-section" role="contentinfo">
			<div class="gtco-container">
				<div class="row row-pb-md">
					<div class="col-md-8 col-md-offset-2 gtco-cta text-center">
						<h3>Himpunan Mahasiswa Teknik Computer-Informatika (HMTC)</h3>
						<p><a href="#" class="btn btn-white btn-outline">Contact Us</a></p>
					</div>
				</div>
				<div class="row row-pb-md">
					<div class="col-md-4 gtco-widget gtco-footer-paragraph">
						<h3>Cube</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus placerat enim et urna sagittis, rhoncus euismod.</p>
					</div>
					<div class="col-md-4 gtco-footer-link">
						<div class="row">
							<div class="col-md-6">
								<ul class="gtco-list-link">
									<li><a href="#">Home</a></li>
									<li><a href="#">Features</a></li>
									<li><a href="#">Products</a></li>
									<li><a href="#">Testimonial</a></li>
									<li><a href="#">Contact</a></li>
								</ul>
							</div>
							<div class="col-md-6">
								<p>
									<a href="tel://1234567890">+1 234 4565 2342</a> <br>
									<a href="#">info@domain.com</a>
								</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 gtco-footer-subscribe">
						<form class="form-inline">
						  <div class="form-group">
						    <label class="sr-only" for="exampleInputEmail3">Email address</label>
						    <input type="email" class="form-control" id="" placeholder="Email">
						  </div>
						  <button type="submit" class="btn btn-primary">Send</button>
						</form>
					</div>
				</div>
			</div>
			
		</footer>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

