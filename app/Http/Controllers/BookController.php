<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    public function index()
{
    $books = Book::paginate(10);

    return view('books.index', compact('books'));
}

public function create()
{
    $categories = Category::all();

    return view('books.create', compact('categories'));
}

public function store(StoreBookRequest $request)
{
    $validated = $request->validated();

    Book::create($validated);

    return redirect()->route('books.index')
        ->with('success', "Buku \"{$validated['judul']}\" berhasil ditambahkan.");
}

public function show(string $id)
{
    $book = Book::findOrFail($id);

    return view('books.show', compact('book'));
}

public function edit(string $id)
{
    $book = Book::findOrFail($id);
    $categories = Category::all();

    return view('books.edit', compact('book', 'categories'));
}

public function update(Request $request, string $id)
{
    $book = Book::findOrFail($id);

    $validated = $request->validate([
        'judul' => 'required|string|max:200',
        'penulis' => 'required|string|max:100',
        'penerbit' => 'required|string|max:100',
        'tahun_terbit' => 'required|integer|min:1900|max:'.date('Y'),
        'isbn' => 'nullable|string|max:20',
        'stok' => 'required|integer|min:0',
        'category_id' => 'required|integer|exists:categories,id',
    ]);

    $book->update($validated);

    return redirect()->route('books.index')
        ->with('success', "Buku \"{$validated['judul']}\" berhasil diperbarui.");
}

public function destroy(string $id)
{
    $book = Book::findOrFail($id);
    $book->delete();

    return redirect()->route('books.index')
        ->with('success', 'Buku berhasil dihapus.');
}
}