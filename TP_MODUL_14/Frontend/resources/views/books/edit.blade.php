<!DOCTYPE html>
<html>
<head>
    <title>Edit Film</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f6f8;
            padding: 40px;
        }
        .container {
            background: white;
            padding: 20px;
            max-width: 600px;
            margin: auto;
            border-radius: 8px;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }
        button {
            padding: 8px 14px;
            background: #27ae60;
            color: white;
            border: none;
            border-radius: 4px;
        }
        a {
            display: inline-block;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Film</h2>
    <form action="/books/{{ $book['id'] }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="name" value="{{ $book['name'] }}">
        <textarea name="description">{{ $book['description'] }}</textarea>
        <input type="date" name="release_date" value="{{ $book['release_date'] }}">
        <input type="number" step="0.1" name="rating" value="{{ $book['rating'] }}">

        <button type="submit">Update</button>
    </form>

    <a href="/">← Kembali</a>
</div>

</body>
</html>
