<div id="page-wrapper">
    <div class ="container-fluid">
        <div class="row">
        <div class="col-lg-12">
        <h1 class="page-header" >Edit Rekening</h1>
            </div>
            <div class="row">
            <div class="col-lg-12">
            <div class="panel panel-primary">
            <div class="panel-heading">
            Silahkan mengubah rekening yang tersedia
            </div>
            <div class="panel-body">
            <form action="<?php echo base_url()?>admin/welcome/ubah_rekening/<?php  echo $rekening->id_akun?>" method="post">
            <div class="form-group">
            <table class="table" border=1>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No. Rekening</th>
                            <th>:</th>
                            <th><input type="text" size=50 name="no_rekening" value="<?php echo $rekening->no_rekening?>"></th>
                        </tr>
                        <tr>
                            <th>Bank</th>
                            <th>:</th>
                            <th><input type="text" size=50 name="bank" value="<?php echo $rekening->bank?>"></th>
                        </tr>
                        </thead>
                    </table>
            </div><hr>
                     <input type="submit" class="btn btn-primary" value="Ubah" name="submit"/>
                     <input type="button" class="btn btn-primary" value="Back" onclick="location.href='<?php echo base_url();?>admin/welcome/rekening'">
            </div>
            </div>
            </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
