<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Konversi Nilai</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Program Konversi Nilai</h1>

        <?php if (session()->has('validation')): ?>
        <div class="alert alert-danger">
            <?= \Config\Services::validation()->listErrors(); ?>
        </div>
        <?php endif; ?>

        <form action="<?= base_url('konversi-nilai/konversi') ?>" method="post">
            <div class="form-group">
                <label for="partisipasi">Nilai Partisipasi:</label>
                <input type="text" name="partisipasi" class="form-control" required value="<?= old('partisipasi') ?>">
            </div>

            <div class="form-group">
                <label for="tugas">Nilai Tugas:</label>
                <input type="text" name="tugas" class="form-control" required value="<?= old('tugas') ?>">
            </div>

            <div class="form-group">
                <label for="uts">Nilai UTS:</label>
                <input type="text" name="uts" class="form-control" required value="<?= old('uts') ?>">
            </div>

            <div class="form-group">
                <label for="uas">Nilai UAS:</label>
                <input type="text" name="uas" class="form-control" required value="<?= old('uas') ?>">
            </div>

            <button type="submit" class="btn btn-primary">Hitung Nilai</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>