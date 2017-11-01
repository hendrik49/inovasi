		<div class="row">
			<div class="col-md-8 col-sm-8">
				<h2>Kontak Kami</h2>
				<div class="clearfix">
					<p>Alamat : <?php echo $alamat?></p>
					<p>Telp. <?php echo $no_telp?></p>
					<p>Email : <?php echo $mail_site ?></p>
					<p>Facebook : Radio Sipatahunan Bogor 89,4 FM </p>
					Twitter : @sptv_radiobogor
				</div>
			</div>

			<div class="col-md-4 col-sm-4">
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
								<source src="http://139.255.53.115:8000/radio" type="audio/mpeg">
							</audio>
						</div>
					</div>
					<!--End Streaming-->
				<h4 class="widget-title"><i class="fa fa-arrow-circle-o-right widget-title-icon"></i> terpopuler</h4>
			<?php
			if ($populer) {
				foreach ($populer->result() as $p) {
			?>
				<div class="widget-content">
					<div class="content-meta">
						<small><i class="fa fa-calendar"></i> <?php echo convert_tanggal($p->date_publish) ?> </small>
						<small class="margin-x-10"><i class="fa fa-eye"></i> Views : <?php echo $p->view ?></small>
						<small><i class="fa fa-user"></i> By <a><?php echo $p->user_name ?></a></small>
					</div>
					<h4><a href="<?php echo linked($p->post_id, $p->title) ?>"><?php echo $p->title ?></a></h4>
					<div align="justify" style="font-size:12px;">
					<?php echo strip_tags(substr($p->body, 0,120))?>..
					</div>
				</div>
			<?php
				}
			}
			?>
				<h4 class="widget-title"><i class="fa fa-arrow-circle-o-right widget-title-icon"></i> banner</h4>
				<?php
				if($banner) {
					foreach ($banner->result() as $b) {
					echo "<p><a href='".$b->link."' target='_blank'><img src='".base_url('uploads/banner/'.$b->banner_file)."' alt='".$b->title."' width='100%'/></a></p>";
					}
				}
				?>
			</div>
		</div>