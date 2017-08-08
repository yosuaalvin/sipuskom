<div id="page-wrapper">
    <div class="row">
    <div class="col-md-12">
    <h2 class="page-header">
    Akun Sosial  <small>Tambah Data</small>
    </h2>
    </div>
</div>
<!-- /. ROW  -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo anchor('admin/welcome/tambah_data_akun_sosial','Tambah Data',array('class'=>'btn btn-danger btn-sm')) ?>
                </div>
            <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr class="danger">
                    <th><b>No</b></th>
                    <th><b>Email</b></th>
                    <th><b>Telegram Chat ID</b></th>
                    <th><b>Aksi</b></th>                    
                    </tr>
            </thead>
            <tbody>
            <?php
            $no=1;
            foreach($akun_sosial as $b):?>
              <tr>
              <td><?php echo $no++?></td>
              <td><?php echo $b->email?></td>
              <td><?php echo $b->chat_id_telegram?></td>
              <td><a href="<?php echo base_url();?>admin/welcome/ubah_akun_sosial/<?php echo $b->id_akun;?>" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-edit"></span></a>
              <a href="<?php echo base_url();?>admin/welcome/hapus_akun_sosial/<?php echo $b->id_akun;?>" onClick="return checkMe()" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-trash"></span></a>
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
