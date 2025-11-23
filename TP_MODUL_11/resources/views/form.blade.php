<!DOCTYPE html>
<html>
<head>
    <title>Form Input</title>
</head>
<body>
        <h2>Form Input Nama dan NIM</h2>
        <form action="{{ route('submit') }}" method="POST">
            @csrf

            <label>Nama:</label><br>
            <input type="text" name="nama" required><br><br>

            <label>NIM:</label><br>
            <input type="text" name="nim" required><br><br>

            <button type="submit">Kirim</button>
        </form>
</body>
</html>
