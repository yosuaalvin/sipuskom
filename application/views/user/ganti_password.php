<div id="page-wrapper">
    <div class ="container-fluid">
        <div class="row">
        <div class="col-lg-12">
        <h1 class="page-header" >Form Ganti Password</h1>
            </div>
            <div class="row">
            <div class="col-lg-12">
            <div class="panel panel-primary">
            <div class="panel-heading">
            Silahkan mengganti password anda di sini
            </div>
            <div class="panel-body">
            <form action="<?php echo base_url()?>user/welcome/ubah_password/<?php echo $pengguna->id_user?>" method="post">
            <div class="form-group">
            <table class="table" border=1>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                          <th>Password Lama</th>
                          <th>:</th>
                          <th><input type="password" name="password_lama" value=""></th>
                      </tr>
                      <tr>
                          <th>Password Baru</th>
                          <th>:</th>
                          <th><input type="password" name="password_baru" id="password_baru" value=""></th>
                      </tr>
                      <tr>
                          <th>Ulangi Password</th>
                          <th>:</th>
                          <th><input type="password" name="password_konfirm" id="password_konfirm" value="" onChange="checkPasswordMatch();"></th>
                      </tr>
                      <div class="registrationFormAlert" id="divCheckPasswordMatch"></div>
                        </thead>
                    </table>
            </div><hr>
                     <input type="submit" class="btn btn-primary" value="Ubah" name="submit"/>

            </div>
            </div>
            </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script>
function checkPasswordMatch() {
    var password = $("#password_baru").val();
    var confirmPassword = $("#password_konfirm").val();

    if (password != confirmPassword)
        $("#divCheckPasswordMatch").html("Passwords tidak cocok !");
    else
        $("#divCheckPasswordMatch").html("Passwords cocok !");
}
$(document).ready(function () {
   $("#password_baru, #password_konfirm").keyup(checkPasswordMatch);
});
</script>
