<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\People;
use App\Models\VisitorHistory;

class VisitorController extends Controller
{
    public function list() {
        $visits = People::where('type', 1)->orderBy('designation')->get();
        return view('visitor.list', ['people' => $visits]);
    }

    public function create() {
        $visitor = [
            'name'          => NULL,
            'designation'   => NULL,
            'card'          => NULL,
            'address'       => NULL,
            'phone'         => NULL,
            'nid'           => NULL
        ];
        $officers = People::where('type', 0)->orderBy('designation')->get();
        return view('visitor.create', ['officers' => $officers, 'visitor' => $visitor]);
    }

    public function search() {
        $formData = request()->validate([
            'phone' => 'required|regex:/^[0-9]{10}$/',
        ]);
        $visitor = People::where('phone', $formData['phone'])->first();
        if (is_null($visitor)) {
            $visitor = [
                'name'          => NULL,
                'designation'   => NULL,
                'card'          => NULL,
                'address'       => NULL,
                'phone'         => $formData['phone'],
                'nid'           => NULL
            ];
        }
        $officers = People::where('type', 0)->orderBy('designation')->get();
        return view('visitor.create', ['officers' => $officers, 'visitor' => $visitor]);
    }

    public function store(Request $request) {
        $formData = $request->validate([
            'name'          => 'required|string|max:255',
            'designation'   => 'required|string|max:255',
            'address'       => 'required|string',
            'phone'         => 'required|regex:/^[0-9]{10}$/',
            'nid'           => 'nullable|regex:/^[0-9]{10}$/',
            'card'          => 'required|integer|min:0',
            'officer'       => 'required|integer|min:0',
        ]);
        $visitor = People::where('phone', $formData['phone'])->first();
        if (is_null($visitor)) {
            $visitor = People::create([
                'name' => $formData['name'],
                'designation' => $formData['designation'],
                'address' => $formData['address'],
                'phone' => $formData['phone'],
                'nid' => $formData['nid'],
                'type' => 1,
            ]);
        }        
        $history = new VisitorHistory;
        $history->card_no = $formData['card'];
        $history->officer_id = $formData['officer'];
        $history->visitor_id = $visitor->id;
        $history->save();

        return redirect(route('welcome'))->with('success', 'Visit created successfully!');
    }
}
