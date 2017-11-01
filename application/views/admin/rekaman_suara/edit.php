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


echo form_open_multipart('adm_rekaman_suara/edit');
echo form_hidden('id',$item['rekaman_suara_id']);
?>
<div class="box">
  <div class="box-header text-right">
      <button type="submit" class="btn btn-sm bg-orange"><i class="fa fa-save"></i> Simpan</button>
      <button type="reset" class="btn btn-sm btn-default"> Reset</button>
      <a href="<?php echo site_url('adm_rekaman_suara')?>" class="btn btn-sm bg-grey">Kembali</a>
  </div>
</div>
<div class="row">
  <div class="col-md-7">
    <div class="box">
      <div class="box-body">
        <div class="form-group">
          <label>Judul Rekaman Suara*</label>
          <input type="text" name="rekaman_title" value="<?php echo $item['rekaman_title'] ?>" class="form-control">
        </div>
         <div class="form-group">
          <label>Kategori Rekaman</label><br/>
          <select name="kategori" class="form-control">
            <?php
              if($item['kategori']=='Bilik'){
                  echo '<option value="pilih">- Pilih -</option>';
                  echo '<option selected value="Bilik">Bilik</option>';
                  echo '<option value="Kontak Juanda 10">Kontak Juanda 10</option>';
              }
              else
              {
                  echo '<option value="pilih">- Pilih -</option>';
                  echo '<option value="Bilik">Bilik</option>';
                  echo '<option selected value="Kontak Juanda 10">Kontak Juanda 10</option>'; 
              }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label>Rangkuman Rekaman</label>
          <textarea class="form-control" rows="4" name="deskripsi"><?php echo $item['deskripsi'] ?></textarea>
        </div>
        <div class="form-group">
          <label>Tanggal Rekaman</label>
          <input type="text" name="rekaman_date" value="<?php echo $item['rekaman_date']?>" class="form-control" id="dp2">
        </div>
        <div class="form-group">
          <label>file Rekaman</label></div></br>
          <?php
            echo $item['file'];   
          ?>
          <input type="file" name="file" id="foto">
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
<!-- Maps -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/gmaps/css/style.css')?>" />
<script src="<?php echo base_url('assets/gmaps/js/OpenLayers.js')?>"></script>
<script src="<?php echo base_url('assets/gmaps/js/jquery-position-picker.debug.js')?>"></script>