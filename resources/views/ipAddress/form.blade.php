@extends('layouts.app')
@section('content')
    @include('layouts.navbar')

    <div class="bg-gray-100 flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-900">Input IP Address</h2>
            <form action="{{ $action == 'update' ? '/update-ip' : '/submit-ip' }}" method="POST" class="space-y-6">
                @csrf
                @if ($action == 'update')
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $data->id }}">
                @else
                    @method('POST')
                @endif

                <div>
                    <label for="ip_address" class="sr-only">IP Address</label>
                    @error('ip_address')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                    <input id="ip_address" name="ip_address" type="text"
                        value="{{ old('ip_address', $action == 'update' ? $data->ipAddress : '') }}" required
                        class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="IP Address">
                </div>
                <div>
                    <label for="client_name" class="sr-only">Nama Client</label>
                    @error('client_name')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                    <input id="client_name" name="client_name" type="text"
                        value="{{ old('ip_address', $action == 'update' ? $data->namaClient : '') }}" required
                        class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Nama Client">
                </div>
                <div>
                    <label for="nama_blok" class="sr-only">Nama Blok</label>
                    @error('nama_blok')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                    <select id="nama_blok" name="nama_blok" required
                        class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="" {{ $action == 'update' ? '' : 'selected' }}>Select Nama Blok</option>
                        @foreach ($option as $item)
                            <option value="{{ $item->id }}"
                                {{ $action == 'update' && $item->namaBlok == $data->namaBlok ? 'selected' : '' }}>
                                {{ $item->namaBlok }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <button type="submit"
                        class="w-full px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
