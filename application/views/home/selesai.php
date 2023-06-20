
        <!-- App features section-->
        <section id="features" class="mt-5">
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-12 order-lg-1 mb-5 mb-lg-0">
                        <div class="">
                            <div class="col-md-auto mb-5">
                                <div class="text-center">
                                    <i class="bi bi-check-circle icon-feature text-gradient d-block mb-3"></i>
                                    <?php if($this->uri->segment(1) == 'selesai') { ?>
                                        <h3 class="font-alt">Terima kasih atas penilaian Anda</h3>
                                    <?php }else { ?>
                                        <h3 class="font-alt">Kritik dan saran Anda sudah terkirim. Terima kasih.</h3>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        