@extends('layouts.master')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Visit Report Selection</h2>
@stop
@section('content')
    <div class="container mx-auto mt-8 text-white">
        <div class="max-w-md mx-auto bg-gray-900 p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-semibold mb-4">Select Report Interval</h2>
            <form method="POST" action="{{ route('visitor.report') }}">
                @csrf
                <div class="mb-4">
                    <label for="from" class="block font-bold">From:</label>
                    <input type="date" id="from" name="from"
                        class="w-full border-gray-700 rounded-md px-3 py-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                        required>
                </div>
                <div class="mb-4">
                    <label for="to" class="block font-bold">To:</label>
                    <input type="date" id="to" name="to"
                        class="w-full border-gray-700 rounded-md px-3 py-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                        required>
                </div>
                <div class="mt-6">
                    <button type="submit"
                        class="bg-gray-700 text-white px-4 py-2 rounded-md hover:bg-white hover:text-gray-700">Show</button>
                </div>
            </form>
        </div>
    </div>
@stop
