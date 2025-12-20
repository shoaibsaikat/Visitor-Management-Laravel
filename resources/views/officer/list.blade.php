@extends('layouts.master')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Officer List</h2>
@stop
@section('content')
    <div class="mt-6 float-left">
        <a href="{{ Auth::user()->can_manage_people ? route('officer.create') : '#' }}"
            class="bg-gray-700 text-white px-4 py-2 rounded-md hover:bg-white hover:text-gray-700 {{ Auth::user()->can_manage_people ?  '' : 'pointer-events-none' }}">
            Add Officer
        </a>
    </div>
    <div class="mt-6 float-right">
        <form method="POST" action="{{ route('officer.name_search') }}">
            @csrf
            <div class="flex flex-row">
                <input type="text" id="name" name="name" placeholder="Officer name" class="w-full border rounded-md px-3 py-2 text-gray-700" required>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="bg-gray-700 text-white px-4 py-2 rounded-md hover:bg-white hover:text-gray-700">Search</button>
            </div>
        </form>
    </div>
    <div class="container mx-auto text-white">
        <br><br><br><br>
        @if ($people != null)
            <table class="min-w-full divide-y divide-gray-600">
                <thead>
                    <tr>
                        <th class="px-1 py-3 text-left text-xs leading-4 font-medium uppercase">Name</th>
                        <th class="px-1 py-3 text-left text-xs leading-4 font-medium uppercase">Designation</th>
                        <th class="px-1 py-3 text-left text-xs leading-4 font-medium uppercase">Phone</th>
                        <th class="px-1 py-3"></th>
                    </tr>
                </thead>
                <tbody class="bg-gray-800 divide-y divide-gray-600">
                    @foreach ($people as $info)
                        <tr>
                            <td class="px-1 py-2 whitespace-no-wrap">{{ $info->name }}</td>
                            <td class="px-1 py-2 whitespace-no-wrap">{{ $info->designation }}</td>
                            <td class="px-1 py-2 whitespace-no-wrap">0{{ $info->phone }}</td>
                            <td class="px-1 py-2 ">
                                <a href="{{ route('officer.edit', ['person' => $info->id]) }}" class="text-indigo-400 hover:text-indigo-600">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            {{ $people->links() }}
        @else
            <h1>No such officer found!</h1>
        @endif
    </div>
@stop
