
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Identitas Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            margin: 0;
            padding: 30px 15px;
        }

        .container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 12px #00000015;
        }

        h2 {
            text-align: center;
            color: #1e293b;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 6px;
        }

        input, select, button {
            width: 100%;
            padding: 11px;
            box-sizing: border-box;
            border-radius: 5px;
            font-size: 15px;
        }

        input, select {
            border: 1px solid #cbd5e1;
        }

        button {
            margin-top: 20px;
            background: #1e3a5f;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background: #294f7a;
        }

        .hasil {
            margin-top: 22px;
            padding: 15px;
            background: #eff6ff;
            border-radius: 6px;
        }

        .pesan {
            color: #b91c1c;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Formulir Identitas Siswa</h2>

    <form method="post">
        <label for="nama">Nama Siswa</label>
        <input
            type="text"
            id="nama"
            name="nama"
            required
        >

        <label for="kelas">Kelas</label>
        <input
            type="text"
            id="kelas"
            name="kelas"
            required
        >

        <label for="jurusan">Jurusan</label>
        <select id="jurusan" name="jurusan" required>
            <option value="">-- Pilih Jurusan --</option>
            <option value="RPL">Rekayasa Perangkat Lunak</option>
            <option value="TKJ">Teknik Komputer dan Jaringan</option>
            <option value="DKV">Desain Komunikasi Visual</option>
        </select>

        <button type="submit">Kirim Data</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nama = trim($_POST["nama"] ?? "");
        $kelas = trim($_POST["kelas"] ?? "");
        $jurusan = $_POST["jurusan"] ?? "";

        $jurusanValid = [
            "RPL" => "Rekayasa Perangkat Lunak",
            "TKJ" => "Teknik Komputer dan Jaringan",
            "DKV" => "Desain Komunikasi Visual"
        ];

        if ($nama === "" || $kelas === "" || $jurusan === "") {
            echo '<p class="pesan">Semua data wajib diisi.</p>';
        } elseif (!array_key_exists($jurusan, $jurusanValid)) {
            echo '<p class="pesan">Pilihan jurusan tidak valid.</p>';
        } else {
            echo '<div class="hasil">';
            echo '<h3>Data Berhasil Dikirim</h3>';

            echo '<p>Nama: ' .
                htmlspecialchars($nama, ENT_QUOTES, "UTF-8") .
                '</p>';

            echo '<p>Kelas: ' .
                htmlspecialchars($kelas, ENT_QUOTES, "UTF-8") .
                '</p>';

            echo '<p>Jurusan: ' .
                htmlspecialchars($jurusanValid[$jurusan], ENT_QUOTES, "UTF-8") .
                '</p>';

            echo '</div>';
        }
    }
    ?>
</div>

</body>
</html>
