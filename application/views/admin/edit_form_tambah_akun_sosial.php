<div id="page-wrapper">
    <div class ="container-fluid">
        <div class="row">
        <div class="col-lg-12">
        <h1 class="page-header" >Edit Akun Sosial</h1>
            </div>
            <div class="row">
            <div class="col-lg-12">
            <div class="panel panel-primary">
            <div class="panel-heading">
            Silahkan mengubah akun sosial yang tersedia
            </div>
            <div class="panel-body">
            <form action="<?php echo base_url()?>admin/welcome/ubah_akun_sosial/<?php  echo $akun_sosial->id_akun?>" method="post">
            <div class="form-group">
            <table class="table" border=1>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>:</th>
                            <th><input type="text" size=50 name="email" value="<?php echo $akun_sosial->email?>"></th>
                        </tr>
                        <tr>
                            <th>Telegram Chat ID</th>
                            <th>:</th>
                            <th><input type="text" size=50 name="chat_id_telegram" value="<?php echo $akun_sosial->chat_id_telegram?>"></th>
                        </tr>
                        </thead>
                    </table>
            </div><hr>
                     <input type="submit" class="btn btn-primary" value="Ubah" name="submit"/>
                     <input type="button" class="btn btn-primary" value="Back" onclick="location.href='<?php echo base_url();?>admin/welcome/akun_sosial'">
            </div>
            </div>
            </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
