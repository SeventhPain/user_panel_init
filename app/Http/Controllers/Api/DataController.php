<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apk;
use App\Models\Book;
use App\Models\Pdf;
use App\Models\BookType;
use App\Models\PhoneNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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

    public function booktypes()
    {
        $booktypes = BookType::all();
        return response()->json([
            'success' => true,
            'data' => $booktypes
        ]);
    }

    public function language()
    {
        try {
            // Load English language file
            $enPath = resource_path('lang/en.json');
            $enData = File::exists($enPath) ? json_decode(File::get($enPath), true) : [];
            
            // Load Myanmar language file
            $myPath = resource_path('lang/my.json');
            $myData = File::exists($myPath) ? json_decode(File::get($myPath), true) : [];
            
            // Combine both languages
            $languageData = [
                'en' => $enData,
                'my' => $myData
            ];
            
            return response()->json([
                'success' => true,
                'data' => $languageData
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to load language files: ' . $e->getMessage()
            ], 500);
        }
    }
}