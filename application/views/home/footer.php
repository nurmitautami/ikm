        <!-- App badge section-->
        <section class="bg-gradient-primary-to-secondary" id="download">
            <div class="container px-5">
                <h2 class="text-center text-white font-alt mb-4">Get the app now!</h2>
                <div class="d-flex flex-column flex-lg-row align-items-center justify-content-center">
                    <a class="me-lg-3 mb-4 mb-lg-0" href="#!"><img class="app-badge" src="wp-content/assets/img/google-play-badge.svg" alt="..." /></a>
                    <a href="#!"><img class="app-badge" src="wp-content/assets/img/app-store-badge.svg" alt="..." /></a>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="bg-black text-center py-5">
            <div class="container px-5">
                <div class="text-white-50 small">
                    <div class="mb-2">&copy; Aplikasi Indeks Kepuasan Masyarakat. All Rights Reserved.</div>
                    <a href="#!">Privacy</a>
                    <span class="mx-1">&middot;</span>
                    <a href="#!">Terms</a>
                    <span class="mx-1">&middot;</span>
                    <a href="#!">FAQ</a>
                </div>
            </div>
        </footer>
        <!-- Feedback Modal-->
        <div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-gradient-primary-to-secondary p-4">
                        <h5 class="modal-title font-alt text-white" id="feedbackModalLabel">Kritik & Saran</h5>
                        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body border-0 p-4">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form action="contactForm" method="post">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" name="nama" placeholder="Enter your name..." required />
                                <label for="name">Nama Lengkap</label>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email" name="email" placeholder="name@example.com" required,email />
                                <label for="email">Email</label>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" type="tel" name="telp" placeholder="(123) 456-7890" required />
                                <label for="phone">Nomor HP/WA</label>
                            </div>
                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" type="text" name="isi" placeholder="Enter your message here..." style="height: 10rem" required></textarea>
                                <label for="message">Kritik / Pesan</label>
                            </div>
                            <!-- Submit Button-->
                            <div class="d-grid"><button class="btn btn-primary rounded-pill btn-lg" type="submit">Kirim</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="wp-content/js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script src="assets/plugins/common/common.min.js"></script>
        <script src="assets/plugins/raphael/raphael.min.js"></script>
        <script src="assets/plugins/morris/morris.min.js"></script>
        <script>
            Morris.Donut({
                element: 'morris-donut',
                data: [{
                    label: " \xa0 \xa0 Sangat Memuaskan  \xa0 \xa0",
                    value: <?php echo $cekcl1; ?>,

                }, {
                    label: " \xa0 \xa0 \xa0 Memuaskan  \xa0 \xa0  \xa0",
                    value: <?php echo $cekcl2; ?>,
                }, {
                    label: " \xa0 \xa0 \xa0 Cukup Memuaskan  \xa0 \xa0 \xa0",
                    value: <?php echo $cekcl3; ?>,
                }, {
                    label: " \xa0 \xa0 \xa0 Tidak Memuaskan  \xa0 \xa0  \xa0",
                    value: <?php echo $cekcl4; ?>,
                }],
                resize: true,
                colors: ['#188BE6', '#8862E0', '#19D895', '#ff6600']
            });
            Morris.Donut({
                element: 'morris-donut2',
                data: [{
                    label: " \xa0 \xa0 Sangat Memuaskan  \xa0 \xa0",
                    value: <?php echo $cekcl1; ?>,

                }, {
                    label: " \xa0 \xa0 \xa0 Memuaskan  \xa0 \xa0  \xa0",
                    value: <?php echo $cekcl2; ?>,
                }, {
                    label: " \xa0 \xa0 \xa0 Cukup Memuaskan  \xa0 \xa0 \xa0",
                    value: <?php echo $cekcl3; ?>,
                }, {
                    label: " \xa0 \xa0 \xa0 Tidak Memuaskan  \xa0 \xa0  \xa0",
                    value: <?php echo $cekcl4; ?>,
                }],
                resize: true,
                colors: ['#188BE6', '#8862E0', '#19D895', '#ff6600']
            });
            Morris.Donut({
                element: 'morris-donut3',
                data: [{
                    label: " \xa0 \xa0 Sangat Memuaskan  \xa0 \xa0",
                    value: <?php echo $cekcl1; ?>,

                }, {
                    label: " \xa0 \xa0 \xa0 Memuaskan  \xa0 \xa0  \xa0",
                    value: <?php echo $cekcl2; ?>,
                }, {
                    label: " \xa0 \xa0 \xa0 Cukup Memuaskan  \xa0 \xa0 \xa0",
                    value: <?php echo $cekcl3; ?>,
                }, {
                    label: " \xa0 \xa0 \xa0 Tidak Memuaskan  \xa0 \xa0  \xa0",
                    value: <?php echo $cekcl4; ?>,
                }],
                resize: true,
                colors: ['#188BE6', '#8862E0', '#19D895', '#ff6600']
            });
        </script>
    </body>
</html>
