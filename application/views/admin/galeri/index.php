<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?php echo $title ?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><?php echo $title ?></li>
    <li class="active"></li>
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
  
  <div class="col-lg-12">
    <!-- Default box -->
    <div class="box">
      <div class="box-body">
        <table id="example1" class="table table-bordered table-hover">
          <thead>
           <a href="<?php echo site_url('adm_inovasi/add_data/')?>" ><button class="btn btn-info" type="submit"><i class="fa fa-save"></i> Tambah </button></a> <br><br>
         
              <th>No.</th>
              <th>Nama Inovasi</th>
              <th>Penjelasan</th>
              <th>Manfaat</th>
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
               <td><?php echo $rows->nama_inovasi ?></td>
              <td><?php echo $rows->penjelasan ?></td>
              <td><?php echo $rows->manfaat ?></td>
              <td>
                <a href="<?php echo site_url('adm_inovasi/edit/'.$rows->inovasi_id)?>" class="btn btn-xs bg-green" data-toggle="tooltip" title="Edit Data"><i class="fa fa-pencil"></i></a>
                <a href="<?php echo site_url('trash/proses?tabel=inovasi&primary='.$rows->inovasi_id.'&url=adm_inovasi')?>" class="btn btn-xs bg-red" data-toggle="tooltip" title="Hapus Data" onclick="return confirm('Anda yakin??')"><i class="fa fa-trash-o"></i></a>
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