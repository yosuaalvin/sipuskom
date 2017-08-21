<div id="page-wrapper">
    <div class="row">
    <div class="col-md-12">
    <h2 class="page-header">
    Kursus  <small>Tambah Data</small>
    </h2>
    </div>
</div>
<!-- /. ROW  -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo anchor('admin/welcome/tambah_data','Tambah Data',array('class'=>'btn btn-danger btn-sm')) ?>
                </div>
            <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="example">
            <thead>
                <tr class="danger">
                    <th><b>No</b></th>
                    <th><b>Nama Kursus</b></th>
                    <th><b>Laboratorium</b></th>
                    <th><b>Tanggal</b></th>
                    <th><b>Harga</b></th>
                    <th><b>Kuota</b></th>
                    <th><b>Aksi</b></th>
                    </tr>
            </thead>
            <tbody>
            <?php
            $no=1;
            foreach($kursus as $b):?>
              <tr>
              <td><?php echo $no++?></td>
              <td><?php echo $b->nama_kursus?></td>
              <td><?php echo $b->laboratorium?></td>
              <td><?php echo $b->periode?></td>
              <td><?php echo 'Rp. ' . number_format($b->harga,0, ',' , '.');?></td>
              <td><?php echo $b->kuota?></td>
              <td><a href="<?php echo base_url();?>admin/welcome/ubah/<?php echo $b->id;?>" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-edit"></span></a>
              <a href="<?php echo base_url();?>admin/welcome/hapus/<?php echo $b->id;?>" onClick="return checkMe()" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-trash"></span></a>
<?php if ($b->status==0){?>
<a href="<?php echo base_url();?>admin/welcome/lock_kursus/<?php echo $b->id;?>">Lock</a>
<?php }else{?>
  <a href="<?php echo base_url();?>admin/welcome/unlock_kursus/<?php echo $b->id;?>"> Unlock</a>
<?php }?>

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
