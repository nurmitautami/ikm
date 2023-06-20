<div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $title; ?></h4>
                                <a href="admin/kuesioner/new" class="btn mb-1 btn-primary">New Data</a>
                                <a href="admin/kuesioner/kosongkan" class="btn mb-1 btn-warning" onclick="return confirm('Yakin tabel ini akan dikosongkan?');">Kosongkan Tabel</a>
                                <?php if($this->session->flashdata('flash')): ?>
                                    <div class="alert alert-success"><strong><i class="fa fa-check-circle"></i></strong> <?php echo $this->session->flashdata('flash'); ?></div>
                                <?php endif; ?>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Indeks</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach($kuesioner as $kue): ?>
                                                <?php $cek = $this->db->get_where('tb_indeks',['indeks_id' => $kue['kuesioner_indeksid']])->row_array();
                                                 ?>
                                            <tr>
                                                <td><?php echo $i; ?>.</td>
                                                <td><?php echo $kue['kuesioner_judul']; ?></td>
                                                <td><?php echo $cek['indeks_judul']; ?></td>
                                                <td>
                                                    <a href="admin/kuesioner/edit/<?php echo $kue['kuesioner_id']; ?>" class="btn mb-1 btn-info"><i class="fa fa-pencil"></i></a>
                                                    <a href="admin/kuesioner/hapus/<?php echo $kue['kuesioner_id']; ?>" onclick="return confirm('Yakin data ini akan dihapus?');" class="btn mb-1 btn-danger"><i class="fa fa-trash"></i></a>
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
        