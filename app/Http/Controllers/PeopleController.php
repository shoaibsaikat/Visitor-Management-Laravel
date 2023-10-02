<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function list(Request $request) {
        return view('people.create');
    }

    public function create(Request $request) {
        return view('people.create');
    }

    public function store(Request $request) {
        return view('people.create');
    }
}
