@extends('layouts.app')
@section('content')

@include('layouts.navbar')

<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold">Blok Information</h1>
        @if (Auth::user()->role == 'admin')
            
        <a href="/blok/form" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transform transition duration-300 hover:scale-105">Tambah</a>
        @endif
    </div>
    @if (session()->has('error'))
        <div class="text-sm text-red-600">{{ session('error') }}</div>
    @endif
    @if (session()->has('success'))
        <div class="text-sm text-green-600">{{ session('success') }}</div>
    @endif
    <div class="grid gap-6 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
        @foreach ($bloks as $item)
        <a href="/monitoring/ip/{{ $item->id }}" class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between hover:bg-gray-300 transform transition duration-300 hover:scale-105">
            <div class="mb-6">
                <h2 class="text-2xl font-bold mb-2">{{ $item->namaBlok }}</h2>
                <p class="text-gray-700 mb-2"><span class="font-semibold">Telpon Blok:</span> {{ $item->telpBlok }}</p>
                <p class="text-gray-700"><span class="font-semibold">Alamat Blok:</span> {{ $item->alamatBlok }}</p>
            </div>
        </a>
        @endforeach
        {{ $bloks->links() }}
    </div>
</div>

@endsection
