<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?php echo $title ?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><?php echo $title ?></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<?php
if($this->session->flashdata('success')) {
  echo '
  <div class="alert alert-success">'.$this->session->flashdata('success').'</div> 
  ';
}
if($this->session->flashdata('error')) {
  echo '
  <div class="alert alert-danger">'.$this->session->flashdata('error').'</div> 
  ';
}
?>
<div class="row">
  <div class="col-lg-4">
    <!-- Default box -->
   <div class="box">
      <div class="box-header with-border">
        <strong>Jumlah Inovasi</strong>
        
      </div>
      <div class="box-body" style="height:395px;">
      
        <div class="form-group" width="300px" height="300px">
         
         <p style="font-size: 12em; color:#3c8dbc; text-align: center;"><?php echo $jumlah; ?></p>
          
        </div>
      
 
     
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
  
  <div class="col-lg-8">
    <!-- Default box -->
    <div class="box">
         <div class="box-header with-border">
        <strong>Distribusi Perkambangan</strong>
        
      </div>
      <div class="box-body">
           <iframe src="<?php echo site_url('status/status');?>" width="100%" height="350px">>    </iframe  >
       <a href="<?php echo site_url('status/status');?>">Tampilkan Layar Penuh</a>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
</div>


<div class="row">
  <div class="col-lg-12">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <strong>Distribusi Per Perangkat Daerah</strong>
        
      </div>
      <div class="box-body">
      <iframe src="<?php echo site_url('chart');?>" width="100%" height="450px">    </iframe  >
        <a href="<?php echo site_url('chart');?>">Tampilkan Layar Penuh</a>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
  </div>
  <div class="row">
  <div class="col-lg-6">
    <!-- Default box -->
    <div class="box">
         <div class="box-header with-border">
        <strong>Data Keterkinian</strong>
        
      </div>
      <div class="box-body">
       <iframe src="<?php echo site_url('pie');?>" width="100%" height="350px">>    </iframe  >
         <a href="<?php echo site_url('pie');?>">Tampilkan Layar Penuh</a>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
</div>

<div class="row">
  
   
  <div class="col-lg-12">
    <!-- Default box -->
    <div class="box">
      <div class="box-body">
        <table id="example1" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Perangkat Daerah</th>
              <th>Nama Inovasi</th>
              <th>Status</th>
              <th>Tanggal Update Terakhir</th>
              <th>Tools</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if($listview->num_rows()>0) {
              $no = 1;
              foreach ($listview->result() as $rows) {
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $rows->user_name ?></td>
              <td><?php echo $rows->nama_inovasi; ?></td>
              <td><?php echo $level[$rows->status] ?></td>
              <td><?php echo $rows->tgl; ?></td>
              <td>
                <a href="<?php echo site_url('utama/edit/'.$rows->inovasi_id)?>" class="btn btn-xs bg-green" data-toggle="tooltip" title="Detail"><i class="fa fa-pencil"></i></a>
              
              </td>
            </tr>
            <?php
              $no++;
              }
            }
            ?>
          </tbody>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
</div>
</section><!-- /.content -->