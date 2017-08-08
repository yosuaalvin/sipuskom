<div id="page-wrapper">
    <div class ="container-fluid">
        <div class="row">
        <div class="col-lg-12">
        <h1 class="page-header" >Edit Jadwal Kursus</h1>
            </div>
            <div class="row">
            <div class="col-lg-12">
            <div class="panel panel-primary">
            <div class="panel-heading">
            Silahkan mengubah jadwal kursus yang tersedia
            </div>
            <div class="panel-body">
            <form action="<?php echo base_url()?>admin/welcome/ubah/<?php  echo $dt_kursus->id?>" method="post">
            <div class="form-group">
            <table class="table" border=1>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nama Kursus</th>
                            <th>:</th>
                            <th><input type="text" size=50 name="nama_kursus" value="<?php echo $dt_kursus->nama_kursus?>"></th>
                        </tr>
                        <tr>
                            <th>Laboratorium</th>
                            <th>:</th>
                            <th>
                             <select name="lepkom" value="<?php echo $dt_kursus->lepkom?>">
                                <option value="Pengembangan Internet">Pengembangan Internet</option>
                                <option value="Jaringan Komputer">Jaringan Komputer</option>
                                <option value="Perakitan Komputer">Perakitan Komputer</option>
                                <option value="Aplikasi Database">Aplikasi Database</option>
                                <option value="E-Commerce">E-Commerce</option>
                                <option value="Aplikasi dan Pemrograman Komputer">Aplikasi dan Pemrograman Komputer</option>
                            </select>
                            </th>
                        </tr>
                        <tr>
                            <th>Periode</th>
                            <th>:</th>
                            <th><input type="date" name="periode" size=50 value="<?php echo $dt_kursus->periode?>"></th>
                        </tr>
                        <tr>
                            <th>Harga</th>
                            <th>:</th>
                            <th><input type="text" size=50 name="harga" value="<?php echo $dt_kursus->harga?>"></th>
                        </tr>
                        <tr>
                            <th>Kuota</th>
                            <th>:</th>
                            <th><input type="text" size=50 name="kuota" value="<?php echo $dt_kursus->kuota?>"></th>
                        </tr>
                        </thead>
                    </table>
            </div><hr>
                     <input type="submit" class="btn btn-primary" value="Ubah" name="submit"/>
                     <input type="button" class="btn btn-primary" value="Back" onclick="location.href='<?php echo base_url();?>admin/welcome/kursus'">

            </div>
            </div>
            </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
