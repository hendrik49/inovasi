<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?php echo $title ?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li>Pengelolaan Lingkungan Hidup</li>
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


echo form_open_multipart('adm_inovasi/edit');
echo form_hidden('id',$item['inovasi_id']);
?>
<div class="box">
  <div class="box-header text-right">
      <button type="submit" class="btn btn-sm bg-orange"><i class="fa fa-save"></i> Simpan</button>
      <button type="reset" class="btn btn-sm btn-default"> Reset</button>
      <a href="<?php echo site_url('utama')?>" class="btn btn-sm bg-grey">Kembali</a>
  </div>
</div>
<div class="row">
  <div class="col-md-7">
    <div class="box">
      <div class="box-body">
         <div class="form-group">
          <label>Nama Singkat Inovasi*</label>
          <input type="text" name="nama_inovasi" class="form-control" value="<?php echo $item['nama_inovasi'] ?>">
          <p class="help-block text-red"></p>
        </div>
        <div class="form-group">
          <label>Penjelasan Singkat*</label>
          <textarea class="form-control" rows="2" name="penjelasan" value="" id="video"><?php echo $item['penjelasan'] ?></textarea>
          <p class="help-block text-red"></p>
        </div>
         
       
        <div class="form-group">
          <label>Manfaat Dari Inovasi</label>
         <input type="text" name="manfaat" class="form-control" value="<?php echo $item['manfaat'] ?>">
        </div>
        <div class="form-group">
          <label>Keunikan / Kreativitas</label>
         <input type="text" name="keunikan" class="form-control" value="<?php echo $item['keunikan'] ?>">
        </div>
        <div class="form-group">
          <label>Kemitraan</label>
         <input type="text" name="kemitraan" class="form-control" value="<?php echo $item['kemitraan'] ?>">
        </div>
        <div class="form-group">
          <label>Potensi Untuk Pengembang Lebih Lanjut, Perluasan, Replika</label>
         <input type="text" name="potensi" class="form-control" value="<?php echo $item['potensi'] ?>">
        </div>
        <div class="form-group">
          <label>Strategi Menjaga Keberlangsuan</label>
         <input type="text" name="strategi" class="form-control" value="<?php echo $item['strategi'] ?>">
        </div>
        <div class="form-group">
          <label>Sumber Daya Yang Digunakan</label>
         <input type="text" name="sumber_daya" class="form-control" value="<?php echo $item['sumber'] ?>">
        </div>
        <div class="form-group">
          <label>Analisa Resiko</label>
         <input type="text" name="analisa_resiko" class="form-control" value="<?php echo $item['analisa'] ?>">
        </div>
      </div>
      
      
    </div>
  </div>

  
<!-- 
  <div class="col-md-5">
    <div class="box">
      <div class="box-body">
         <div class="form-group">
          <label>Nama Singkat Inovasi*</label>
          <input type="text" name="nama_inovasi" class="form-control" value="<?php echo $item['nama_inovasi'] ?>">
          <p class="help-block text-red"></p>
        </div>
        <div class="form-group">
          <label>Penjelasan Singkat*</label>
          <textarea class="form-control" rows="2" name="penjelasan" value="" id="video"><?php echo $item['penjelasan'] ?></textarea>
          <p class="help-block text-red"></p>
        </div>
         
       
        <div class="form-group">
          <label>Manfaat Dari Inovasi</label>
         <input type="text" name="manfaat" class="form-control" value="<?php echo $item['manfaat'] ?>">
        </div>
        <div class="form-group">
          <label>Keunikan / Kreativitas</label>
         <input type="text" name="keunikan" class="form-control" value="<?php echo $item['keunikan'] ?>">
        </div>
        <div class="form-group">
          <label>Kemitraan</label>
         <input type="text" name="kemitraan" class="form-control" value="<?php echo $item['kemitraan'] ?>">
        </div>
        <div class="form-group">
          <label>Potensi Untuk Pengembang Lebih Lanjut, Perluasan, Replika</label>
         <input type="text" name="potensi" class="form-control" value="<?php echo $item['potensi'] ?>">
        </div>
        <div class="form-group">
          <label>Strategi Menjaga Keberlangsuan</label>
         <input type="text" name="strategi" class="form-control" value="<?php echo $item['strategi'] ?>">
        </div>
        <div class="form-group">
          <label>Sumber Daya Yang Digunakan</label>
         <input type="text" name="sumber_daya" class="form-control" value="<?php echo $item['sumber'] ?>">
        </div>
        <div class="form-group">
          <label>Analisa Resiko</label>
         <input type="text" name="analisa_resiko" class="form-control" value="<?php echo $item['analisa'] ?>">
        </div>
      </div>
      
      
    </div>
  </div>

  -->
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
<!-- Maps -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/gmaps/css/style.css')?>" />
<script src="<?php echo base_url('assets/gmaps/js/OpenLayers.js')?>"></script>
<script src="<?php echo base_url('assets/gmaps/js/jquery-position-picker.debug.js')?>"></script>