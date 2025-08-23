<?php


// app/Http/Controllers/Admin/BookController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        // $books = Book::with('type')->get();
        $books = Book::with('type')->paginate(10); // Add pagination
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        $types = BookType::all();
        return view('admin.books.create', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'title_mm' => 'required|string|max:255',
            'description_mm' => 'nullable|string',
            'book_type_id' => 'required|exists:book_types,id',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'file' => 'required|file|mimes:pdf,epub,mobi|max:10240',
        ]);

        $coverPath = null;
        if ($request->hasFile('cover_image')) {
            $coverPath = $request->file('cover_image')->store('books/covers', 'public');
        }

        $filePath = $request->file('file')->store('books/files', 'public');

        Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'title_mm' => $request->title_mm,
            'description_mm' => $request->description_mm,
            'book_type_id' => $request->book_type_id,
            'cover_image' => $coverPath,
            'file_path' => $filePath,
        ]);

        return redirect()->route('admin.books.index')
            ->with('success', 'Book created successfully.');
    }

    public function edit(Book $book)
    {
        $types = BookType::all();
        return view('admin.books.edit', compact('book', 'types'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'title_mm' => 'required|string|max:255',
            'description_mm' => 'nullable|string',
            'book_type_id' => 'required|exists:book_types,id',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'file' => 'nullable|file|mimes:pdf,epub,mobi|max:10240',
        ]);

        $coverPath = $book->cover_image;
        if ($request->hasFile('cover_image')) {
            if ($coverPath) {
                Storage::disk('public')->delete($coverPath);
            }
            $coverPath = $request->file('cover_image')->store('books/covers', 'public');
        }

        $filePath = $book->file_path;
        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($filePath);
            $filePath = $request->file('file')->store('books/files', 'public');
        }

        $book->update([
            'title' => $request->title,
            'description' => $request->description,
            'title_mm' => $request->title_mm,
            'description_mm' => $request->description_mm,
            'book_type_id' => $request->book_type_id,
            'cover_image' => $coverPath,
            'file_path' => $filePath,
        ]);

        return redirect()->route('admin.books.index')
            ->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        if ($book->cover_image) {
            Storage::disk('public')->delete($book->cover_image);
        }
        Storage::disk('public')->delete($book->file_path);
        $book->delete();

        return redirect()->route('admin.books.index')
            ->with('success', 'Book deleted successfully.');
    }
}