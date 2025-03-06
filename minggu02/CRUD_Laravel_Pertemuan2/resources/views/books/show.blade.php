<!DOCTYPE html>
<html>
<head>
    <title>Book Detail</title>
</head>
<body> {{--detail buku--}}
    <h1>Detail Book</h1>
    <p><strong>Judul:</strong> {{ $book->judul }}</p>
    <p><strong>penulis:</strong> {{ $book->penulis }}</p>
    <p><strong>Penerbit:</strong> {{ $book->penerbit }}</p>
    <p><strong>Jumlah:</strong> {{ $book->jumlah_halaman }}</p>
    {{--kemabli ke books index--}}
    <a href="{{ route('books.index') }}">Back to List</a>
</body>
</html>