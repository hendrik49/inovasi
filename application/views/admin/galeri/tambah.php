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
      <div class="box-header with-border">
        <strong>Form Galeri</strong>
      </div>
      <div class="box-body">
        <?php echo form_open_multipart('adm_inovasi/tambah')?>
        <input type="hidden" name="opd_id" value="<?php echo $this->session->userdata('opd_id') ?>">
        
        <div class="form-group">
          <label>Nama Singkat Inovasi*</label>
          <input type="text" name="nama_inovasi" class="form-control" value="">
          <p class="help-block text-red"></p>
        </div>
          <div class="form-group">
          <label>Penjelasan Singkat*</label>
          <textarea class="form-control" rows="2" name="penjelasan" id="video"></textarea>
          <p class="help-block text-red"></p>
        </div>
         
       
        <div class="form-group">
          <label>Manfaat Dari Inovasi</label>
         <input type="text" name="manfaat" class="form-control" value="">
        </div>
        <div class="form-group">
          <label>Keunikan / Kreativitas</label>
         <input type="text" name="keunikan" class="form-control" value="">
        </div>
        <div class="form-group">
          <label>Kemitraan</label>
         <input type="text" name="kemitraan" class="form-control" value="">
        </div>
        <div class="form-group">
          <label>Potensi Untuk Pengembang Lebih Lanjut, Perluasan, Replika</label>
         <input type="text" name="potensi" class="form-control" value="">
        </div>
        <div class="form-group">
          <label>Strategi Menjaga Keberlangsuan</label>
         <input type="text" name="strategi" class="form-control" value="">
        </div>
        <div class="form-group">
          <label>Sumber Daya Yang Digunakan</label>
         <input type="text" name="sumber_daya" class="form-control" value="">
        </div>
        <div class="form-group">
          <label>Analisa Resiko</label>
         <input type="text" name="analisa_resiko" class="form-control" value="">
        </div>
        
        <div class="form-group">
          <button class="btn btn-info" type="submit"><i class="fa fa-save"></i> Save</button>
          <button class="btn btn-default" type="reset">Reset</button>
        </div>
        <?php echo form_close();?>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
  
  </div>
</div>
</section><!-- /.content -->