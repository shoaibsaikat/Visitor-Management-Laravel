@extends('layouts.master')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Officer List</h2>
@stop
@section('content')
    <div class="mt-6">
        <a href="{{route('officer.create')}}" class="bg-gray-700 text-white px-4 py-2 rounded-md hover:bg-white hover:text-gray-700">Add Officer</a>
    </div>
    <br>
    <div class="container mx-auto text-white">
        <table class="min-w-full divide-y divide-gray-600">
            <thead>
                <tr>
                    <th class="py-3 text-left text-xs leading-4 font-medium uppercase">Name</th>
                    <th class="py-3 text-left text-xs leading-4 font-medium uppercase">Designation</th>
                    <th class="py-3 text-left text-xs leading-4 font-medium uppercase">Phone</th>
                    <th class="py-3"></th>
                </tr>
            </thead>
            <tbody class="bg-gray-800 divide-y divide-gray-600">
                @foreach ($people as $info)
                    <tr>
                        <td class="py-2 whitespace-no-wrap">{{ $info->name }}</td>
                        <td class="py-2 whitespace-no-wrap">{{ $info->designation }}</td>
                        <td class="py-2 whitespace-no-wrap">0{{ $info->phone }}</td>
                        <td class="py-2 ">
                            <a href="{{route('officer.edit', ['person' => $info])}}" class="text-indigo-400 hover:text-indigo-600">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        {{ $people->links(); }}
    </div>
@stop