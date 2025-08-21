<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apk;
use App\Models\ApkType;
use Illuminate\Http\Request;

class ApkController extends Controller
{
    public function index()
    {
        $apks = Apk::with('type')->paginate(10);
        return view('admin.apks.index', compact('apks'));
    }

    public function create()
    {
        $types = ApkType::all();
        return view('admin.apks.create', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'apk_type_id' => 'required|exists:apk_types,id',
            'package_name' => 'required|string|max:255',
            'version' => 'required|string|max:50',
            'file_path' => 'required|url', // must be a valid URL
        ]);

        Apk::create([
            'name' => $request->name,
            'description' => $request->description,
            'apk_type_id' => $request->apk_type_id,
            'package_name' => $request->package_name,
            'version' => $request->version,
            'file_path' => $request->file_path, // direct link
        ]);

        return redirect()->route('admin.apks.index')
            ->with('success', 'APK created successfully.');
    }

    public function edit(Apk $apk)
    {
        $types = ApkType::all();
        return view('admin.apks.edit', compact('apk', 'types'));
    }

    public function update(Request $request, Apk $apk)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'apk_type_id' => 'required|exists:apk_types,id',
            'package_name' => 'required|string|max:255',
            'version' => 'required|string|max:50',
            'file_path' => 'required|url', // still must be a URL
        ]);

        $apk->update([
            'name' => $request->name,
            'description' => $request->description,
            'apk_type_id' => $request->apk_type_id,
            'package_name' => $request->package_name,
            'version' => $request->version,
            'file_path' => $request->file_path,
        ]);

        return redirect()->route('admin.apks.index')
            ->with('success', 'APK updated successfully.');
    }

    public function destroy(Apk $apk)
    {
        $apk->delete();
        return redirect()->route('admin.apks.index')
            ->with('success', 'APK deleted successfully.');
    }
}
