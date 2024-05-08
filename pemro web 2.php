<!DOCTYPE html>
<html>
<head>
    <title>Data Group B Piala Asia Qatar U-23</title>
</head>
<body>
    <h2>Input Klasemen Piala Asia U-23 Qatar Group B</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label>Nama Negara:</label>
        <select name="nama_negara">
            <option value="Korea Selatan U-23">Qatar U-23</option>
            <option value="Jepang U-23">Indonesia U-23</option>
            <option value="Tiongkok U-23">Australia U-23</option>
            <option value="Uni Emirat Arab U-23">Yordania U-23</option>
        </select><br><br>
        <label>Jumlah Pertandingan (P):</label>
        <input type="number" name="jumlah_pertandingan" min="0"><br><br>
        <label>Jumlah Menang (M):</label>
        <input type="number" name="jumlah_menang" min="0"><br><br>
        <label>Jumlah Seri (S):</label>
        <input type="number" name="jumlah_seri" min="0"><br><br>
        <label>Jumlah Kalah (K):</label>
        <input type="number" name="jumlah_kalah" min="0"><br><br>
        <label>Jumlah Poin:</label>
        <input type="number" name="jumlah_poin" min="0"><br><br>
        <label>Nama Operator:</label>
        <input type="text" name="nama_operator"><br><br>
        <label>NIM Mahasiswa:</label>
        <input type="text" name="nim_mahasiswa"><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil data dari form
        $nama_negara = $_POST['nama_negara'];
        $jumlah_pertandingan = $_POST['jumlah_pertandingan'];
        $jumlah_menang = $_POST['jumlah_menang'];
        $jumlah_seri = $_POST['jumlah_seri'];
        $jumlah_kalah = $_POST['jumlah_kalah'];
        $jumlah_poin = $_POST['jumlah_poin'];
        $nama_operator = $_POST['nama_operator'];
        $nim_mahasiswa = $_POST['nim_mahasiswa'];

        // Format data yang akan disimpan
        $data = "$nama_negara,$jumlah_pertandingan,$jumlah_menang,$jumlah_seri,$jumlah_kalah,$jumlah_poin,$nama_operator,$nim_mahasiswa\n";

        // Buka file db.html
        $file = fopen("db.html", "a");

        // Tulis data ke dalam file db.html
        fwrite($file, $data);

        // Tutup file
        fclose($file);

        echo "Data berhasil disimpan.";
    }
    ?>

<p>Data Group B Piala Asia Qatar U-23</p>
    <p>Per 07 Mei 2024 15:08:16 (Waktu dan Jam Sekarang)</p>
    <p>ARI PANDUWINATA/211011400778</p>

    <table border="1">
        <tr>
            <th>Negara</th>
            <th> (P)</th>
            <th>(M)</th>
            <th>(S)</th>
            <th>(K)</th>
            <th>Poin</th>
            <th>Nama Operator</th>
            <th>NIM Mahasiswa</th>
        </tr>
        <?php
        $lines = file('db.html');
        foreach ($lines as $line) {
            echo "<tr><td>" . implode("</td><td>", explode(",", $line)) . "</td></tr>";
        }
        ?>
    </table>

</body>
</html>