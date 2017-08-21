<div id="page-wrapper">
    <div class="row">
    <div class="col-md-12">
    <h2 class="page-header">
    Rekening  <small>Tambah Data</small>
    </h2>
    </div>
</div>
<!-- /. ROW  -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo anchor('admin/welcome/tambah_data_rekening','Tambah Data',array('class'=>'btn btn-danger btn-sm')) ?>
                </div>
            <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="example">
            <thead>
                <tr class="danger">
                    <th><b>No</b></th>
                    <th><b>No. Rekening</b></th>
                    <th><b>Bank</b></th>
                    <th><b>Aksi</b></th>
                    </tr>
            </thead>
            <tbody>
            <?php
            $no=1;
            foreach($rekening as $b):?>
              <tr>
              <td><?php echo $no++?></td>
              <td><?php echo $b->no_rekening?></td>
              <td><?php echo $b->bank?></td>
              <td><a href="<?php echo base_url();?>admin/welcome/ubah_rekening/<?php echo $b->id_akun;?>" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-edit"></span></a>
              <a href="<?php echo base_url();?>admin/welcome/hapus_rekening/<?php echo $b->id_akun;?>" onClick="return checkMe()" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-trash"></span></a>
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
