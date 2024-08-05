@extends('layouts.app')
@section('content')
@include('layouts.header')
@include('layouts.sidebar')

<div class="container mx-auto p-6 border-2 mt-28 ml-11 w-[1100px] font-Fredoka">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-medium font-Fredoka">Log Aktivitas</h1>
        <form action="/logger/destroyAll" method="POST">
            @csrf
            @method('DELETE')
            <button class="font-Fredoka px-4 py-2 bg-[#D40000] text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                Hapus Semua
            </button>
        </form>
    </div>

    @if (session()->has('success'))
        <div class="text-sm text-green-600">{{ session('success') }}</div>
    @endif
    @if (session()->has('error'))
        <div class="text-sm text-red-600">{{ session('error') }}</div>
    @endif

    <div class="overflow-x-auto shadow-lg font-Fredoka font-medium">
        <table class="min-w-full bg-white rounded-lg shadow overflow-hidden">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Tanggal</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Waktu</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Aktivitas</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider"></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($logs as $item)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->tanggal }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->waktu }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->aktivitas }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <form action="/logger/delete/{{ $item->id }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="">
                                <img src='img/sampah.png' alt='' class='w-[25px] h-[25px]'>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-600">Logs Not Found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4 font-Fredoka ">
        {{ $logs->links() }} 
    </div>
</div>
@endsection
