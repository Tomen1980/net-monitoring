@extends('layouts.app')
@section('content')
    @include('layouts.navbar')

    <div class="flex items-center justify-center min-h-screen ">
        <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg">
            <h2 class="text-2xl font-medium text-center  mb-6 font-Fredoka text-black">Form Blok Baru</h2>
            <form action="{{ $action == 'update' ? '/update-blok' : '/submit-blok' }}" method="POST" class="space-y-6">
                @csrf
                @if ($action == 'update')
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $data->id }}">
                @else
                    @method('POST')
                @endif
                <div class="font-Fredoka ">
                    <label for="nama-blok" class="block text-sm font-medium text-[#777777]">Nama Blok</label>
                    @error('nama_blok')
                        <div class="text-sm text-red-600 ">{{ $message }}</div>
                    @enderror
                    <input id="nama-blok" name="nama_blok" type="text"
                        value="{{ old('nama_blok', $action == 'update' ? $data->namaBlok : '') }}" required
                        class="mt-1 block w-full px-3 py-2 border bg-[#D7D7D7] rounded-md shadow-sm placeholder-[#686868] focus:outline-none  sm:text-sm"
                        placeholder="Masukkan Nama Blok">
                </div>
                <div class="font-Fredoka">
                    <label for="telpon-blok" class="block text-sm font-medium text-[#777777]">Telpon Blok</label>
                    @error('telpon_blok')
                        <div class="text-sm text-red-600 ">{{ $message }}</div>
                    @enderror
                    <input id="telpon-blok" name="telpon_blok" type="tel"
                        value="{{ old('telpon_blok', $action == 'update' ? $data->telpBlok : '') }}" required
                        class="mt-1 block w-full px-3 py-2 border bg-[#D7D7D7] rounded-md shadow-sm placeholder-[#686868] focus:outline-none  sm:text-sm"
                        placeholder="Masukkan Telpon Blok">
                </div>
                <div class="font-Fredoka">
                    <label for="alamat-blok" class="block text-sm font-medium text-[#777777]">Alamat Blok</label>
                    @error('alamat_blok')
                        <div class="text-sm text-red-600 ">{{ $message }}</div>
                    @enderror
                    <textarea id="alamat-blok" name="alamat_blok" required rows="4"
                        class="mt-1 block w-full px-3 py-2 border bg-[#D7D7D7] rounded-md shadow-sm placeholder-[#686868] focus:outline-none  sm:text-sm"
                        placeholder="Masukkan Alamat Blok">{{ $action == 'update' ? $data->alamatBlok : '' }}</textarea>
                </div>
                <div class="font-Fredoka ">
                    <button type="submit"
                        class="w-[70%] flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#953030] hover:bg-[#D24E4E] ml-14 ">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
