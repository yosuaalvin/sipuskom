<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

<!-- Website Font style -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<link href="<?php echo base_url();?>assets/css/konfirmasi.css" rel="stylesheet">
<!-- Google Fonts -->
<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

<div class="container">
  <div class="row main">
    <div class="main-login main-center">
      <?php echo form_open_multipart('welcome/konfirmasi_pembayaran');?>
      <center><h2 class="cols-sm-2 control-label">Konfirmasi Pembayaran Peserta Pelatihan</h2></center>

        <div class="form-group" >
          <label for="id_pembayaran" class="cols-sm-2 control-label">ID Pembayaran</label>
          <div class="cols-sm-10">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
              <input type="text" class="form-control" name="id_pembayaran" id="id_pembayaran" placeholder="Masukkan ID Pembayaran Anda">
            </div>
          </div>
        </div>

        <div class="form-group" >
          <label for="no_transaksi" class="cols-sm-2 control-label">Nomor Transaksi</label>
          <div class="cols-sm-10">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-credit-card fa" aria-hidden="true"></i></span>
              <input type="text" class="form-control" name="no_transaksi" id="no_transaksi" placeholder="Masukkan Nomor Transaksi">
            </div>
          </div>
        </div>



        <div class="form-group ">
        <input type="submit" class="btn btn-success btn-lg btn-block login-button" value="Register" name="submit"/>
        </div>

      </form>
      <?php echo form_close();?>

    </div>
  </div>
</div>
