<!DOCTYPE html>
<html>
    <head>
        <title>Edit book</title>
    </head>
    <body>
        {{--digunakan untuk edit buku--}}
        <h1> Edit Book</h1>
        <form action="{{ route('books.update', $book) }}" method="POST">
            @csrf
            @method('PUT')
            {{--mengisi sesuai kolom data--}}
            <label for="judul">judul:</label>
            <input type="text" name="judul" value="{{ $book->judul}}" required>
            <br>
            <label for="penulis">penulis:</label>
            <input type="text" name="penulis" value="{{ $book->penulis}}" required>
            <br>
            <label for="penerbit">penerbit:</label>
            <input type="text" name="penerbit" value="{{ $book->penerbit}}" required>
            <br>
            <label for="jumlah">jumlah:</label>
            <input type="number" name="jumlah" value="{{ $book->jumlah}}" required>
            <br>
            <button type="submit">Update book</button>
        </form>
        {{--kembali ke books index--}}
        <a href="{{ route('books.index')}}">Back to list</a>
    </body>
</html>