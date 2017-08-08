<div id="page-wrapper">
    <div class ="container-fluid">
        <div class="row">
        <div class="col-lg-12">
        <h1 class="page-header" >Edit Laboratorium</h1>
            </div>
            <div class="row">
            <div class="col-lg-12">
            <div class="panel panel-primary">
            <div class="panel-heading">
            Silahkan mengubah laboratorium yang tersedia
            </div>
            <div class="panel-body">
            <form action="<?php echo base_url()?>admin/welcome/ubah_lab/<?php  echo $laboratorium->id_lab?>" method="post">
            <div class="form-group">
            <table class="table" border=1>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nama Laboratorium</th>
                            <th>:</th>
                            <th><input type="text" size=50 name="nama_lab" value="<?php echo $laboratorium->nama_lab?>"></th>
                        </tr>
                        </thead>
                    </table>
            </div><hr>
                     <input type="submit" class="btn btn-primary" value="Ubah" name="submit"/>
                     <input type="button" class="btn btn-primary" value="Back" onclick="location.href='<?php echo base_url();?>admin/welcome/laboratorium'">
            </div>
            </div>
            </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
