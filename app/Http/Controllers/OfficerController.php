<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\People;
use App\Models\User;

use Illuminate\Support\Facades\Log;

class OfficerController extends Controller
{
    public function list()
    {
        $officer = People::where('type', 0)->orderByDesc('designation')->paginate(10);
        return view('officer.list', ['people' => $officer]);
    }

    public function create()
    {
        $users = User::all();
        return view('officer.create', ['users' => $users]);
    }

    public function store(Request $request)
    {
        $formData = $request->validate([
            'name'          => 'required|string|max:255',
            'designation'   => 'required|string|max:255',
            'address'       => 'required|string',
            'phone'         => 'required|regex:/^[0-9]{10}$/',
            'email'         => 'nullable', // TODO: check if length 10 enough to contain pkey
            'nid'           => 'nullable|regex:/^[0-9]{10}$/',
        ]);

        $person = People::create([
            'name'          => $formData['name'],
            'designation'   => $formData['designation'],
            'address'       => $formData['address'],
            'phone'         => $formData['phone'],
            'nid'           => $formData['nid'],
            'type'          => 0,
        ]);
        $user = User::find($formData['email']);
        if ($user != null && !isset($user->officer_id)) {
            $user->officer_id = $person->id;
            $user->update();
            $person->user_id = $user->id;
            $person->update();
        }
        return redirect(route('officer.list'))->with('success', 'Officer created!');
    }

    public function edit(People $person)
    {
        $users = User::all();
        return view('officer.edit', ['person' => $person, 'users' => $users]);
    }

    public function update(Request $request, People $person)
    {
        $formData = $request->validate([
            'name'          => 'required|string|max:255',
            'designation'   => 'required|string|max:255',
            'address'       => 'required|string',
            'phone'         => 'required|regex:/^[0-9]{10}$/',
            'email'         => 'nullable', // TODO: check if length 10 enough to contain pkey
            'nid'           => 'nullable|regex:/^[0-9]{10}$/',
        ]);

        $user = User::find($formData['email']); // $formData['email'] is actually the id of the user
        if ($user != null && !isset($user->officer_id)) {
            $user->officer_id = $person->id;
            $user->update();
            $formData['user_id'] = $user->id;
        } else if ($user == null) {
            $user = User::find($person->user_id);
            if ($user != null) {
                $user->officer_id = null;
                $user->update();
                $formData['user_id'] = null;
            }
        }
        $person->update($formData);
        return redirect(route('officer.list'))->with('success', 'Officer information updated!');
    }

    public function name_search()
    {
        $formData = request()->validate([
            'name' => 'required',
        ]);
        $officer = DB::table('people')
            ->where('name', 'like', '%' . $formData['name'] . '%')
            ->where('type', '=', 0)->paginate(10);
        if ($officer->isEmpty()) {
            return view('officer.list', ['people' => null]);
        } else {
            return view('officer.list', ['people' => $officer]);
        }
    }
}

/*
    NOTE: to show DB query generated use below
    DB::enableQueryLog(); // Enable query log

    // Your Eloquent query executed by using get()

    dd(DB::getQueryLog()); // Show results of log
*/
