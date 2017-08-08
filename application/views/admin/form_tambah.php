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
            <b>Silahkan menambahkan jadwal kursus yang tersedia</b>
            </div>
            <div class="panel-body">
            <?php echo form_open_multipart('admin/welcome/tambah_kursus');?>
            <div class="form-group">
            <table class="table" border=1>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr class="danger">
                            <th>Nama Kursus</th>
                            <th>:</th>
                            <th><input type="text" size=50 name="nama_kursus"></th>
                        </tr>
                        <tr  class="danger">
                            <th>Laboratorium</th>
                            <th>:</th>
                            <th>
                             <select name="lepkom">
                                <option value="Pengembangan Internet">Pengembangan Internet</option>
                                <option value="Jaringan Komputer">Jaringan Komputer</option>
                                <option value="Perakitan Komputer">Perakitan Komputer</option>
                                <option value="Aplikasi Database">Aplikasi Database</option>
                                <option value="E-Commerce">E-Commerce</option>
                                <option value="Aplikasi dan Pemrograman Komputer">Aplikasi dan Pemrograman Komputer</option>
                            </select>
                            </th>
                        </tr>
                        <tr  class="danger">
                            <th>Periode</th>
                            <th>:</th>
                            <th><input type="date" name="periode" size=50></th>
                        </tr>
                        <tr  class="danger">
                            <th>Harga</th>
                            <th>:</th>
                            <th><input type="text" size=50 name="harga"></th>
                        </tr>
                        <tr  class="danger">
                            <th>Kuota</th>
                            <th>:</th>
                            <th><input type="text" size=50 name="kuota"></th>
                        </tr>
                        </thead>
                    </table>
            </div><hr>
                     <input type="submit" class="btn btn-danger" value="Tambah" name="submit"/>
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