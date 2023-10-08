@extends('layouts.master')
@section('content')
    <div class="container mx-auto mt-8 text-white">
        <h1 class="text-2xl font-semibold mb-4">Visit List</h1>
        <table class="min-w-full divide-y divide-gray-600">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs leading-4 font-medium uppercase">Name</th>
                    <th class="px-6 py-3 text-left text-xs leading-4 font-medium uppercase">Officer</th>
                    <th class="px-6 py-3 text-left text-xs leading-4 font-medium uppercase">Designation</th>
                    <th class="px-6 py-3 text-left text-xs leading-4 font-medium uppercase">Phone</th>
                    <th class="px-6 py-3 text-left text-xs leading-4 font-medium uppercase">Card No</th>
                    <th class="px-6 py-3 text-left text-xs leading-4 font-medium uppercase">Date</th>
                </tr>
            </thead>
            <tbody class="bg-gray-800 divide-y divide-gray-600">
                @foreach ($people as $info)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap">{{ $info->visitor_name }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap">{{ $info->officer_name }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap">{{ $info->designation }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap">{{ $info->phone }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap">{{ $info->card_no }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap">{{ $info->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop