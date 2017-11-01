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
        <strong>Form User</strong>
        
      </div>
      <div class="box-body">
        <?php echo form_open('category/index')?>
        <input type="hidden" name="id" value="<?php if($status != "Ubah"){ echo ""; }else{ echo $row['perkembangan_id']; } ?>">
         <div class="form-group">
         <label>Inovasi</label>
          <select name="inovasi" class="form-control">
          
            <?php
            if($listvieww->num_rows()>0) {
              foreach ($listvieww->result() as $rows) {
                $sel = '';
                if($status == "Ubah"){
                
                if($rows->inovasi_id==$row['nama_inovasi']) {
                  $sel = 'selected';
                }
                }
                ?>
                <option value="<?php echo $rows->inovasi_id ?>" <?php echo $sel; ?>><?php echo $rows->nama_inovasi?></option>
                <?php
              }
            }
            ?>
          </select>
        </div>
        <?php if ($status != "Ubah"){?>
        <div class="form-group">
          <label>Status</label>
          <select name="status" class="form-control">
            <?php
            foreach ($level as $no => $nm) {
              $sel = '';
              if($status == "Ubah"){
              if($row['status']==$no) {
                $sel = 'selected';
              }
            }
              echo "<option value='".$no."' ".$sel.">". $nm."</option>";
            }
            ?>
          </select>
        </div>
<?php }else{ ?>

 <div class="form-group">
          <label>Status</label>
          <select name="status" class="form-control">
            <?php
            foreach ($level as $no => $nm) {
              $sel = '';
            
              if($row['status']==$no) {
                $sel = 'selected';
              }
            
              echo "<option value='".$no."' ".$sel.">". $nm."</option>";
            }
            ?>
          </select>
        </div>
<?php } ?>


        <div class="form-group">
          <label>Persentase</label>
          <input type="text" name="persentase" class="form-control" value="<?php if($status == "Ubah"){ echo $row['persentase']; }?>">
          <p class="help-block text-red"><?php echo form_error('persentase',' ')?></p>
        </div>
        <div class="form-group">
          <label>Keterangan</label>
          <input type="text" name="ket" class="form-control" value="<?php if($status == "Ubah"){ echo $row['ket']; }?>">
          <p class="help-block text-red"><?php echo form_error('keterangan',' ')?></p>
        </div>
         <input type="hidden" name="tgl" value="<?php echo date('d-m-Y'); ?> ">
       <!-- <div class="form-group">
          <label>Tanggal</label>
          <input type="date" name="tgl" class="form-control" value="<?php if($status == "Ubah"){ echo $row['tgl']; } ?>">
          <p class="help-block text-red"><?php echo form_error('tgl',' ')?></p>
        </div>
      -->
        

       
        <div class="form-group">
          <button class="btn btn-info" type="submit"><i class="fa fa-save"></i> Save</button>
          <button class="btn btn-default" type="reset">Reset</button>
        </div>
        <?php echo form_close();?>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
  <div class="col-lg-8">
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
              <th>Keterangan</th>
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
                <td><?php echo $rows->ket; ?></td>
              <td><?php echo $rows->tgl; ?></td>
              <td>
                <a href="<?php echo site_url('category/index/'.$rows->perkembangan_id)?>" class="btn btn-xs bg-green" data-toggle="tooltip" title="Edit Data"><i class="fa fa-pencil"></i></a>
                <a href="<?php echo site_url('trash/proses?tabel=perkembangan&primary='.$rows->perkembangan_id.'&url=category')?>" class="btn btn-xs bg-red" data-toggle="tooltip" title="Hapus Data" onclick="return confirm('Menghapus data!! Anda yakin??')"><i class="fa fa-trash-o"></i></a>
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