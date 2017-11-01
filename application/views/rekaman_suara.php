		<div class="row">
			<div class="col-md-8 col-sm-4">
				<h2><?php echo $title ?></h2>
				<div class="widget-content">
					<?php
						foreach ($all->result() as $row) {
							echo "<h2>$row->rekaman_title</h2>";
							echo "<div align='justify' style='font-size:14px;'>$row->deskripsi</div>";
							echo "<small><i class='fa fa-calendar-o'></i> Diunggah Pada: $row->upload_date</small>"."<br/>";
							echo "<audio controls='controls' height='50px' width='100px'>";
								echo "<source src='".base_url()."uploads/rekaman/$row->file' type='audio/mpeg' />";
							echo "</audio>"."<br/>";
						}
					?>
				</div>

				<div class="clearfix padding-y-10">
					<div class="pull-right">
					<?php echo $this->pagination->create_links(); ?>
					</div>
				</div>
			</div>

			<div class="col-md-4 col-sm-4">
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