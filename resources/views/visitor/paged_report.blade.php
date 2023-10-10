@extends('layouts.master')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Visit Report</h2>
@stop
@section('content')
    <div class="container mx-auto text-white">
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
                        <td class="px-1 py-2 whitespace-no-wrap">{{ $info->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        {{ $visits->links(); }}
    </div>
@stop