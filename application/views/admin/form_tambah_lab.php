<div id="page-wrapper">
    <div class ="container-fluid">
        <div class="row">
        <div class="col-lg-12">
        <h1 class="page-header" >Tambah Data</h1>
            </div>
            <div class="row">
            <div class="col-lg-12">
            <div class="panel panel-danger">
            <div class="panel-heading">
            <b>Silahkan menambahkan laboratorium yang tersedia</b>
            </div>
            <div class="panel-body">
            <?php echo form_open_multipart('admin/welcome/tambah_laboratorium');?>
            <div class="form-group">
            <table class="table" border=1>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr class="danger">
                            <th>Nama Laboratorium</th>
                            <th>:</th>
                            <th><input type="text" size=50 name="nama_lab"></th>
                        </tr>
                        </thead>
                    </table>
            </div><hr>
                     <input type="submit" class="btn btn-danger" value="Tambah" name="submit"/>
                     <input type="button" class="btn btn-primary" value="Back" onclick="location.href='<?php echo base_url();?>admin/welcome/laboratorium'">

                    <?php echo form_close();?>
            </div>
            </div>
            </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
