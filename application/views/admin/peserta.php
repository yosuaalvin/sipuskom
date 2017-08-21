<div id="page-wrapper">
    <div class="row">
    <div class="col-md-12">
    <h2 class="page-header">
    Pelatihan  <small>Data Peserta</small>
    </h2>
    </div>
</div>
<!-- /. ROW  -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                </div>
            <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="example">
            <thead>
                <tr class="danger">
                    <th><b>No</b></th>
                    <th><b>Nama</b></th>
                    <th><b>Institusi</b></th>
                    <th><b>No. Telp</b></th>
                    <th><b>Nama Pelatihan</b></th>
                    <th><b>Periode</b></th>
                    <th><b>Harga</b></th>
                    <th><b>Aksi</b></th>
                    </tr>
            </thead>
            <tbody>
            <?php
             $no=1;
            foreach($peserta as $b):?>
              <tr>
              <td><?php echo $no++?></td>
              <td><?php echo $b->nama?></td>
              <td><?php echo $b->institusi?></td>
              <td><?php echo $b->no_telp?></td>
              <td width="150px"><?php echo $b->nm_kursus?></td>
              <td><?php echo $b->periode?></td>
              <td><?php echo 'Rp. ' . number_format($b->harga_pelatihan,0, ',' , '.');?></td>
              <td><a href="<?php echo base_url();?>admin/welcome/ubah_ps/<?php echo $b->id;?>" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-edit"></span></a>
              <a href="<?php echo base_url();?>admin/welcome/hapus_ps/<?php echo $b->id;?>" onClick="return checkMe()" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-trash"></span></a>
              <a href="<?php echo base_url();?>admin/welcome/cetak_kartu/<?php echo $b->id;?>" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-edit"></span> Cetak</a>
              </td>
            <?php endforeach?>
            </tbody>
            </tr>
            </table>
            </div>
            </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>

            <script type="text/javascript   ">
                $(document).ready( function () {
                    $('#example').DataTable();
                    //$( 'a' ).imageLightbox();
                } );

            </script>
