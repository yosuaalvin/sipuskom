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
      <?php echo form_open_multipart('welcome/lupa_password_proses_pertanyaan');?>
      <center><h2 class="cols-sm-2 control-label">Lupa Password Login</h2></center>

      <div class="form-group">
        <label for="id_pertanyaan" class="cols-sm-2 control-label">Pertanyaan Keamanan</label>
        <div class="cols-sm-10">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-question fa" aria-hidden="true"></i></span>
            <select required class="form-control" name="id_pertanyaan" value="">
              <option value="">Pilih Pertanyaan</option>
              <?php
              $no=1;
              foreach($pertanyaan as $p):?>
              <option value="<?php echo $p->id_pertanyaan; ?>"><?php echo $p->isi_pertanyaan; ?></option>
              <?php endforeach; ?>
            </select>
              </div>
        </div>
      </div>

      <div class="form-group">
        <label for="jawaban_pertanyaan" class="cols-sm-2 control-label">Jawaban Pertanyaan</label>
        <div class="cols-sm-10">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-question-circle fa" aria-hidden="true"></i></span>
            <input required type="text" class="form-control" name="jawaban_pertanyaan" placeholder="Masukkan Jawaban Pertanyaan Keamanan Anda"/>
          </div>
        </div>
      </div>
      <input type="hidden" name="email" value="<?= $email?>">

        <div class="form-group ">
        <input type="submit" class="btn btn-danger btn-lg btn-block login-button" value="Submit" name="submit"/>
        </div>

      </form>
      <?php echo form_close();?>

    </div>
  </div>
</div>
