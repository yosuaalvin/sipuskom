<div id="page-wrapper">
    <div class ="container-fluid">
        <div class="row">
        <div class="col-lg-12">
        <h1 class="page-header" >Form Konfirmasi Pembayaran</h1>
            </div>
            <div class="row">
            <div class="col-lg-12">
            <div class="panel panel-primary">
            <div class="panel-heading">
            Silahkan mengisi no transaksi yang anda gunakan ketika transfer
            </div>
            <div class="panel-body">
            <form action="<?php echo base_url()?>user/welcome/konfirmasi_pembayaran/" method="post">
            <div class="form-group">
            <table class="table" border=1>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                          <th>ID Pembayaran</th>
                          <th>:</th>
                          <th><input type="text" name="id_pembayaran" value="<?php echo $id_pembayaran?>"></th>
                      </tr>
                      <tr>
                          <th>No. Transaksi</th>
                          <th>:</th>
                          <th><input type="text" name="no_transaksi" value=""></th>
                      </tr>
                    </tr>
                      </thead>
                  </table>
          </div><hr>
                   <input type="submit" class="btn btn-primary" value="Register" name="submit"/>
                   <input type="button" class="btn btn-primary" value="Back" onclick="location.href='<?php echo base_url();?>user/welcome/daftar_peserta_kursus'">
        </div>
        </div>
        </div>
        </div>
        </div>
    </div>
    </div>
</div>
