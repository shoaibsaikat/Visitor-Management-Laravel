<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;

class OfficerController extends Controller
{
    public function list() {
        $officer = People::where('type', 0)->orderByDesc('designation')->paginate(10);
        return view('officer.list', ['people' => $officer]);
    }

    public function create() {
        return view('officer.create');
    }

    public function store(Request $request) {
        $formData = $request->validate([
            'name'          => 'required|string|max:255',
            'designation'   => 'required|string|max:255',
            'address'       => 'required|string',
            'phone'         => 'required|regex:/^[0-9]{10}$/',
            'nid'           => 'nullable|regex:/^[0-9]{10}$/',
        ]);

        People::create([
            'name'          => $formData['name'],
            'designation'   => $formData['designation'],
            'address'       => $formData['address'],
            'phone'         => $formData['phone'],
            'nid'           => $formData['nid'],
            'type'          => 0,
        ]);
        return redirect(route('welcome'))->with('success', 'Officer created!');
    }

    public function edit(People $person) {
        return view('officer.edit', ['person' => $person]);
    }

    public function update(Request $request, People $person) {
        $formData = $request->validate([
            'name'          => 'required|string|max:255',
            'designation'   => 'required|string|max:255',
            'address'       => 'required|string',
            'phone'         => 'required|regex:/^[0-9]{10}$/',
            'nid'           => 'nullable|regex:/^[0-9]{10}$/',
        ]);

        $person->update($formData);
        return redirect(route('officer.list'))->with('success', 'Officer information updated!');
    }
}
