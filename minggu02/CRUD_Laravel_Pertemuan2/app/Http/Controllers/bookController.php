<?php

namespace App\Http\Controllers;

use App\Models\book;
use Illuminate\Http\Request;

class bookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   //mwngambil seluruh data database book
        $books = book::all();
        return view('books.index', compact('books'));
    }

    /**
     * menampilkan form
     */
    public function create()
    {   //melukan view untuk membuat form buku baru
        return view('books.create');
    }

    /**
     *  //input validasi
     * //isi form sesuai database
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'jumlah' => 'required',
        ]);
        //arah ke index dengan pesan yang tertera pada code
        book::create($request->only(['judul', 'penulis', 'penerbit', 'jumlah']));
        return redirect()->route('books.index')->with('success', 'book updated succesfully.');
    }

    /**
     * menampilkan detail satu buku                                                         
     */
    public function show(book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * menampilkan form untuk melakukan pengeditan
     */
    public function edit(book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * update buku
     */
    public function update(Request $request, book $book)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'jumlah' => 'required',
        ]);
        $book->update($request->only(['judul', 'penulis', 'penerbit', 'jumlah']));
        return redirect()->route('books.index')->with('success', 'book updated successfully.');
    }

    /**
     * menghapus data (buku) pada penyimpanan
     */
    public function destroy(book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'book deleted successfully');
    }
}
