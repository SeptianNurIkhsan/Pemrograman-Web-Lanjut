<?php
require 'nilaiConverter.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validasi input
    $partisipasi = $_POST['partisipasi'] ?? '';
    $tugas = $_POST['tugas'] ?? '';
    $uts = $_POST['uts'] ?? '';
    $uas = $_POST['uas'] ?? '';

    if (!is_numeric($partisipasi) || !is_numeric($tugas) || !is_numeric($uts) || !is_numeric($uas)) {
        echo 'Masukkan nilai dalam bentuk angka.';
        exit;
    }

    // Range nilai 0 - 100
    if ($partisipasi < 0 || $partisipasi > 100 || $tugas < 0 || $tugas > 100 || $uts < 0 || $uts > 100 || $uas < 0 || $uas > 100) {
        echo 'Masukkan nilai antara 0 - 100.';
        exit;
    }

    $converter = new NilaiConverter($partisipasi, $tugas, $uts, $uas);
    $nilaiAkhir = $converter->hitungNilaiAkhir();
    $nilaiHuruf = $converter->konversiNilaiHuruf();

    echo '<div class="result show">';
    echo "<span id='nilai-akhir'>Nilai Akhir: $nilaiAkhir</span>";
    echo "<span id='nilai-huruf'>Nilai Huruf: $nilaiHuruf</span>";
    echo '</div>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konversi Nilai</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
    body {
        background-color: #f8f9fa;
        padding: 20px;
    }

    .container {
        max-width: 600px;
        margin: auto;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-top: 50px;
    }

    h2 {
        text-align: center;
        color: #007bff;
    }

    label {
        font-weight: bold;
        margin-top: 10px;
    }

    input {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        margin-bottom: 15px;
        box-sizing: border-box;
    }

    button {
        background-color: #007bff;
        color: #ffffff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }

    .result {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        opacity: 0;
        transition: opacity 0.5s ease;
    }

    .result.show {
        opacity: 1;
    }

    .result span {
        display: block;
        margin-top: 10px;
        font-size: 18px;
        color: #28a745;
        transition: color 0.3s ease;
    }

    .result:hover span {
        color: #218838;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>Program Konversi Nilai</h2>
        <div class="container">
            <form method="post" action="">
                <label for="partisipasi">Nilai Partisipasi:</label>
                <input type="text" name="partisipasi" required><br>

                <label for="tugas">Nilai Tugas:</label>
                <input type="text" name="tugas" required><br>

                <label for="uts">Nilai UTS:</label>
                <input type="text" name="uts" required><br>

                <label for="uas">Nilai UAS:</label>
                <input type="text" name="uas" required><br>

                <button type="submit">Hitung Nilai</button>
            </form>
            <div class="result">
                <span id="nilai-akhir"></span>
                <span id="nilai-huruf"></span>
            </div>
        </div>
    </div>
</body>

</html>