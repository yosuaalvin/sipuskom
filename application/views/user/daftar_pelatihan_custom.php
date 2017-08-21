<div id="page-wrapper">
    <div class ="container-fluid">
        <div class="row">
        <div class="col-lg-12">
        <h1 class="page-header" >Form Pendaftaran Pelatihan</h1>
            </div>
            <div class="row">
            <div class="col-lg-12">
            <div class="panel panel-primary">
            <div class="panel-heading">
            Silahkan mengisi formulir pendaftaran
            </div>
            <div class="panel-body">
            <?php echo form_open_multipart('user/welcome/daftar_peserta_custom');?>
            <div class="form-group">
            <table class="table" border=1>
            <div class="table-responsive">

                <table class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                          <th>Nama</th>
                          <th>:</th>
                          <th><input type="text" size="50" name="nama" value="<?php echo $dt_peserta->nama?>"></th>
                      </tr>
                      <tr>
                          <th>Institusi</th>
                          <th>:</th>
                          <th><input type="text" name="institusi" value="<?php echo $dt_peserta->institusi?>"></th>
                      </tr>
                      <tr>
                          <th>Pelatihan Custom</th>
                          <th>:</th>
                          <th><input type="text" name="nm_kursus" value=""></th>
                      </tr>
                      <tr>
                          <th>Jumlah Peserta</th>
                          <th>:</th>
                          <th><input type="text" name="kuota" value=""></th>
                      </tr>
                      <tr>
                          <th>Periode</th>
                          <th>:</th>
                          <th><input type="date" name="periode" value=""></th>
                      </tr>
                          <input type="hidden" name="email" value="<?php echo $dt_peserta->email?>">
                          <input type="hidden" name="chat_id" value="<?php echo $dt_peserta->chat_id?>">
                          <input type="hidden" name="tempat_lahir" value="<?php echo $dt_peserta->tempat_lahir?>">
                          <input type="hidden" name="tanggal_lahir" value="<?php echo $dt_peserta->tanggal_lahir?>">
                          <input type="hidden" name="alamat" value="<?php echo $dt_peserta->alamat?>">
                          <input type="hidden" name="no_telp" value="<?php echo $dt_peserta->no_telp?>">
                        </thead>
                    </table>

            </div><hr>
                     <input type="submit" class="btn btn-primary" value="Daftar" name="submit"/>
                     <input type="button" class="btn btn-primary" value="Back" onclick="location.href='<?php echo base_url();?>user/welcome/kursus'">
                     <?php echo form_close();?>
            </div>
            </div>
            </div>
            </div>
            </div>
        </div>
        </div>
    </div>
