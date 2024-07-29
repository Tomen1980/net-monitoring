@extends('layouts.app')
@section('content')
    @include('layouts.navbar')

    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-center text-gray-900 mb-6">Blok Form</h2>
            <form action="{{ $action == 'update' ? '/update-blok' : '/submit-blok' }}" method="POST" class="space-y-6">
                @csrf
                @if ($action == 'update')
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $data->id }}">
                @else
                    @method('POST')
                @endif
                <div>
                    <label for="nama-blok" class="block text-sm font-medium text-gray-700">Nama Blok</label>
                    @error('nama_blok')
                        <div class="text-sm text-red-600 ">{{ $message }}</div>
                    @enderror
                    <input id="nama-blok" name="nama_blok" type="text"
                        value="{{ old('nama_blok', $action == 'update' ? $data->namaBlok : '') }}" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        placeholder="Masukkan Nama Blok">
                </div>
                <div>
                    <label for="telpon-blok" class="block text-sm font-medium text-gray-700">Telpon Blok</label>
                    @error('telpon_blok')
                        <div class="text-sm text-red-600 ">{{ $message }}</div>
                    @enderror
                    <input id="telpon-blok" name="telpon_blok" type="tel"
                        value="{{ old('telpon_blok', $action == 'update' ? $data->telpBlok : '') }}" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        placeholder="Masukkan Telpon Blok">
                </div>
                <div>
                    <label for="alamat-blok" class="block text-sm font-medium text-gray-700">Alamat Blok</label>
                    @error('alamat_blok')
                        <div class="text-sm text-red-600 ">{{ $message }}</div>
                    @enderror
                    <textarea id="alamat-blok" name="alamat_blok" required rows="4"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        placeholder="Masukkan Alamat Blok">{{ $action == 'update' ? $data->alamatBlok : '' }}</textarea>
                </div>
                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
