@extends('layouts.app')
@section('content')
    @include('layouts.navbar')

    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">IP Address {{$blokName}}</h1>
            <a href="/list-monitoring"
                class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                kembali
            </a>
        </div>

        @if (session()->has('success'))
            <div class="text-sm text-green-600">{{ session('success') }}</div>
        @endif
        @if (session()->has('error'))
            <div class="text-sm text-red-600">{{ session('error') }}</div>
        @endif

        <div class="overflow-x-auto shadow-lg">
            <table class="min-w-full bg-white rounded-lg shadow overflow-hidden">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">IP Address</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama Client</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Status</th>
                        @if (Auth::user()->role == 'admin')
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Actions</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Dummy Data Row 1 -->
                    @forelse ($ips as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->ipAddress }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->namaClient }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $item->status == 'Connected' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }} ">
                                    {{ $item->status }}
                                </span>
                            </td>
                            @if (Auth::user()->role == 'admin')
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="/ipAddress/update/{{ $item->id }}"
                                        class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <form action="/ipAddress/delete/{{ $item->id }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 ml-4">Hapus</button>
                                    </form>
                                </td>
                            @endif

                        </tr>

                    @empty
                        <p class="text-sm text-gray-600">Ips Not Found</p>
                    @endforelse

                </tbody>
            </table>
        </div>
        {{ $ips->links() }}
    </div>
@endsection
