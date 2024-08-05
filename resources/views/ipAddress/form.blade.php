@extends('layouts.app')
@section('content')
    @include('layouts.navbar')

    <div class="bg-gray-100 flex items-center justify-center min-h-screen font-Fredoka">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-medium mb-6 text-center text-black">Input IP Address</h2>
            <form action="{{ $action == 'update' ? '/update-ip' : '/submit-ip' }}" method="POST" class="space-y-6">
                @csrf
                @if ($action == 'update')
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $data->id }}">
                @else
                    @method('POST')
                @endif

                <div>
                    <label for="ip_address" class="sr-only text-[#777777]">IP Address</label>
                    @error('ip_address')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                    <input id="ip_address" name="ip_address" type="text"
                        value="{{ old('ip_address', $action == 'update' ? $data->ipAddress : '') }}" required
                        class="block w-full px-4 py-2 border bg-[#D7D7D7] border-gray-300 rounded-md focus:outline-none "
                        placeholder="IP Address">
                </div>
                <div>
                    <label for="client_name" class="sr-only">Nama Client</label>
                    @error('client_name')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                    <input id="client_name" name="client_name" type="text"
                        value="{{ old('ip_address', $action == 'update' ? $data->namaClient : '') }}" required
                        class="block w-full px-4 py-2 border bg-[#D7D7D7] border-gray-300 rounded-md focus:outline-none "
                        placeholder="Nama Client">
                </div>
                <div>
                    <label for="nama_blok" class="sr-only">Nama Blok</label>
                    @error('nama_blok')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                    <select id="nama_blok" name="nama_blok" required
                        class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none ">
                        <option value="" {{ $action == 'update' ? '' : 'selected' }}>Select Nama Blok</option>
                        @foreach ($option as $item)
                            <option value="{{ $item->id }}"
                                {{ $action == 'update' && $item->namaBlok == $data->namaBlok ? 'selected' : '' }}>
                                {{ $item->namaBlok }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-center" >
                    <button type="submit ml-14 "
                        class="w-[70%] px-4 py-2 text-white bg-[#953030] rounded-md hover:bg-[#D24E4E]  ">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
