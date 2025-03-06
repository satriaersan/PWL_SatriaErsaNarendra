<!DOCTYPE html>
<html>
    <head>
        <title>Add Book</title>
    </head>
    <body>
        <h1>Add Book</h1>{{---form digunakan menambahkan buku ke book store--}}
        
        <form action="{{ route('books.store')}}" method="POST">
            @csrf
            {{--digunakan mengisi sesuai form--}}
            <label for="judul">Judul:</label>
            <input type="text" name="judul" required>
            <br>
            <label for="penulis">penulis:</label>
            <input type="text" name="penulis" required>
            <br>
            <label for="penerbit">penerbit:</label>
            <input type="text" name="penerbit" required>
            <br>
            <label for="jumlah">jumlah:</label>
            <input type="number" name="jumlah" required>
            <br>
            <button type="submit"Add book>Add Book</button>
        </form>
        <a href="{{ route('books.index') }}">Back to list</a>
    </body>
</html>