@extends('layouts.master')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Visit List</h2>
@stop
@section('content')
    <div class="mt-6 float-left">
        <a href="{{route('visitor.create')}}" class="bg-gray-700 text-white px-4 py-2 rounded-md hover:bg-white hover:text-gray-700">Add Visit</a>
    </div>
    <div class="mt-6 float-right">
        <form method="POST" action="{{route('visitor.name_search')}}">
            @csrf
            <div class="flex flex-row">
                <input type="text" id="name" name="name" placeholder="Visitor name" class="w-full border rounded-md px-3 py-2 text-gray-700" required>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="bg-gray-700 text-white px-4 py-2 rounded-md hover:bg-white hover:text-gray-700">Search</button>
            </div>
        </form>
    </div>
    <div class="container mx-auto text-white">
        <br><br><br><br>
        <table class="min-w-full divide-y divide-gray-600">
            <thead>
                <tr>
                    <th class="px-1 py-3 text-left text-xs leading-4 font-medium uppercase">Visitor Name</th>
                    <th class="px-1 py-3 text-left text-xs leading-4 font-medium uppercase">Visiting Officer</th>
                    <th class="px-1 py-3 text-left text-xs leading-4 font-medium uppercase">Designation</th>
                    <th class="px-1 py-3 text-left text-xs leading-4 font-medium uppercase">Phone</th>
                    <th class="px-1 py-3 text-left text-xs leading-4 font-medium uppercase">Card No</th>
                    <th class="px-1 py-3 text-left text-xs leading-4 font-medium uppercase">Date</th>
                </tr>
            </thead>
            <tbody class="bg-gray-800 divide-y divide-gray-600">
                @foreach ($visits as $info)
                    <tr>
                        <td class="px-1 py-2 whitespace-no-wrap">{{ $info->visitor_name }}</td>
                        <td class="px-1 py-2 whitespace-no-wrap">{{ $info->officer_name }}</td>
                        <td class="px-1 py-2 whitespace-no-wrap">{{ $info->designation }}</td>
                        <td class="px-1 py-2 whitespace-no-wrap">0{{ $info->phone }}</td>
                        <td class="px-1 py-2 whitespace-no-wrap">{{ $info->card_no }}</td>
                        <td class="px-1 py-2 whitespace-no-wrap">{{ date('Y-m-d', strtotime($info->created_at)) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        {{ $visits->links(); }}
    </div>
@stop