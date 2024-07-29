@extends('layouts.app')
@section('content')

@include('layouts.navbar')

<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold">Blok Information</h1>
        <a href="/blok/form" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Tambah</a>
    </div>
    @if (session()->has('error'))
        <div class="text-sm text-red-600">{{ session('error') }}</div>
    @endif
    @if (session()->has('success'))
        <div class="text-sm text-green-600">{{ session('success') }}</div>
    @endif
    <div class="grid gap-6 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
        <!-- Dummy Data Example 1 -->
        @foreach ($bloks as $item)
        <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
            <div class="mb-6">
                <h2 class="text-2xl font-bold mb-2">{{ $item->namaBlok }}</h2>
                <p class="text-gray-700 mb-2 "><span class="font-semibold">Telpon Blok:</span> {{ $item->telpBlok }}</p>
                <p class="text-gray-700"><span class="font-semibold">Alamat Blok:</span> {{ $item->alamatBlok }}</p>
            </div>
            <div class="flex justify-end space-x-2 mt-auto">
                <a href="/blok/update/{{ $item->id }}" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">Edit</a>
                <form action="/blok/delete/{{ $item->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Hapus</button>
                </form>
            </div>
        </div>
        @endforeach
        {{ $bloks->links() }}
    </div>

</div>

@endsection