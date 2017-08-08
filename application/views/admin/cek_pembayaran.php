<div id="page-wrapper">
    <div class="row">
    <div class="col-md-12">
    <h2 class="page-header">
    Pelatihan  <small>Data Peserta Telah Konfirmasi Pembayaran</small>
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
                    <th><b>Nama Kursus</b></th>
                    <th><b>Periode</b></th>
                    <th><b>Harga</b></th>
                    <th><b>ID Pembayaran</b></th>
                    <th><b>No. Transaksi</b></th>
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
              <td><?php echo $b->harga_pelatihan?></td>
              <td><?php echo $b->id_pembayaran?></td>
              <td><?php echo $b->no_transaksi?></td>
              <td><a href="<?php echo base_url();?>admin/welcome/ubah_cek_pembayaran/<?php echo $b->id;?>/<?php echo $b->id_user;?>" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-edit"></span></a>
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
