@extends('layouts.app')
@section('content')
@include('layouts.navbar')

<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold text-center text-gray-900 mb-8">Dashboard</h1>
    <div class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
        <!-- Destination net unreachable Card -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-bold text-gray-900 mb-2">Destination net unreachable</h2>
            <p class="text-4xl font-semibold text-gray-700">{{$dnu}}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-bold text-gray-900 mb-2">Destination host unreachable</h2>
            <p class="text-4xl font-semibold text-gray-700">{{$dhu}}</p>
        </div>
        <!-- Request timed out Card -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-bold text-gray-900 mb-2">Request timed out</h2>
            <p class="text-4xl font-semibold text-gray-700">{{$rto}}</p>
        </div>
        <!-- Connected Card -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-bold text-gray-900 mb-2">Connected</h2>
            <p class="text-4xl font-semibold text-gray-700">{{$cnt}}</p>
        </div>
        <!-- Disconnected Card -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-bold text-gray-900 mb-2">Disconnected</h2>
            <p class="text-4xl font-semibold text-gray-700">{{$dc}}</p>
        </div>
    </div>
</div>

@endsection