@extends('layouts.master')
@section('content')
    <h1 class="text-2xl font-semibold mb-6 text-white">Officer Information Update</h1>
    <form action="{{route('officer.update', ['person' => $person])}}" method="post">
        @csrf
        @method('put')
        <div class="mb-4">
            <label for="name" class="block text-white font-bold">Name:</label>
            <input type="text" id="name" name="name" class="w-full border rounded-md px-3 py-2 text-gray-700" value="{{$person->name}}" required>
        </div>
        <div class="mb-4">
            <label for="designation" class="block text-white font-bold">Designation:</label>
            <input type="text" id="designation" name="designation" class="w-full border rounded-md px-3 py-2 text-gray-700" value="{{$person->designation}}" required>
        </div>
        <div class="mb-4">
            <label for="address" class="block text-white font-bold">Address:</label>
            <textarea id="address" name="address" class="w-full border rounded-md px-3 py-2 text-gray-700" required>{{$person->address}}</textarea>
        </div>
        <div class="mb-4">
            <label for="phone" class="block text-white font-bold">Phone: (10 characters)</label>
            <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" class="w-full border rounded-md px-3 py-2 text-gray-700" value="{{$person->phone}}" required>
        </div>
        <div class="mb-4">
            <label for="nid" class="block text-white font-bold">NID: (10 characters)</label>
            <input type="text" id="nid" name="nid" pattern="[0-9]{10}" class="w-full border rounded-md px-3 py-2 text-gray-700" value="{{$person->nid}}">
        </div>
        <div class="mt-6">
            <button type="submit" class="bg-gray-700 text-white px-4 py-2 rounded-md hover:bg-white hover:text-gray-700">Update</button>
        </div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-red-500">{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </form>
@stop