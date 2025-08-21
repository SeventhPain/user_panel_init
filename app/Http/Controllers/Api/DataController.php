<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apk;
use App\Models\Book;
use App\Models\Pdf;
use App\Models\PhoneNumber;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function books()
    {
        $books = Book::with('type')->get();
        return response()->json([
            'success' => true,
            'data' => $books
        ]);
    }

    public function pdfs()
    {
        $pdfs = Pdf::with('type')->get();
        return response()->json([
            'success' => true,
            'data' => $pdfs
        ]);
    }

    public function apks()
    {
        $apks = Apk::with('type')->get();
        return response()->json([
            'success' => true,
            'data' => $apks
        ]);
    }

    public function phones()
    {
        $phones = PhoneNumber::all();
        return response()->json([
            'success' => true,
            'data' => $phones
        ]);
    }
}