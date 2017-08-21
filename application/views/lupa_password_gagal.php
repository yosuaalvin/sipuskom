<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

<!-- Website Font style -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<link href="<?php echo base_url();?>assets/css/lupa_password.css" rel="stylesheet">
<!-- Google Fonts -->
<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

<div class="container">
  <div class="row main">
    <div class="main-login main-center">
      <?php echo form_open_multipart('welcome/lupa_password');?>
      <center><h2 class="cols-sm-2 control-label">Mohon Maaf Email yang anda Masukkan tidak terdaftar</h2></center>

        <div class="form-group ">
        <input type="submit" class="btn btn-danger btn-lg btn-block login-button" value="Back" name="submit"/>
        </div>

      </form>
      <?php echo form_close();?>

    </div>
  </div>
</div>
