<?php


// app/Http/Controllers/Admin/BookTypeController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookType;
use Illuminate\Http\Request;

class BookTypeController extends Controller
{
    public function index()
    {
        $types = BookType::all();
        return view('admin.book_types.index', compact('types'));
    }

    public function create()
    {
        return view('admin.book_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        BookType::create($request->all());

        return redirect()->route('admin.book-types.index')
            ->with('success', 'Book type created successfully.');
    }

    public function edit(BookType $bookType)
    {
        return view('admin.book_types.edit', compact('bookType'));
    }

    public function update(Request $request, BookType $bookType)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $bookType->update($request->all());

        return redirect()->route('admin.book-types.index')
            ->with('success', 'Book type updated successfully.');
    }

    public function destroy(BookType $bookType)
    {
        $bookType->delete();

        return redirect()->route('admin.book-types.index')
            ->with('success', 'Book type deleted successfully.');
    }
}