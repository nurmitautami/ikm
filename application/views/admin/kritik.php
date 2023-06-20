<div class="container-fluid">
                <div class="row">
                    <?php $cekbr = $this->db->get_where('tb_krisar',['krisar_status' => 0])->num_rows();
                     ?>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $title; ?> (<?php echo $cekbr; ?>)</h4>
                                <a href="admin/kritik-saran/kosongkan" class="btn mb-1 btn-warning" onclick="return confirm('Yakin tabel ini akan dikosongkan?');">Kosongkan Kritik Saran</a>
                                <div class="card-content">
                                    <?php foreach($kritik as $not): ?>
                                        <?php if($not['krisar_status'] == 0) { ?>
                                            <a href="admin/kritik-saran/baca/<?php echo $not['krisar_id']; ?>"><div class="alert alert-warning alert-dismissible fade show">
                                        <button class="close"><span aria-hidden="true">&times;</span>
                                        </button> <strong><?php echo $not['krisar_nama']; ?></strong> <?php echo $not['krisar_isi']; ?></div></a>
                                        <?php }else { ?>
                                            <div class="alert alert-secondary alert-dismissible fade show">
                                        <button class="close"><span aria-hidden="true">&check;</span>
                                        </button> <strong><?php echo $not['krisar_nama']; ?></strong> <?php echo $not['krisar_isi']; ?></div>
                                        <?php } ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>