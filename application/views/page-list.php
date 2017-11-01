		<div class="row">
			<div class="col-md-8 col-sm-8">
			<?php
				if ($all->num_rows()>0) {
					foreach ($all->result() as $row) {
				?>
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
							<small><i class="fa fa-user"></i> By <a style="color:#000"><?php echo $row->user_name ?></a></small>
						</div>
						<div align="justify">
							<?php echo strip_tags(substr($row->body, 0,350))?>..
						</div>
					</div>
				</div>
				<?php
				}
			} else {
				echo "Belum ada data diinputkan!! Silahkan kembali lagi nanti.";
			}
			?>
				<div class="clearfix padding-y-10">
					<div class="pull-right">
					<?php echo $this->pagination->create_links(); ?>
					</div>
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
						<small class="author"><i class="fa fa-user"></i> By <a><?php echo $p->user_name ?></a></small>
	                    <small class="date"><i class="fa fa-calendar"></i> On <?php echo convert_tanggal($p->date_publish) ?></small>
	                    <small class="tag"><i class="fa fa-tag"></i> <a><?php echo $p->category_name ?></a></small>
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