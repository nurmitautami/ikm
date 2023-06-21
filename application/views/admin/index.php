

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-sm-6 col-lg-3">
                                    <div class="card-body card-widget">
                                        <div class="media">
                                            <span class="card-widget__icon text-primary"><i class="icon-globe-alt"></i></span>
                                            <div class="media-body">
                                                <h2 class="card-widget__title"><?php echo $cindeks; ?></h2>
                                                <h5 class="card-widget__subtitle">Indeks</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="col-sm-6 col-lg-3 border-left">
                                    <div class="card-body card-widget">
                                        <div class="media">
                                            <span class="card-widget__icon text-warning"><i class="icon-grid"></i></span>
                                            <div class="media-body">
                                                <h2 class="card-widget__title"><?php echo $ckuesio; ?></h2>
                                                <h5 class="card-widget__subtitle">Kuesioner</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="col-sm-6 col-lg-3 border-left">
                                    <div class="card-body card-widget">
                                        <div class="media">
                                            <span class="card-widget__icon text-success"><i class="icon-note"></i></span>
                                            <div class="media-body">
                                                <h2 class="card-widget__title"><?php echo $chasil; ?></h2>
                                                <h5 class="card-widget__subtitle">Jawaban</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="col-sm-6 col-lg-3 border-left">
                                    <div class="card-body card-widget">
                                        <div class="media">
                                            <span class="card-widget__icon text-info"><i class="icon-user"></i></span>
                                            <div class="media-body">
                                                <h2 class="card-widget__title"><?php echo $crespon; ?></h2>
                                                <h5 class="card-widget__subtitle">Responden</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Berdasarkan Jawaban</h4>
                                <canvas id="donutChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Grafik Jawaban Kuesioner Harian</h4>
                                <canvas id="bychart" width="650" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Hasil Berdasarkan Indeks</h4>
                                <canvas id="grafik"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Responden Menurut Pendidikan</h4>
                                <div id="morris-bypdk"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Responden Menurut Pekerjaan</h4>
                                <div id="morris-byjob"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Pengunjung Berdasarkan Browser</h4>
                                <div id="morris-browser"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Pengujung Berdasarkan Sistem Operasi</h4>
                                <div id="morris-os"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="active-member">
                                    <div class="table-responsive">
                                        <table class="table table-xs">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Lembaga/Instansi</th>
                                                    <th>Usia</th>
                                                    <th>Pendidikan</th>
                                                    <th>Pekerjaan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($darespon as $dares): ?>
                                                <tr>
                                                    <td><?php echo $dares['respo_nama']; ?></td>
                                                    <td><span><?php echo $dares['respo_lembaga']; ?></span>
                                                    </td>
                                                    <td><?php echo $dares['respo_usia']; ?> Th</td>
                                                    <td><?php echo $dares['respo_pendidikan']; ?></td>
                                                    <td><span><?php echo $dares['respo_pekerjaan']; ?></span>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="active-member">
                                    <div class="table-responsive">
                                        <table class="table table-xs">
                                            <thead>
                                                <tr>
                                                    <th>Kuesioner</th>
                                                    <th>Jawaban</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($hasilres as $hr): ?>
                                                    <?php $cekkues = $this->db->get_where('tb_kuesioner',['kuesioner_id' => $hr['hasil_kuesioner']])->row_array();
                                                     ?>
                                                     <?php $cekjaw = $this->db->get_where('tb_jawaban',['jawab_id' => $hr['hasil_jawaban']])->row_array();
                                                     ?>
                                                <tr>
                                                    <td><?php echo $cekkues['kuesioner_judul']; ?></td>
                                                    <td><?php echo $cekjaw['jawab_jenis']; ?></td>
                                                </tr>
                                                <?php endforeach; ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        