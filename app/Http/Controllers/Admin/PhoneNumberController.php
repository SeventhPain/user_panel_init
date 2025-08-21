<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PhoneNumber;
use Illuminate\Http\Request;

class PhoneNumberController extends Controller
{
    public function index()
    {
        $phoneNumbers = PhoneNumber::all();
        return view('admin.phone_numbers.index', compact('phoneNumbers'));
    }

    public function create()
    {
        return view('admin.phone_numbers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:20',
            'description' => 'nullable|string',
        ]);

        PhoneNumber::create($request->all());

        return redirect()->route('admin.phone-numbers.index')->with('success', 'Phone number created successfully.');
    }

    public function edit(PhoneNumber $phoneNumber)
    {
        return view('admin.phone_numbers.edit', compact('phoneNumber'));
    }

    public function update(Request $request, PhoneNumber $phoneNumber)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:20',
            'description' => 'nullable|string',
        ]);

        $phoneNumber->update($request->all());

        return redirect()->route('admin.phone-numbers.index')->with('success', 'Phone number updated successfully.');
    }

    public function destroy(PhoneNumber $phoneNumber)
    {
        $phoneNumber->delete();
        return redirect()->route('admin.phone-numbers.index')->with('success', 'Phone number deleted successfully.');
    }
}
