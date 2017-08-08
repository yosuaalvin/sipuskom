<div id="page-wrapper">
    <div class="row">
    <div class="col-md-12">
    <h2 class="page-header">
    Pelatihan Custom  <small>Data Peserta</small>
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
            <table class="table table-striped table-bordered table-hover" >
            <thead>
                <tr class="danger">
                    <th><b>No</b></th>
                    <th><b>Nama</b></th>
                    <th><b>Institusi</b></th>
                    <th><b>No. Telp</b></th>
                    <th><b>Nama Pelatihan</b></th>
                    <th><b>Periode</b></th>
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
              <td><?php echo $b->nm_kursus?></td>
              <td><?php echo $b->periode?></td>
              <td><a href="<?php echo base_url();?>admin/welcome/ubah_ps_custom/<?php echo $b->id;?>" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-edit"></span></a>
              <a href="<?php echo base_url();?>admin/welcome/hapus_ps/<?php echo $b->id;?>" onClick="return checkMe()" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-trash"></span></a>
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
