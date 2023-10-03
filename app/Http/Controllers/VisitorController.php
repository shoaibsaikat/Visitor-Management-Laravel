<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;

class VisitorController extends Controller
{
    public function list() {
        $visitor = People::where('type', 1)->orderBy('designation')->get();
        return view('visitor.list', ['people' => $visitor]);
    }

    public function create(Request $request) {
        $officers = People::where('type', 0)->orderBy('designation')->get();
        return view('visitor.create', ['officers' => $officers]);
    }

    public function store(Request $request) {
        $formData = $request->validate([
            'name'          => 'required|string|max:255',
            'designation'   => 'required|string|max:255',
            'address'       => 'required|string',
            'phone'         => 'required|regex:/^[0-9]{10}$/',
            'nid'           => 'nullable|regex:/^[0-9]{10}$/',
            'officer'       => 'required|regex:/^[0-9]{10}$/',
        ]);

        People::create([
            'name' => $formData['name'],
            'designation' => $formData['designation'],
            'address' => $formData['address'],
            'phone' => $formData['phone'],
            'nid' => $formData['nid'],
            'type' => 1,
        ]);
        return redirect(route('welcome'))->with('success', 'Visit created successfully!');
    }
}
