<div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $title; ?></h4>
                                <a href="admin/laporan/responden/print" target="_blank" class="btn mb-1 btn-primary">Print</a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tgl</th>
                                                <th>Nama</th>
                                                <th>Nomor Telepon</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Usia</th>
                                                <th>Pekerjaan</th>
                                                <th>Pendidikan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach($responden as $resp): ?>
                                            <tr>
                                                <td><?php echo $i; ?>.</td>
                                                <td><?php echo date('d/m/Y', strtotime($resp['respo_created'])); ?></td>
                                                <td><?php echo $resp['respo_nama']; ?></td>
                                                <td><?php echo $resp['respo_notelp']; ?></td>
                                                <td><?php echo $resp['respo_jk']; ?></td>
                                                <td><?php echo $resp['respo_usia']; ?> Tahun</td>
                                                <td><?php echo $resp['respo_pekerjaan']; ?></td>
                                                <td><?php echo $resp['respo_pendidikan']; ?></td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
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
        