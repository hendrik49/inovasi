<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?php echo $title ?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li>Radio Sipatahunan</li>
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


echo form_open_multipart('adm_daftar_acara/tambah');
?>
<div class="box">
  <div class="box-header text-right">
      <button type="submit" class="btn btn-sm bg-orange"><i class="fa fa-save"></i> Simpan</button>
      <button type="reset" class="btn btn-sm btn-default"> Reset</button>
      <a href="<?php echo site_url('adm_daftar_acara')?>" class="btn btn-sm bg-blue">Kembali</a>
  </div>
</div>
<div class="row">
  <div class="col-md-7">
    <div class="box">
      <div class="box-body">
        <div class="form-group">
          <label>Kategori Program*</label>
          <select name="kategori" class="form-control">
            <option value="0">Nama Kategori</option>
            <option value="1">Program Unggulan</option>
            <option value="2">Program Spesial</option>
            <option value="3">Program Spesial Weekend</option>
          </select>
        </div>
        <div class="form-group">
          <label>Nama Program*</label>
          <input type="text" name="nama_acara" placeholder="nama program" class="form-control">
          <p class="help-block text-red"><?php echo form_error('nama_acara', ' ')?></p>
        </div>
        <div class="form-group">
          <label>Hari*</label>
          <input type="text" name="hari" placeholder="hari" class="form-control">
          <p class="help-block text-red"><?php echo form_error('hari', ' ')?></p>
        </div>
         <div class="form-group">
          <label>Waktu*</label>
          <input type="text" name="waktu" placeholder="waktu" class="form-control">
          <p class="help-block text-red"><?php echo form_error('waktu', ' ')?></p>
        </div>
      </div>
    </div>
  </div>
</div>
</form>
</section><!-- /.content -->

<!-- CK Editor -->
<script src="<?php echo base_url()?>assets/plugins/ckeditor/ckeditor.js"></script>
<script language="javascript">
CKEDITOR.replace( 'editor1', {
filebrowserBrowseUrl : '<?php echo base_url()?>assets/plugins/ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : '<?php echo base_url()?>assets/plugins/ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl : '<?php echo base_url()?>assets/plugins/ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl : '<?php echo base_url()?>assets/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : '<?php echo base_url()?>assets/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : '<?php echo base_url()?>assets/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
filebrowserWindowWidth : '700',
filebrowserWindowHeight : '400'});
CKEDITOR.replace('editor2');</script>
