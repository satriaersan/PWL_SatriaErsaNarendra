<!DOCTYPE html>
<html>
    <head>
        <title>BOOK LIST</title>
    </head>
    <body>
        <h1>Books</h1>
        {{--menampilkan pesan success pada session--}}
        @if(session('session'))
            <p>{{ session('success') }}</p>
        @endif
        <a href="{{ route('books.create')}}">Add Book></a>
        <ul>
            @foreach ($books as $book)
            <li>{{--menampilkan data buku--}}
                {{ $book->judul }} - {{ $book->penulis }} - {{ $book->pengarang }} - {{ $book->jumlah }}
                <a href="{{ route('books.edit', $book) }}">>Edit</a>{{--tombol edit--}}
                <form action="{{ route('books.destroy', $book)}}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE') {{--tombol delete--}}
                    <button type="submit">Delete</button>
                </form>
            </li>
            @endforeach
        </ul>
    </body>
</html>