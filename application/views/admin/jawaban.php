<div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $title; ?></h4>
                                <a href="admin/jawaban/new" class="btn mb-1 btn-primary">New Data</a>
                                <?php if($this->session->flashdata('flash')): ?>
                                    <div class="alert alert-success"><strong><i class="fa fa-check-circle"></i></strong> <?php echo $this->session->flashdata('flash'); ?></div>
                                <?php endif; ?>
                                <?php if($this->session->flashdata('error')): ?>
                                    <div class="alert alert-danger"><strong><i class="fa fa-times-circle"></i></strong> <?php echo $this->session->flashdata('error'); ?></div>
                                <?php endif; ?>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Jenis</th>
                                                <th>Emoji</th>
                                                <th>Warna Teks</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach($jawab as $jwb): ?>
                                            <tr>
                                                <td><?php echo $i; ?>.</td>
                                                <td><?php echo $jwb['jawab_jenis']; ?></td>
                                                <td><?php echo $jwb['jawab_emoji']; ?></td>
                                                <td><?php echo $jwb['jawab_type_text']; ?></td>
                                                <td>
                                                    <a href="admin/jawaban/edit/<?php echo $jwb['jawab_id']; ?>" class="btn mb-1 btn-info"><i class="fa fa-pencil"></i></a>
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
        