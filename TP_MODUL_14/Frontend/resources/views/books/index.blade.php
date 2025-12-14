<!DOCTYPE html>
<html>
<head>
    <title>CRUD Film</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            padding: 40px;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            max-width: 900px;
            margin: auto;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        h2 {
            margin-bottom: 10px;
        }
        form input, form textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }
        button {
            padding: 8px 14px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-add {
            background: #3498db;
            color: #fff;
        }
        .btn-edit {
            background: #f39c12;
            color: #fff;
            text-decoration: none;
            padding: 6px 10px;
            border-radius: 4px;
        }
        .btn-delete {
            background: #e74c3c;
            color: #fff;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        table th {
            background: #f1f1f1;
        }
        .actions form {
            display: inline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Tambah Film</h2>
    <form action="/books" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nama Film" required>
        <textarea name="description" placeholder="Deskripsi"></textarea>
        <input type="date" name="release_date">
        <input type="number" step="0.1" name="rating" placeholder="Rating">
        <button class="btn-add" type="submit">Tambah Film</button>
    </form>

    <h2>Daftar Film</h2>
    <table>
        <tr>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Rilis</th>
            <th>Rating</th>
            <th>Aksi</th>
        </tr>
        @foreach($books as $book)
        <tr>
            <td>{{ $book['name'] }}</td>
            <td>{{ $book['description'] }}</td>
            <td>{{ \Carbon\Carbon::parse($book['release_date'])->format('d-m-Y') }}</td>
            <td>{{ $book['rating'] }}</td>
            <td class="actions">
                <a class="btn-edit" href="/books/{{ $book['id'] }}/edit">Edit</a>
                <form action="/books/{{ $book['id'] }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn-delete" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

</body>
</html>
