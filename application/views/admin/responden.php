<div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $title; ?></h4>
                                <?php if($this->session->flashdata('flash')): ?>
                                <div id="notification" class="alert alert-success"><strong><i class="fa fa-check-circle"></i></strong> <?php echo $this->session->flashdata('flash'); ?></div>
                                <?php $this->session->set_flashdata('flash', null); // Menghapus flash data ?>
                                <script>
                                    // Menghilangkan notifikasi setelah beberapa waktu
                                    setTimeout(function() {
                                        var notification = document.getElementById('notification');
                                        if (notification) {
                                            notification.style.display = 'none';
                                        }
                                    }, 5000);
                                </script>
                             <?php endif; ?>
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
                                                <th>Opsi</th>
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
                                                <td>
                                                    <a href="admin/responden/lihat/<?php echo $resp['respo_id']; ?>" class="btn mb-1 btn-info"><i class="fa fa-search"></i></a>
                                                    <a href="admin/responden/hapus/<?php echo $resp['respo_id']; ?>" onclick="return confirm('Yakin data ini akan dihapus?');" class="btn mb-1 btn-danger"><i class="fa fa-trash"></i></a>
                                                </td>
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
        