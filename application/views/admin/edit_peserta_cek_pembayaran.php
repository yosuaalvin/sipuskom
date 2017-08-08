<div id="page-wrapper">
    <div class ="container-fluid">
        <div class="row">
        <div class="col-lg-12">
        <h1 class="page-header" >Cek Konfirmasi Pembayaran</h1>
            </div>
            <div class="row">
            <div class="col-lg-12">
            <div class="panel panel-primary">
            <div class="panel-heading">
            Silahkan mengubah peserta pelatihan custom
            </div>
            <div class="panel-body">
            <form action="<?php echo base_url()?>admin/welcome/ubah_cek_pembayaran/<?php  echo $peserta->id?>/<?php echo $peserta->id_user?>" method="post">
            <div class="form-group">
            <table class="table" border=1>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>:</th>
                            <th><input type="text" name="nama" value="<?php echo $peserta->nama?>"></th>
                        </tr>
                        <tr>
                            <th>Institusi</th>
                            <th>:</th>
                            <th><input type="text" name="institusi" value="<?php echo $peserta->institusi?>"></th>
                        </tr>
                        <tr>
                            <th>Jenis Pelatihan</th>
                            <th>:</th>
                            <th><input type="text" size=50 name="nm_kursus" value="<?php echo $peserta->nm_kursus?>"></th>
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
                            <th>ID Pembayaran</th>
                            <th>:</th>
                            <th><input type="id_pembayaran" name="id_pembayaran" value="<?php echo $peserta->id_pembayaran?>"></th>
                        </tr>
                        <tr>
                            <th>No. Transaksi</th>
                            <th>:</th>
                            <th><input type="text" name="no_transaksi" value="<?php echo $peserta->no_transaksi?>"></th>

                        </tr>
                        </thead>
                    </table>
            </div><hr>
                     <input type="submit" class="btn btn-primary" value="Konfirmasi" name="submit"/>
                     <input type="button" class="btn btn-primary" value="Back" onclick="location.href='<?php echo base_url();?>admin/welcome/peserta_custom'">

            </div>
            </div>
            </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
