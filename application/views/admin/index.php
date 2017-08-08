                 <div id="page-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            Dashboard <small></small>
                        </h2>
                    </div>
                </div>
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-green">
                            <div class="panel-body">
                                <i class="fa fa-bar-chart-o fa-5x"></i>
                                <h3><?php echo $kursus->jumlah_kursus?></h3>
                            </div>
                            <div class="panel-footer back-footer-green">
                                <a style="color:white" href="<?php echo base_url();?>admin/welcome/tambah_data">Tambah Kursus</a>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-red">
                            <div class="panel-body">
                                <i class="fa fa fa-comments fa-5x"></i>
                                <h3><?php echo $peserta->jumlah_peserta?></h3>
                            </div>
                            <div class="panel-footer back-footer-red">
                              <a style="color:white" href="<?php echo base_url();?>admin/welcome/peserta">Pendaftar Pelatihan</a>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa fa-users fa-5x"></i>
                                <h3><?php echo $peserta->total_peserta?></h3>
                            </div>
                            <div class="panel-footer back-footer-blue">
                              Total Peserta

                            </div>
                        </div>
                    </div>

                </div>
