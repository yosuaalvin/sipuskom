<div id="page-wrapper">
    <div class ="container-fluid">
        <div class="row">
        <div class="col-lg-12">
        <h1 class="page-header" >Pilih Tanggal Pemasukan</h1>
            </div>
            <div class="row">
            <div class="col-lg-12">
            <div class="panel panel-primary">
            <div class="panel-heading">
            Silahkan memilih tanggal pemasukan
            </div>
            <div class="panel-body">
            <form action="<?php echo base_url()?>admin/welcome/report_pemasukan_tanggal" method="post">
            <div class="form-group">
            <input type="button" class="btn btn-primary" value="Report Total" onclick="location.href='<?php echo base_url();?>admin/welcome/report_pemasukan'">

            <table class="table" border=1>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Tanggal Awal</th>
                            <th>:</th>
                            <th><input type="date" name="tgl_awal" value=""></th>
                        </tr>
                        <tr>
                            <th>Tanggal Akhir</th>
                            <th>:</th>
                            <th><input type="date" name="tgl_akhir" value=""></th>
                        </tr>

                        </thead>
                    </table>
            </div><hr>
                     <input type="submit" class="btn btn-primary" value="Submit" name="submit"/>
                     <input type="button" class="btn btn-primary" value="Back" onclick="location.href='<?php echo base_url();?>admin/welcome/'">

            </div>
            </div>
            </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
