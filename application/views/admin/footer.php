<div class="footer">
            <div class="copyright">
                <p>Copyright &copy; <?php echo date('Y') ?></p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="assets/plugins/common/common.min.js"></script>
    <script src="assets/js/custom.min.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/gleek.js"></script>
    <script src="assets/js/styleSwitcher.js"></script>

    <script src="assets/plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="assets/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

    <script src="assets/plugins/chart.js/Chart.bundle.min.js"></script>
    <script src="assets/plugins/raphael/raphael.min.js"></script>
    <script src="assets/plugins/morris/morris.min.js"></script>
    <script src="assets/plugins/weather/js/jquery.simpleWeather.min.js"></script>
    <script src="assets/plugins/weather/js/weather-init.js"></script>
    <script src="assets/js/dashboard/dashboard-2.js"></script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <script>
        Morris.Donut({
            element: 'morris-byjob',
            data: <?php echo $topbyjob;?>,
            resize: true,
            colors: ['#98049b', '#ffd700', '#1afc3f', '#f4a5c4','#23ba9f','#a6cb62','#27f4a5','#7cc2df','#23a04b']
        });
        Morris.Donut({
            element: 'morris-bypdk',
            data: <?php echo $topbypdk;?>,
            resize: true,
            colors: ['#1afc3f', '#f4a5c4','#23ba9f','#a6cb62','#27f4a5','#7cc2df','#23a04b']
        });
        Morris.Donut({
            element: 'morris-browser',
            data: <?php echo $logbybrowser;?>,
            resize: true,
            colors: ['#6c51ab','#e1101a','#a4519a','#7cc2df','#23a04b']
        });
        Morris.Donut({
            element: 'morris-os',
            data: <?php echo $logbyos;?>,
            resize: true,
            colors: ['#6ff6d4','#7f2941','#ff69b4','#7cc2df','#23a04b','#2aa7a1','#ffd700']
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var grafikData = <?php echo json_encode($grafik_data); ?>;
            var labels = [];
            var datasets = {};

            grafikData.forEach(function(data) {
                var indeksJudul = data.indeks_judul;
                var jawabJenis = data.jawab_jenis;
                var total = parseInt(data.total);

                if (!labels.includes(indeksJudul)) {
                    labels.push(indeksJudul);
                }

                if (!datasets[jawabJenis]) {
                    datasets[jawabJenis] = Array(labels.length - 1).fill(0);
                }

                datasets[jawabJenis].push(total);
            });

            var datasetsArr = [];

            for (var key in datasets) {
                if (datasets.hasOwnProperty(key)) {
                    datasetsArr.push({
                        label: key,
                        data: datasets[key]
                    });
                }
            }

            var ctx = document.getElementById("grafik").getContext("2d");

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: datasetsArr
                },
                options: {
                    scales: {
                        x: {
                            stacked: true
                        },
                        y: {
                            stacked: true
                        }
                    }
                }
            });
        });
    </script>
    <script>
        // Mendapatkan data jawaban dari tabel hasil
        var dataJawaban = <?php echo json_encode($data_jawaban); ?>;

        // Menyiapkan array untuk label dan data
        var labels = [];
        var data = [];

        // Mengisi label dan data dengan hasil dari tabel hasil
        dataJawaban.forEach(function(jawaban) {
            labels.push(jawaban.jawab_jenis);
            data.push(jawaban.total);
        });

        // Membuat grafik tipe donat menggunakan Chart.js
        var donutChart = new Chart(document.getElementById('donutChart'), {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Jawaban',
                    data: data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false
            }
        });
    </script>
    <script>
        var chartData = <?php echo json_encode($chart_data); ?>;

        var labels = [];
        var datasets = [];

        // Menyusun data berdasarkan jawaban
        for (var i = 0; i < chartData.length; i++) {
            var data = chartData[i];
            if (!labels.includes(data.tanggal)) {
                labels.push(data.tanggal);
            }

            var datasetIndex = datasets.findIndex(function(dataset) {
                return dataset.label === data.jawab_jenis;
            });

            if (datasetIndex !== -1) {
                datasets[datasetIndex].data.push(data.total);
            } else {
                var color = getRandomColor(); // Mendapatkan warna acak
                datasets.push({
                    label: data.jawab_jenis,
                    data: [data.total],
                    backgroundColor: color,
                    borderColor: color,
                    borderWidth: 1
                });
            }
        }

        var ctx = document.getElementById('bychart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: datasets
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
            }
        });

        // Fungsi untuk mendapatkan warna acak
        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
    </script>

</body>


</html>