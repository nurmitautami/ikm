
        <!-- App features section-->
        <section id="features" class="mt-5">
            <div class="container px-5">
                <?php if($this->session->userdata('lembaga')) { ?>
                    <?php $cekindek = $this->db->get_where('tb_indeks',['indeks_id' => $soal['kuesioner_indeksid']])->row_array();
                     ?>
                     <?php $cekjmlindek = $this->db->get_where('tb_kuesioner',['kuesioner_indeksid' => $cekindek['indeks_id']])->num_rows();
                      ?>
                      <?php $ceksdh = $this->db->get_where('tb_hasil',['hasil_user' => $this->session->userdata('lembaga'),'hasil_indeks' => $soal['kuesioner_indeksid']])->num_rows();
                       ?>
                       <?php $isian = $ceksdh + 1; ?>
                    <h3 class="text-center">Indeks : <span class="text-success"><?php echo $cekindek['indeks_judul']; ?> - (<?php echo $isian; ?>/<?php echo $cekjmlindek; ?>)</span></h3>
                    <h5 class="text-center"><?php echo $soal['kuesioner_judul']; ?></h5>
                    <div class="row gx-5 align-items-center">
                        <div class="col-lg-12 order-lg-1 mb-5 mb-lg-0">
                            <div class="">
                                <div class="row gx-5">
                                    <?php foreach($emoji as $emo): ?>
                                        <div class="col-md-6 mb-5">
                                            <!-- Feature item-->
                                            <a href="next/<?php echo $soal['kuesioner_id']; ?>/<?php echo $emo['jawab_id']; ?>" style="text-decoration: none;"><div class="text-center">
                                                <i class="<?php echo $emo['jawab_emoji']; ?> icon-feature text-<?php echo $emo['jawab_type_text']; ?> d-block mb-3"></i>
                                                <h3 class="font-alt"><?php echo $emo['jawab_jenis']; ?></h3>
                                            </div></a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }else { ?>
                    <h3>Identitas Diri</h3>
                    <div class="row gx-5 align-items-center">
                        <div class="col-lg-12 order-lg-1 mb-5 mb-lg-0">
                            <div class="">
                                <form action="" method="post">
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama" value="<?php echo set_value('nama'); ?>" placeholder="" autofocus>
                                        <small class="text-danger"><?php echo form_error('nama'); ?></small>
                                    </div>  
                                    <div class="form-group mt-3">
                                        <label>Lembaga/Instansi</label>
                                        <input type="text" class="form-control" name="lembaga" value="<?php echo set_value('lembaga'); ?>" placeholder="">
                                        <small class="text-danger"><?php echo form_error('lembaga'); ?></small>

                                    </div>
                                    <div class="form-group mt-3">
                                        <label>Jenis Kelamin</label>
                                        <select name="jk" class="form-control">
                                            <option value="">-Pilih-</option>
                                            <option value="Laki-Laki" <?php echo set_select('jk','Laki-Laki'); ?>>Laki-Laki</option>
                                            <option value="Perempuan" <?php echo set_select('jk','Perempuan'); ?>>Perempuan</option>
                                        </select>
                                        <small class="text-danger"><?php echo form_error('jk'); ?></small>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label>Umur</label>
                                        <input type="number" min="18" max="120" class="form-control" name="umur" value="<?php echo set_value('umur'); ?>">
                                        <small class="text-danger"><?php echo form_error('umur'); ?></small>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label>Pendidikan</label>
                                        <select name="pendidikan" class="form-control">
                                            <option value="">-Pilih-</option>
                                            <option value="SD" <?php echo set_select('pendidikan','SD'); ?>>SD</option>
                                            <option value="SMP" <?php echo set_select('pendidikan','SMP'); ?>>SMP</option>
                                            <option value="SMA" <?php echo set_select('pendidikan','SMA'); ?>>SMA</option>
                                            <option value="D3" <?php echo set_select('pendidikan','D3'); ?>>D3</option>
                                            <option value="S1" <?php echo set_select('pendidikan','S1'); ?>>S1</option>
                                            <option value="S2" <?php echo set_select('pendidikan','S2'); ?>>S2</option>
                                            <option value="S3" <?php echo set_select('pendidikan','S3'); ?>>S3</option>
                                        </select>
                                        <small class="text-danger"><?php echo form_error('pendidikan'); ?></small>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label>Pekerjaan</label>
                                        <select name="pekerjaan" class="form-control">
                                            <option value="">-Pilih-</option>
                                            <option value="Pelajar/Mahasiswa" <?php echo set_select('pekerjaan','Pelajar/Mahasiswa'); ?>>Pelajar/Mahasiswa</option>
                                            <option value="Guru" <?php echo set_select('pekerjaan','Guru'); ?>>Guru</option>
                                            <option value="PNS" <?php echo set_select('pekerjaan','PNS'); ?>>PNS</option>
                                            <option value="TNI" <?php echo set_select('pekerjaan','TNI'); ?>>TNI</option>
                                            <option value="Polisi" <?php echo set_select('pekerjaan','Polisi'); ?>>Polisi</option>
                                            <option value="Dosen" <?php echo set_select('pekerjaan','Dosen'); ?>>Dosen</option>
                                            <option value="Pedagang" <?php echo set_select('pekerjaan','Pedagang'); ?>>Pedagang</option>
                                            <option value="Buruh" <?php echo set_select('pekerjaan','Buruh'); ?>>Buruh</option>
                                            <option value="Lainnya" <?php echo set_select('pekerjaan','Lainnya'); ?>>Lainnya</option>
                                        </select>
                                        <small class="text-danger"><?php echo form_error('pekerjaan'); ?></small>
                                    </div>
                                    <div class="form-group mt-3">
                                        <button type="submit" class="btn btn-primary">Lanjut <i class="bi bi-arrow-right me-2"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
        