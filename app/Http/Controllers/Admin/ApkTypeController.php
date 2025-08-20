<?php


// app/Http/Controllers/Admin/ApkTypeController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ApkType;
use Illuminate\Http\Request;

class ApkTypeController extends Controller
{
    public function index()
    {
        $types = ApkType::all();
        return view('admin.apk_types.index', compact('types'));
    }

    public function create()
    {
        return view('admin.apk_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        ApkType::create($request->all());

        return redirect()->route('admin.apk-types.index')
            ->with('success', 'APK type created successfully.');
    }

    public function edit(ApkType $apkType)
    {
        return view('admin.apk_types.edit', compact('apkType'));
    }

    public function update(Request $request, ApkType $apkType)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $apkType->update($request->all());

        return redirect()->route('admin.apk-types.index')
            ->with('success', 'APK type updated successfully.');
    }

    public function destroy(ApkType $apkType)
    {
        $apkType->delete();

        return redirect()->route('admin.apk-types.index')
            ->with('success', 'APK type deleted successfully.');
    }
}