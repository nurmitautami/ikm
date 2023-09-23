<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Survei</title>
    <!-- Add your CSS and JavaScript links here -->
</head>
<body>
    <section id="features">
        <div class="container px-6">
            <header class="text-center  margin-top: 20px;">
                <br>
                <br>
                <br>
                <h4>Hasil Survei Sistem Kepuasan Masyarakat Biro Perencanaan dan Hubungan Masyarakat Unila</h4>
            </header>
</div>

<div class="container px-2 text-center">
    <div class="row gx-2 justify-content-center">
        <div class="col-md-2">
            <form method="get" action="<?= base_url('home/hasil') ?>" class="form-inline">
                <div class="form-group">
                    <label for="tahun" class="mr-2">Filter Tahun:</label>
                    <select id="tahun" name="tahun" class="form-control mr-2">
                        <option value="">Pilih Tahun</option>
                        <?php foreach ($tahun_list as $tahun_item): ?>
                            <option value="<?php echo $tahun_item; ?>"><?php echo $tahun_item; ?></option>
                        <?php endforeach; ?>
                    </select>
                    </div>
        </div>
        <div class="col-md-1">
            <div class="text-right">
                <br>
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
            </form>
        </div>
    </div>
</div>



<div class="container px-6 text-center">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-12 order-lg-1 mb-5 mb-lg-0">
                    <div class="container-fluid px-5">
                        <div class="row gx-5">
                        
<!-- Feature items for INDEKS total -->
<?php
$indeksData = array();
$i = 1;
$judulIndeks = [
    "Indeks Waktu",
    "Indeks Sarana dan Prasarana",
    "Indeks Kesesuaian",
    "Indeks Sistem Mekanisme dan Prosedur",
    "Indeks Kompetensi Pelaksana",
    "Indeks Persyaratan"
];

foreach ($grafik_data as $data) {
    $total = intval($data->total);
    $indeksJudul = $data->indeks_judul;
    $jawabJenis = $data->jawab_jenis; // Ambil jenis jawaban dari data

    // Set kata-kata berdasarkan jenis jawaban
    if ($jawabJenis === "Sangat Puas") {
        $keterangan = "Sangat Puas";
        $emoji = "😍";
    } elseif ($jawabJenis === "Puas") {
        $keterangan = "Memuaskan";
        $emoji = "😊";
    } elseif ($jawabJenis === "Cukup Puas") {
        $keterangan = "Cukup Puas";
        $emoji = "😐";
    } elseif ($jawabJenis === "Tidak Puas") {
        $keterangan = "Tidak Puas";
        $emoji = "😡";
    } else {
        $keterangan = "Tidak Diketahui"; // Atur keterangan default jika tidak sesuai
        $emoji = "❓"; // Emoji default
    }

    // Simpan data indeks dalam array
    $indeksData[$indeksJudul][] = [
        'keterangan' => $keterangan,
        'emoji' => $emoji,
        'total' => $total,
    ];
}

// Loop melalui data indeks dan tampilkan
foreach ($indeksData as $indeksJudul => $dataIndeks) {
    foreach ($dataIndeks as $data) {
        $keterangan = $data['keterangan'];
        $emoji = $data['emoji'];
        $total = $data['total'];

        if ($i % 4 === 1) {
            $judulIndeksIndex = ($i - 1) / 4;
            echo '<div class="col-md-12"><br><br><hr><h5 class="text-center">' .  $judulIndeks[$judulIndeksIndex] . '</h5><hr></div>';
        }
?>

        <div class="col-md-6 mb-5">
            <div class="text-center">
                <!-- Menampilkan emoji berdasarkan jenis jawaban -->
                <?php if ($emoji === "😍") { ?>
                    <i class="bi bi-emoji-heart-eyes-fill icon-feature text-gradient d-block mb-3"></i>
                <?php } elseif ($emoji === "😊") { ?>
                    <i class="bi bi-emoji-smile-fill icon-feature text-gradient d-block mb-3"></i>
                <?php } elseif ($emoji === "😐") { ?>
                    <i class="bi bi-emoji-neutral-fill icon-feature text-gradient d-block mb-3"></i>
                <?php } elseif ($emoji === "😡") { ?>
                    <i class="bi bi-emoji-angry-fill icon-feature text-gradient d-block mb-3"></i>
                <?php } else { ?>
                    <i class="bi bi-emoji-question-fill icon-feature text-gradient d-block mb-3"></i>
                <?php } ?>
                <!-- Menambahkan kata-kata di sekitar judul indeks -->
                <h3 class="font-alt"><?php echo $keterangan . " "  ?></h3>
                <h6 class="text-muted mb-0">Total: <?php echo $total; ?></h6>
            </div>
        </div>
<?php
$i++;
    }
}
?>




                            <!-- ... Bagian lainnya untuk indeks lainnya ... -->

                        </div>
                    </div>
                </div>

        <!-- ... Konten setelahnya ... -->

    </section>
</body>
</html>

                    </div>
                </div>
            </div>
            
                
                <!-- Features section device mockup -->
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
                    datasets[jawabJenis] = Array(labels.length).fill(0); // Ubah ke fill(0) agar sesuai
                }

                datasets[jawabJenis][labels.indexOf(indeksJudul)] = total; // Sesuaikan indeks data dengan label
            });

            var datasetsArr = Object.keys(datasets).map(function(key) {
                return {
                    label: key,
                    data: datasets[key]
                };
            });

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
function filterTahun() {
    var selectedYear = document.getElementById("tahun").value;
    var indeksData = <?php echo json_encode($indeksData); ?>; // Data indeks dari PHP

    // Filter data indeks berdasarkan tahun yang dipilih
    var filteredData = indeksData.filter(function(data) {
        return data.hasil_tgl.startsWith(selectedYear);
    });

    // Perbarui tampilan dengan data yang sudah difilter
    updateTampilan(filteredData);
}

function updateTampilan(data) {
    var indeksDataContainer = document.getElementById("indeksDataContainer");
    indeksDataContainer.innerHTML = ""; // Hapus data sebelumnya

    data.forEach(function(data) {
        // Buat elemen HTML untuk setiap data
        var indeksElement = document.createElement("div");
        indeksElement.className = "col-md-6 mb-5";
        indeksElement.innerHTML = `
            <div class="text-center">
                <!-- Menampilkan emoji berdasarkan jenis jawaban -->
                ${getEmoji(data.jawab_jenis)}
                <!-- Menambahkan kata-kata di sekitar judul indeks -->
                <h3 class="font-alt">${data.keterangan}</h3>
                <h6 class="text-muted mb-0">Total: ${data.total}</h6>
            </div>
        `;

        indeksDataContainer.appendChild(indeksElement);
    });
}

// Fungsi getEmoji() untuk mendapatkan emoji berdasarkan jenis jawaban
function getEmoji(jawabJenis) {
    switch (jawabJenis) {
        case "Sangat Puas":
            return '<i class="bi bi-emoji-heart-eyes-fill icon-feature text-gradient d-block mb-3"></i>';
        case "Puas":
            return '<i class="bi bi-emoji-smile-fill icon-feature text-gradient d-block mb-3"></i>';
        case "Cukup Puas":
            return '<i class="bi bi-emoji-neutral-fill icon-feature text-gradient d-block mb-3"></i>';
        case "Tidak Puas":
            return '<i class="bi bi-emoji-angry-fill icon-feature text-gradient d-block mb-3"></i>';
        default:
            return '<i class="bi bi-emoji-question-fill icon-feature text-gradient d-block mb-3"></i>';
    }
}

// Inisialisasi tampilan saat halaman pertama kali dimuat
filterTahun();
</script>
            </div>
        </div>
    </div>
</section>