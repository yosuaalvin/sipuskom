<div id="page-wrapper">
    <div class ="container-fluid">
        <div class="row">
        <div class="col-lg-12">
        <h1 class="page-header" >Edit Peserta</h1>
            </div>
            <div class="row">
            <div class="col-lg-12">
            <div class="panel panel-primary">
            <div class="panel-heading">
            Silahkan mengubah peserta pelatihan
            </div>
            <div class="panel-body">
            <form action="<?php echo base_url()?>admin/welcome/ubah_ps/<?php  echo $peserta->id?>" method="post">
            <div class="form-group">
            <table class="table" border=1>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>:</th>
                            <th><input size="50" type="text" name="nama" value="<?php echo $peserta->nama?>"></th>
                        </tr>
                        <tr>
                            <th>Institusi</th>
                            <th>:</th>
                            <th><input type="text" name="institusi" value="<?php echo $peserta->institusi?>"></th>
                        </tr>
                        <tr>
                            <th>Jenis Pelatihan</th>
                            <th>:</th>
                            <th><select name="nm_kursus">
                                            <option value="">Pilih Pelatihan</option>
                                            <?php
                                            $no=1;
                                            foreach($kursus as $k):?>
                                            <option value="<?php echo $k->nama_kursus; ?>" <?php if ($peserta->nm_kursus) { if ($peserta->nm_kursus==$k->nama_kursus) { echo "selected";} else {echo "";}} ?>><?php echo $k->nama_kursus; ?></option>
                                            <?php endforeach; ?>
                                          </select>
                                        </th>
                        </tr>
                        <tr>
                            <th>Harga Pelatihan</th>
                            <th>:</th>
                            <th><input type="text" name="harga_pelatihan" value="<?php echo $peserta->harga_pelatihan?>"></th>
                        </tr>
                        <tr>
                            <th>Jumlah Peserta</th>
                            <th>:</th>
                            <th><input type="text" name="kuota" value="<?php echo $peserta->kuota?>"></th>
                        </tr>
                        <tr>
                            <th>Periode</th>
                            <th>:</th>
                            <th><input type="date" name="periode" value="<?php echo $peserta->periode?>"></th>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <th>:</th>
                            <th><input type="email" name="email" value="<?php echo $peserta->email?>"></th>
                        </tr>
                        <tr>
                            <th>Telegram Chat ID</th>
                            <th>:</th>
                            <th><input type="text" name="chat_id" value="<?php echo $peserta->chat_id?>"></th>
                        </tr>
                        <tr>
                            <th>Tempat Lahir</th>
                            <th>:</th>
                            <th><input type="text" name="tempat_lahir" value="<?php echo $peserta->tempat_lahir?>"></th>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                            <th>:</th>
                            <th><input type="date" name="tanggal_lahir" value="<?php echo $peserta->tanggal_lahir?>"></th>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <th>:</th>
                            <th><input type="text" name="alamat" value="<?php echo $peserta->alamat?>"></th>
                        </tr>
                        <tr>
                            <th>No. HP / Telegram</th>
                            <th>:</th>
                            <th><input type="text" name="no_telp" value="<?php echo $peserta->no_telp?>"></th>
                        </tr>
                        </thead>
                    </table>
            </div><hr>
                     <input type="submit" class="btn btn-primary" value="Ubah" name="submit"/>
                     <input type="button" class="btn btn-primary" value="Back" onclick="location.href='<?php echo base_url();?>admin/welcome/peserta'">

            </div>
            </div>
            </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
