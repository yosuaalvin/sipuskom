<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

<!-- Website Font style -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<link href="<?php echo base_url();?>assets/css/lupa_password.css" rel="stylesheet">
<!-- Google Fonts -->
<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<div class="container">
  <div class="row main">
    <div class="main-login main-center">
      <?php echo form_open_multipart('welcome/lupa_password_proses');?>
      <center><h2 class="cols-sm-2 control-label">Lupa Password Login</h2></center>

        <div class="form-group" >
          <label for="id_pembayaran" class="cols-sm-2 control-label">Alamat Email</label>
          <div class="cols-sm-10">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
              <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email Anda">
            </div>
          </div>
        </div>
        <div align="center" class="g-recaptcha" data-sitekey="6LebdC0UAAAAAKPNiB6Ob7UaLOZ2kTD4NG2Frflp"></div>

        <div class="form-group ">
        <input type="submit" class="btn btn-danger btn-lg btn-block login-button" value="Submit" name="submit"/>
        </div>

      </form>
      <?php echo form_close();?>

    </div>
  </div>
</div>
