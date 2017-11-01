		<div class="row">
			<div class="col-md-8 col-sm-8">
				<h2>Program Acara</h2>
				<div class="box-body">
		    <table class="table table-bordered table-striped dataTable">
		      <thead>
		      	<tr>
		      		<th colspan="4" style="background-color:#d9d9d9"><h3>Program Unggulan</h3></th>
		      	</tr>
		        <tr>
		          <th>No</th>
		          <th>Nama Program</th>
		          <th>Hari</th>
		          <th>Waktu</th>   
		        </tr>
		      </thead>
		      <tbody>
		      <?php
		      {
		        $no = 1;
		        foreach ($listview1->result() as $rows) {
		      ?>
		      <tr>
		        <td><?php echo $no ?></td>
		        <td><?php echo $rows->nama_program ?></td>
		        <td><?php echo $rows->hari ?></td>
		        <td><?php echo $rows->waktu ?></td>
		      </tr>
		      <?php
		      $no++;
		        }
		      } 
		     
		      ?>
		      </tbody>
		    </table>

		    <table class="table table-bordered table-striped dataTable">
		      <thead>
		      	<tr>
		      		<th colspan="4" style="background-color:#d9d9d9"><h3>Program Spesial</h3></th>
		      	</tr>
		        <tr>
		          <th>No</th>
		          <th>Nama Program</th>
		          <th>Hari</th>
		          <th>Waktu</th>   
		        </tr>
		      </thead>
		      <tbody>
		      <?php
		      {
		        $no = 1;
		        foreach ($listview2->result() as $rows) {
		      ?>
		      <tr>
		        <td><?php echo $no ?></td>
		        <td><?php echo $rows->nama_program ?></td>
		        <td><?php echo $rows->hari ?></td>
		        <td><?php echo $rows->waktu ?></td>
		      </tr>
		      <?php
		      $no++;
		        }
		      } 
		     
		      ?>
		      </tbody>
		    </table>

		    <table class="table table-bordered table-striped dataTable">
		      <thead>
		      	<tr>
		      		<th colspan="4" style="background-color:#d9d9d9"><h3>Program Spesial Weekend</h3></th>
		      	</tr>
		        <tr>
		          <th>No</th>
		          <th>Nama Program</th>
		          <th>Hari</th>
		          <th>Waktu</th>   
		        </tr>
		      </thead>
		      <tbody>
		      <?php
		      {
		        $no = 1;
		        foreach ($listview3->result() as $rows) {
		      ?>
		      <tr>
		        <td><?php echo $no ?></td>
		        <td><?php echo $rows->nama_program ?></td>
		        <td><?php echo $rows->hari ?></td>
		        <td><?php echo $rows->waktu ?></td>
		      </tr>
		      <?php
		      $no++;
		        }
		      } 
		     
		      ?>
		      </tbody>
		    </table>
      
    </div><!-- /.box-body -->
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