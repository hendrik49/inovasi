<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Radio Sipatahunan Kota Bogor</title>
		<link href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    	<!-- Font Awesome Icons -->
    	<link href="<?php echo base_url()?>assets/bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    	<link href="<?php echo base_url()?>assets/bootstrap/css/style.css" rel="stylesheet" type="text/css" />
    	<link href="<?php echo base_url()?>assets/bootstrap/css/nivo-slider.css" rel="stylesheet" />
    	<link href="<?php echo base_url()?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    	<link href="<?php echo base_url()?>assets/dist/css/skins/_all-skins.css" rel="stylesheet" type="text/css" />
    	<link href="<?php echo base_url()?>assets/plugins/zabuto_calendar.min.css" rel="stylesheet" type="text/css" />
    	<link href="<?php echo base_url()?>assets/plugins/lavazi/lavazi-style.css" rel="stylesheet" />
		<link href="<?php echo base_url()?>assets/plugins/lavazi/lavazi.css" rel="stylesheet" type="text/css"/>
		<link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'/>
    	<link href="<?php echo base_url()?>assets/plugins/carousel-slider/css/style.css" rel="stylesheet" type="text/css" />
    	<link rel="shortcut icon" href="<?php echo base_url()?>/uploads/logo-bogor.png" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	</head>	
	<body>
		<!--Begin Header
		<div class="section" style="background-color: #34495e; color:#fff; font-size: 17px; padding: 10px 0 10px 0; margin-bottom: 10px;">
    		<div class="container">	
				<img src="<?php echo base_url('uploads/call.png')?>" class="img-responsive pull-right hidden-xs" >
			</div>
		</div>-->
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
				<!--<div class="col-md-6">
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
					</div>-->
				</div>
			</div>			
    	</div>
    	<!--End Header-->

    	<!--Begin Navigation-Bar-->
    	<nav>
		  <ul>
		    <?php echo menus2() ?>
		    <div style='clear:both'></div>
		  </ul>
		</nav>
		<!--End Navigation-Bar-->

    	<!--Begin Banner-->
    	<!--<div class="section" style="background:#fff; padding:8px;">
			<div class="container hidden-xs">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">   
				    <div class="carousel-inner">
				        <?php
				        if($slide->num_rows()>0) {
				        	$no = 1;
				        	foreach ($slide->result() as $rows) {
				        	$cls = "";
				        	if($no==1) {
				        		$cls = "active";
				        	}
				        ?>
				        <div class="item <?php echo $cls ?>">
				            <img src="<?php echo base_url('uploads/slide/'.$rows->slide_file)?>" class="img-slide">
				         </div>
				        <?php
				        	$no++;
				        	}
				        } else {
				        ?>
				        	<div class="item active">
				            <img src="<?php echo base_url('uploads/slide/slide.jpg')?>" class="img-slide">
				          </div>
				        <?php
				        }
				        ?> 
			        </div>
			        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
			          <span class="fa fa-angle-left"></span>
			        </a>
			        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
			          <span class="fa fa-angle-right"></span>
			        </a>
				</div>
			</div>
		</div>-->
    	<!--End Banner-->

    	<br>

    	<!--begin konten1-->
    	<div class="container">
			<div class="row" style="background-color:#fff;">
				<!--Begin Prakiraan Cuaca-->
				<div class="col-md-8 col-sm-8">	
					<div class="panel-widget">
						<div class="panel-heading head" style="background-color:#3b5998;">
							<strong class="panel-tittle putih">Reportase Sipatahunan</strong>
							<div class="icon-right">
								<i class="fa fa-newspaper-o"></i>
							</div>
						</div>
						<?php
						if ($terbaru) {
							foreach ($terbaru->result() as $row) {
						?>
						<div class="panel-body">
							<div class="list-content clearfix">
								<div class="col-md-4 no-left-padding">
									<div class="image-container">
										<a href="<?php echo linked($row->post_id, $row->title) ?>">
										<img src="<?php echo get_image($row->body, $row->image) ?>" alt="<?php echo $row->title ?>">
										</a>
									</div>
								</div>
								<div class="col-md-8 no-left-padding">
									<h4 class="no-margin"><a href="<?php echo linked($row->post_id, $row->title) ?>"><?php echo $row->title ?></a></h4>
									<div class="content-meta margin-y-5">
										<small><i class="fa fa-calendar"></i> <?php echo convert_tanggal($row->date_publish) ?> </small>
										<small class="margin-x-10"><i class="fa fa-eye"></i> Views : <?php echo $row->view ?></small>
										<small><i class="fa fa-user"></i> By <a><?php echo $row->user_name ?></a></small>
									</div>
									<div align="justify">
										<?php echo strip_tags(substr($row->body, 0,350))?>..
									</div>
								</div>
							</div>
						</div>
					<?php
						}
					}
					?>
						<div class="clearfix padding-y-10">
							<div class="pull-right"><h4><a href="<?php echo site_url('kategori/kode/'.$row->category_id) ?>" class="more">Berita sebelumnya <i class="fa fa-angle-right"></i></a></h4></div>
						</div>
					</div>
				</div>
				<!--End Prakiraan Cuaca-->
				<!--Begin Panel Kanan-->
				<div class="col md-4 col-sm-4">
					<!--Begin Streaming-->
					<div class="panel widget">
						<div class="panel-heading head" style="background-color:#3b5998;">
							<strong class="panel-tittle putih">Live Streaming</strong>
							<div class="icon-right">
								<i class="fa fa-play"></i>
							</div>
						</div>
						<div class="panel-body">
							<img src="<?php echo base_url('assets/dist/img/radio.gif')?>" width="100%">
							<audio controls autoplay style="width:100%">
								
								<source src="http://103.14.229.16:8000/radio" type="audio/mpeg">
							</audio>
<a href="<?php echo base_url() ?>download/StreamingSP-090116.apk" class="btn btn-info btn-block"><i class="fa fa-android"></i> Download APK Sipatahunan Streaming</a>
						</div>
					</div>
					<!--End Streaming-->
					<!--Begin connects-->
					<div class="panel widget">
						<div class="panel-heading head" style="background-color:#3b5998;">
							<strong class="panel-tittle putih">Connects</strong>
							<div class="icon-right">
								<i class="fa fa-twitter"></i>
							</div>
						</div>
						<div class="panel-body" style="padding:0;max-height: 500px;
    overflow-y: scroll;">
							
							
							<a class="twitter-timeline" href="https://twitter.com/sipatahunan_bgr">Tweets by sipatahunan_bgr</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
						</div>
					</div>
					<!--End Connects-->
				</div>
				<!--End Panel Kanan-->
			</div>
		</div>
		<!--End Konten1-->

		<!--Begin Konten2-->
		<div class="container">
			<div class="row" style="background-color:#fff;">
				<div class="col-md-8 col-sm-8">
					<div class="box-header bg-green-gradient">
		                  <i class="fa fa-cloud"></i>
		                  <h3 class="box-title">Prakiraan Cuaca</h3>
		            </div>
					<div class="clearfix">
						<div class="judul" style="background-color: transparent; border:0; text-align: center;">
							<?php

								$url = "http://data.bmkg.go.id/cuaca_jabodetabek_1.xml";
								$sUrl = file_get_contents($url);
								$xml = simplexml_load_string($sUrl);

								for ($i=0; $i<sizeof($xml->Isi->Row); $i++) {
								$row = $xml->Isi->Row[$i];
								if(strtolower($row->Daerah) == "bogor") {
									echo "<b>" . strtoupper($row->Daerah) . "</b>"."<br/>"; 
									echo " Tanggal:" . $xml->Tanggal . "<br/>";
									echo "<div class='col-md-4' style='background-color:transparent;'>";
										echo "Pagi Hari:" . $row->Pagi . "<br/>" ;
										echo "<img src='http://www.bmkg.go.id/asset/img/weather_icon/ID/" . $row->Pagi . "-pm.png' alt='" . $row->Pagi . "'>";
									echo "</div>";
									echo "<div class='col-md-4' style='background-color:transparent;'>";
										echo "Siang Hari:" . $row->Siang . "<br/>" ;
										echo "<img src='http://www.bmkg.go.id/asset/img/weather_icon/ID/" . $row->Siang . "-pm.png' alt='" . $row->Siang . "'>";
									echo "</div>";
									echo "<div class='col-md-4' style='background-color:transparent;'>";
										echo "Sore Hari:" . $row->Malam . "<br/>" ;
										echo "<img src='http://www.bmkg.go.id/asset/img/weather_icon/ID/" . $row->Malam . "-pm.png' alt='" . $row->Malam . "'>";
									echo "<br/>"."</div>";
								break;
								}}
							?>

							<?php
								$url = "http://data.bmkg.go.id/cuaca_jabodetabek_2.xml";
								$sUrl = file_get_contents($url);
								$xml = simplexml_load_string($sUrl);

								for ($i=0; $i<sizeof($xml->Isi->Row); $i++) {
								$row = $xml->Isi->Row[$i];
								if(strtolower($row->Daerah) == "bogor") {

									echo "<b>" . strtoupper($row->Daerah) . "</b>" ."<br/>"; 
									echo " Tanggal:" . $xml->Tanggal . "<br/>";
									echo "<div class='col-md-4' style='background-color:transparent;'>";
										echo "Pagi Hari:" . $row->Pagi . "<br/>" ;
										echo "<img src='http://www.bmkg.go.id/asset/img/weather_icon/ID/" . $row->Pagi . "-pm.png' alt='" . $row->Pagi . "'>";
									echo "</div>";
									echo "<div class='col-md-4' style='background-color:transparent;'>";
										echo "Siang Hari:" . $row->Siang . "<br/>" ;
										echo "<img src='http://www.bmkg.go.id/asset/img/weather_icon/ID/" . $row->Siang . "-pm.png' alt='" . $row->Siang . "'>";
									echo "</div>";
									echo "<div class='col-md-4' style='background-color:transparent;'>";
										echo "Sore Hari:" . $row->Malam . "<br/>" ;
										echo "<img src='http://www.bmkg.go.id/asset/img/weather_icon/ID/" . $row->Malam . "-pm.png' alt='" . $row->Malam . "'>";
									echo "</div>";
								break;
								}}
							?>
							</div>
					</div>
				</div>

				<div class="col-md-4 col-sm-4">
					<div class="box box-solid">
		                <div class="box-header bg-green-gradient">
		                  <i class="fa fa-calendar"></i>
		                  <h3 class="box-title">Kalender</h3>
		                </div>
		                <div class="box-body no-padding ">
		                  <div id="my-calendar" style="width: 100%"></div>
		                </div>   
			        </div>
				</div>
			</div>
		</div>
		<!--End Konten2-->

		<!--Begin Konten3-->	
		<div class="container">
			<div class="row" style="background-color:#fff;">

				<div class="col-md-4 col-sm-4">
					<h4 class="widget-title"><i class="fa fa-inbox widget-title-icon"></i>Pengumuman</h4>	
	                <div class="panel-body" style="font-size: 17px; padding:0 15px;">
	                	<div class="slideBox">
         					<ul class="slideUl">      
			                	<?php
									if($banner) {
										foreach ($event->result() as $b) {
										echo "<li class='list'><a href='".$b->link."' target='_blank'><img src='".base_url('uploads/banner/'.$b->banner_file)."' alt='".$b->title."' width='100%'/></a></li>";
										}
									}
								?>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-sm-4">
					<h4 class="widget-title"><i class="fa fa-share widget-title-icon"></i>Banner</h4>	
	                <div class="panel-body" style="font-size: 17px; padding:0 15px;">
	                	<?php
							if($banner) {
								foreach ($banner->result() as $b) {
								echo "<p><a href='".$b->link."' target='_blank'><img src='".base_url('uploads/banner/'.$b->banner_file)."' alt='".$b->title."' width='100%'/></a></p>";
								}
							}
						?>
	                </div>   
				</div>

				<div class="col-md-4 col-sm-4">
					<h4 class="widget-title"><i class="fa fa-comments widget-title-icon"></i>Berita Kota</h4>	
					<div class="panel-body" style="padding:0 15px; font-size: 12px; ">
							<?php
								$url = "http://kotabogor.go.id/index.php/json_berita/get?key=kotaBogor2015B15A";
								$jsonUrl = file_get_contents($url);
								$result = json_decode($jsonUrl, true);
								
								for($i=0 ; $i <10 ; $i++){
									foreach ($result as $row) {
										$id = $row[$i]['postid'];
										$judul = $row[$i]['judul'] ."<br/>";
										echo "<a href='http://kotabogor.go.id/index.php/show_post/detail/$id' target='_blank' style='color:#e68a00; font-family:Andale mono'><b>$judul</b></a>";
									}
								}
							?>	
					</div>
				</div>

			</div>
		</div>
		<!--End Konten3-->

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
							
							</i> Hari ini : <?php echo $pengunjung ?> Pengunjung</br>
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
							<a href="<?php echo site_url('galeri')?>" style="text-transform:uppercase; margin-right:10px;">Selengkapnya</a>
						</div>
					</div>

					<div class="col-md-4 col-sm-4 col-xs-6" style="padding-left: 35px;">
						<h3 style="color: #ffbf00;"><i class="fa fa-phone-square"></i> Kontak Kami</h3>
							<div class="putih">
								<p>
									Alamat : <?php echo $alamat ?><br/>
									Telp. <?php echo $no_telp ?><br/>
									Email : <?php echo $mail_site ?><br/>
									Facebook : Radio Sipatahunan Kota Bogor 89,4 FM <br/>
									Twitter : @sipatahunan_bgr
								</p>
							</div>
					</div>
				</div>
			</div>
		</div>

		<div class="section" style="padding:0; background-color:#000;">
			<div class="container">
				<h5 style="color:#fff; text-align: center;">&copy Copyright Radio Sipatahunan 2016, Kota Bogor</h5>
			</div>
		</div>
		<!--End Footer-->

    	 <script src="<?php echo base_url()?>assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
	    <!-- Bootstrap 3.3.2 JS -->
	    <script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	    <!-- DATA TABES SCRIPT -->
	    <script src="<?php echo base_url()?>assets/dist/js/app.min.js" type="text/javascript"></script>

		<!-- jQuery 1.x -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		
		<!-- Lavazi Navbar Plugins -->
		<script src="<?php echo base_url()?>assets/plugins/lavazi/lavazi.jquery.js" type='text/javascript'></script>
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
		<!-- Carousel Slider Plugins-->
		<script src="<?php echo base_url()?>assets/plugins/carousel-slider/script/carousel_2.js"></script>
		<!-- Zabuto Calendar Plugins -->
		<script src="<?php echo base_url()?>assets/plugins/zabuto_calendar.min.js"></script>

		<script type="text/javascript">
			$(function() {
			$('#kalender').zabuto_calendar();
			});
		</script>
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
		<script type="text/javascript">
			$(document).ready(function() {
			    $('nav>ul').lavazi({background:"#4c1b1b",transitionTime:500,theme:'simple',height:4,mode:'belowBar'});
			});
		</script>
	    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</body>
</html>
