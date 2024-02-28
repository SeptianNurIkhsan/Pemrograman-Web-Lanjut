<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konversi Nilai</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <form action="{{ route('convert') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="partisipasi">Nilai Partisipasi:</label>
                <input type="number" step="0.01" name="partisipasi" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="tugas">Nilai Tugas:</label>
                <input type="number" step="0.01" name="tugas" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="uts">Nilai UTS:</label>
                <input type="number" step="0.01" name="uts" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="uas">Nilai UAS:</label>
                <input type="number" step="0.01" name="uas" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Hitung Nilai</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
