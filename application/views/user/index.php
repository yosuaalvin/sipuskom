 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $total ?></div>
                                    <div>Jadwal Kursus</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url(); ?>user/welcome/kursus">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <!--
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">0</div>
                                    <div>Jadwal Workshop</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url(); ?>user/welcome/workshop">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
              -->
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $kursus->jumlah_peserta;?></div>
                                    <div>Cetak Pendaftaran</div>
                                </div>
                            </div>
                        </div>
                        <a href= "<?php echo base_url(); ?>user/welcome/konfirmasi">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <!--
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">1</div>
                                    <div>Developer</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url(); ?>user/welcome/about">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
          -->
            <div class="row">
                    <div class="col-md-12">
                    <div class="panel panel-primary">
                            <div class="panel-heading">
                            Selamat Datang <?php echo $pengguna->nama;?>
                            </div>
                            <div class="panel-body">
                            <font color=#00796B>
                            Berikut ini mekanisme pendaftaran pelatihan:
                            <ol>
                                  <li>Calon peserta mengisi form pendaftaran pelatihan.</li>
                                  <li>Calon peserta melakukan konfirmasi pembayaran.</li>
                                  <li>Calon peserta mendapat konfirmasi dari email atau telegram.</li>
                                  <li>Calon peserta dapat login ke sistem.</li>
                                  <li>Calon peserta mencetak bukti pendaftaran.</li>
                            </font>
                            </div>
                            </div>
                            </div>
                    </div>
