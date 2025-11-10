<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tugas PHP Dasar</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>Form Input Data</h2>
            <form method="post" class="data-form">
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama" required>
                </div>

                <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir:</label>
                    <input type="date" id="tgl_lahir" name="tgl_lahir" required>
                </div>

                <div class="form-group">
                    <label for="pekerjaan">Pekerjaan:</label>
                    <select id="pekerjaan" name="pekerjaan">
                        <option value="Programmer">Programmer</option>
                        <option value="Desainer">Desainer</option>
                        <option value="Guru">Guru</option>
                        <option value="Dokter">Dokter</option>
                    </select>
                </div>

                <button type="submit" class="btn-submit">Kirim Data</button>
            </form>
        </div>
    
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = $_POST['nama'];
            $tgl_lahir = $_POST['tgl_lahir'];
            $pekerjaan = $_POST['pekerjaan'];

            // Hitung umur
            $lahir = new DateTime($tgl_lahir);
            $hari_ini = new DateTime();
            $umur = $hari_ini->diff($lahir)->y;

            // Tentukan gaji berdasarkan pekerjaan
            switch ($pekerjaan) {
                case "Programmer": $gaji = 10000000; break;
                case "Desainer": $gaji = 8000000; break;
                case "Guru": $gaji = 7000000; break;
                case "Dokter": $gaji = 15000000; break;
                default: $gaji = 0; break;
            }

            // Tampilkan hasil di card yang berbeda
            echo '<div class="card result-card">';
            echo '<h3>Hasil Input:</h3>';
            echo '<div class="result-item"><strong>Nama:</strong> <span>' . htmlspecialchars($nama) . '</span></div>';
            echo '<div class="result-item"><strong>Tanggal Lahir:</strong> <span>' . htmlspecialchars($tgl_lahir) . '</span></div>';
            echo '<div class="result-item"><strong>Umur:</strong> <span>' . $umur . ' tahun</span></div>';
            echo '<div class="result-item"><strong>Pekerjaan:</strong> <span>' . htmlspecialchars($pekerjaan) . '</span></div>';
            echo '<div class="result-item"><strong>Gaji:</strong> <span class="gaji">Rp ' . number_format($gaji, 0, ',', '.') . '</span></div>';
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>