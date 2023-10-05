@extends('layouts.master')
@section('content')
    <div>
        <form action="{{route('visitor.search')}}" method="POST">
            @csrf
            <div class="flex flex-row">
                <div class="mb-4">
                    <label for="phone" class="block text-white font-bold">Phone: (10 characters)</label>
                    <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" class="w-full border rounded-md px-3 py-2 text-gray-700" required>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <div class="mt-6">
                    <button type="submit" class="bg-gray-700 text-white px-4 py-2 rounded-md hover:bg-white hover:text-gray-700">Search</button>
                </div>
            </div>
        </form>
    </div>
    <br>
    <div>
        <h1 class="text-2xl font-semibold mb-6 text-white">Visitor Information Form</h1>
        <form action="{{route('visitor.store')}}" method="post">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-white font-bold">Name:</label>
                <input type="text" id="name" name="name" class="w-full border rounded-md px-3 py-2 text-gray-700" value="{{$visitor['name']}}" required>
            </div>
            <div class="mb-4">
                <label for="designation" class="block text-white font-bold">Designation:</label>
                <input type="text" id="designation" name="designation" class="w-full border rounded-md px-3 py-2 text-gray-700" value="{{$visitor['designation']}}" required>
            </div>
            <div class="mb-4">
                <label for="card_no" class="block text-white font-bold">Card No:</label>
                <input type="number" id="card_no" name="card" class="w-full border rounded-md px-3 py-2 text-gray-700" required>
            </div>
            <div class="mb-4">
                <label for="address" class="block text-white font-bold">Address:</label>
                <textarea id="address" name="address" class="w-full border rounded-md px-3 py-2 text-gray-700" required>{{$visitor['address']}}</textarea>
            </div>
            <div class="mb-4">
                <label for="phone" class="block text-white font-bold">Phone: (10 characters)</label>
                <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" class="w-full border rounded-md px-3 py-2 text-gray-700" value="{{$visitor['phone']}}" required>
            </div>
            <div class="mb-4">
                <label for="nid" class="block text-white font-bold">NID: (10 characters)</label>
                <input type="text" id="nid" name="nid" pattern="[0-9]{10}" class="w-full border rounded-md px-3 py-2 text-gray-700" value="{{$visitor['nid']}}">
            </div>
            <div class="mt-4">
                <label for="officers" class="block text-white font-bold">Select an Item:</label>
                <select id="officers" name="officer" class="block w-full rounded-md py-2 px-3 mt-1 text-gray-700">
                    @foreach ($officers as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-6">
                <button type="submit" class="bg-gray-700 text-white px-4 py-2 rounded-md hover:bg-white hover:text-gray-700">Submit</button>
            </div>
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-red-500">{{$error}}</li>
                    @endforeach
                </ul>
            @endif
        </form>
    </div>
@stop