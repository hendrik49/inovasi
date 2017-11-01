<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Radio Sipatahunan Bogor</title>
		<link href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    	<!-- Font Awesome Icons -->
    	<link href="<?php echo base_url()?>assets/bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    	<link href="<?php echo base_url()?>assets/bootstrap/css/style.css" rel="stylesheet" type="text/css" />
    	<link href="<?php echo base_url('assets/bootstrap/css/nivo-slider.css')?>" rel="stylesheet">
    	<link href="<?php echo base_url()?>assets/bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    	<link href="<?php echo base_url()?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    	<link href="<?php echo base_url()?>assets/dist/css/skins/_all-skins.css" rel="stylesheet" type="text/css" />
    	<link href="<?php echo base_url()?>assets/plugins/lavazi/lavazi-style.css" rel="stylesheet" />
		<link href="<?php echo base_url()?>assets/plugins/lavazi/lavazi.css" rel="stylesheet" type="text/css"/>
		<link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'/>
		<link rel="shortcut icon" href="<?php echo base_url()?>/uploads/logo-bogor.png" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	</head>	
	<body>

		<!--Begin Header-->
<div class="section top test" style="padding-left:10px;">
			<div class="row">
				<div class="col-md-6">
					<div class="logo clearfix">
						<img src="<?php echo base_url('uploads/unnamed2.png')?>" style="padding-left: 20px;" class="img-responsive pull-left hidden-xs">
					</div>
				</div>
				<div class="container">	
				<img src="<?php echo base_url('uploads/unnamed1.png')?>" class="img-responsive pull-right hidden-xs" >
			</div>
<!--
		<div class="section top test" style="padding-left:10px;">
			<div class="row">
				<div class="col-md-6">
					<div class="logo clearfix">
						<img src="<?php echo base_url('uploads/radio_sipatahunan.png')?>" style="padding-left: 20px;" class="img-responsive pull-left hidden-xs">
					</div>
				</div>
				<div class="col-md-6">
					<div class="text-right" style="padding-right:20px;">
						<a href="<?php echo $fb_site ?>" target="_blank" class="btn btn-social-icon btn-facebook" style="borer-radius:40%;">
							<i class="fa fa-facebook"></i>
						</a>
						<a href="<?php echo $twitter_site ?>" target="_blank" class="btn btn-social-icon btn-twitter">
							<i class="fa fa-twitter"></i>
						</a>
						<a class="btn btn-social-icon btn-instagram">
							<i class="fa fa-instagram"></i>
						</a>
						<a class="btn btn-social-icon btn-instagram">
							<i class="fa fa-youtube"></i>
						</a>
					</div>
				</div>
			</div>			
    	</div>-->
    	<!--End Header-->

		<!--Begin Navigation-Bar-->
    	<nav>
		  <ul>
		    <?php echo menus2() ?>
		    <div style='clear:both'></div>
		  </ul>
		</nav>
		<!--End Navigation-Bar-->
		
    	<div class="section gradient-blue2" style="padding: 15px 0 0 0;">
			<div class="container">
				<ol class="breadcrumb bc" style="background-color:transparent">
					<li class="home"><a href="<?php echo site_url() ?>">Beranda</a></li>
					<?php 
					if ($category['category_id']!='') {
						echo navigate($category['category_id']);
					} else {
						echo "<li>".$breadcrumb."</li>";
					}
					
					?>
				</ol>
			</div>
		</div>

    	<div class="section" style="padding:0;">
			<div class="container padding-y-10">
				<?php $this->load->view($konten) ?>
			</div>
		</div>
		

    	<!--Begin Footer-->
    	<div class="section gradient-blue2" style="padding:0px;">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-12">
						<h3 style="color: #ffbf00;"><i class="fa fa-bar-chart"></i> Statistik Pengunjung</h3>
						<div class="putih">
						<?php
							$ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
							$tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
							$waktu   = time(); //

							// Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
							$s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");

							// Kalau belum ada, simpan data user tersebut ke database
							if(mysql_num_rows($s) == 0){
							    mysql_query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
							}
							// Jika sudah ada, update
							else{
							    mysql_query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
							}
						?> 
							Hari ini : <?php echo $pengunjung; ?> Pengunjung</br>
							Total : <?php echo $totalpengunjung; ?> Kunjungan</br>
							Pengunjung Online : <?php echo $pengunjungonline; ?> Pengunjung
						</div>
					</div>

					<div class="col-md-4 col-sm-4 col-xs-6">
						<h3 style="color: #ffbf00;"><i class="fa fa-picture-o"></i> Galeri</h3>
						<div class="clearfix">
						<?php
						if ($galeri->num_rows()>0) {
							foreach ($galeri->result() as $g) {
						?>
							<div class="galeri-wrap"><img src="<?php echo base_url('uploads/galeri/thumb/'.$g->image)?>"></div>
						<?php
							}
						}
						?>
						</div>
						<div class="text-right">
							<a href="<?php echo base_url('galeri')?>" style="text-transform:uppercase; margin-right:10px;">Selengkapnya</a>
						</div>
					</div>

					<div class="col-md-4 col-sm-4 col-xs-6">
						<h3 style="color: #ffbf00;"><i class="fa fa-phone-square"></i> Kontak Kami</h3>
							<div class="putih">
								<p>
									Alamat : <?php echo $alamat ?><br/>
									Telp. <?php echo $no_telp ?><br/>
									Email : <?php echo $mail_site ?><br/>
									Facebook : Radio Sipatahunan Bogor 89,4 FM <br/>
									Twitter : @spfm_radiobogor
								</p>
							</div>
					</div>
				</div>
			</div>
		</div>

		<div class="section" style="padding:0; background-color:#000;">
			<div class="container">
				<h5 style="color:#fff; text-align:center;">&copy Copyright Radio Sipatahunan 2016, Kota Bogor</h5>
			</div>
		</div>
		<!--End Footer-->

    	 <script src="<?php echo base_url()?>assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
	    <!-- Bootstrap 3.3.2 JS -->
	    <script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	    <!-- DATA TABES SCRIPT -->
	    <script src="<?php echo base_url()?>assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
	    <script src="<?php echo base_url()?>assets/dist/js/app.min.js" type="text/javascript"></script>
	    <!-- Lavazi Navbar Plugins -->
		<script src="<?php echo base_url()?>assets/plugins/lavazi/lavazi.jquery.js" type='text/javascript'></script>
	    <script>
			$(document).ready(function () {
		    $("#my-calendar").zabuto_calendar({
		      cell_border: true,
		      today: true,
		      show_days: true,
		      weekstartson: 0,
		      nav_icon: {
		        prev: '<i class="fa fa-chevron-circle-left"></i>',
		        next: '<i class="fa fa-chevron-circle-right"></i>'
		      }
		    });
		  });
		</script>
	    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</body>
</html>