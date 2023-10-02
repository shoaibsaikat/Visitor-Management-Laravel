<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;

class PeopleController extends Controller
{
    public function list(Request $request) {
        return view('people.create');
    }

    public function create(Request $request) {
        return view('people.create');
    }

    public function store(Request $request) {
        $formData = $request->validate([
            'name'          => 'required|string|max:255',
            'designation'   => 'required|string|max:255',
            'address'       => 'required|string',
            'type'          => 'required|in:0,1',
            'phone'         => 'required|regex:/^[0-9]{10}$/',
            'nid'           => 'regex:/^[0-9]{10}$/',
        ]);
        People::create($formData);
        return redirect('/')->with('success', 'Form submitted successfully!');
    }
}
