@extends('layouts.app')
@section('content')
@include('layouts.header')
@include('layouts.sidebar')

@if (Auth::user()->role == 'admin')
    <div class='flex flex-row   mt-36 ml-12 space-x-16 '>
        <div class=' bg-white w-[750px] h-[80vh] rounded-2xl  drop-shadow-xl overflow-y-auto '>
            <div class='flex  ml-7 mt-5 h-9 items-center'>
                <img src='img/clipboard-text.png' alt=''class='w-[34px] h-[30px]'>
                <p class='font-Fredoka font-medium text-2xl ml-2 mt-1 text-[#A9A9A9]'>List Blok</p>
            </div>
            <ul class='ml-5 mt-5 '>
                @foreach ($Blok as $item)
                    {{-- <a href="/monitoring/ip/{{$item->id}}" class='flex border-red-500 border-2 ml-5 mt-2 h-9 items-center  hover:bg-[#E5EBEE] hover:rounded-md hover:w-[90%]'>
                        <img src='img/bus.png' alt=''class='w-[38px] h-[35px] border-red-500 border-2'>
                        <p class='font-Fredoka  text-2xl ml-2 mt-1 text-[#3C8DBC] font-medium border-red-500 border-2'>{{ $item->namaBlok }}</p>
                        <div class=' flex absolute right-16 space-x-1 mt-4 '>
                            <a href="/blok/update/{{ $item->id }}">
                                <button class=' items-center'>
                                    <img src='img/edit.png' alt=''class='w-[20px] h-[20px] '>
                                </button>
                            </a>
                            <form action="/blok/delete/{{ $item->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type ='submit' class=' items-center'>
                                    <img src='img/sampah.png' alt=''class='w-[20px] h-[20px] '>
                                </button>   
                            </form>
                        </div>
                    </a> --}}

                    <div class="flex  mx-auto mt-2 h-9 items-center justify-between">
                        <div class=" flex items-center justify-center">
                            <img src='img/bus.png' alt=''class='w-[38px] h-[35px] '>
                            <a href="/monitoring/ip/{{$item->id}}" class="font-Fredoka  text-2xl ml-2 mt-1 text-[#3C8DBC] font-medium">{{ $item->namaBlok }}</a>
                        </div>
                        <div class="flex space-x-1  justify-center items-center mr-10">

                                <a href="/blok/update/{{ $item->id }}" class="w-[20px] h-[20px] ">
                                    <img src='/img/edit.png' alt=''class='object-cover w-full h-full'>
                                </a>
                                <div class="w-[20px] h-[20px] ">
                                    <form action="/blok/delete/{{ $item->id }}" method="POST">
                                        <button>    
                                            <img src='/img/sampah.png' alt=''class='object-cover w-full h-full'>
                                        </button>
                                    </form>
                                </div>

                        </div>
                    </div>
                @endforeach
                
            </ul>
        </div>
        <div class='flex flex-col bg-[#222D32] w-[330px] h-[40vh] rounded-2xl  border-2 p-1'>
            <div class='flex  ml-5 mt-5 h-9 items-center'>
                <img src='img/chart.png' alt=''class='w-[30px] h-[30px]'>
                <p class='font-Fredoka  text-xl ml-2 mt-1 text-[#7ACEFF]'>Status Ip Address</p>
            </div>
            <div class=' ml-6 mt-5 space-y-2'>
                <ul class='flex items-center'>
                    <li class=' bg-[#93FF81] w-[22px] h-[22px] rounded-sm '></li>
                    <p class='font-Fredoka  text-md ml-2 mt-1 text-white'>Connected({{$cnt}})</p>
                </ul>
                <ul class='flex items-center'>
                    <li class=' bg-[#EF6363] w-[22px] h-[22px] rounded-sm '></li>
                    <p class='font-Fredoka  text-md ml-2 mt-1 text-white'>Disconnected({{$dc}})</p>
                </ul>
                <ul class='flex items-center'>
                    <li class=' bg-[#EFC063] w-[22px] h-[22px] rounded-sm '></li>
                    <p class='font-Fredoka  text-md ml-2 mt-1 text-white'>Destination Net Unreachable({{$dnu}})</p>
                </ul>
                <ul class='flex items-center'>
                    <li class=' bg-[#E4EF63] w-[22px] h-[22px] rounded-sm '></li>
                    <p class='font-Fredoka  text-md ml-2 mt-1 text-white'>Destination Host Unreachable({{$dhu}})</p>
                </ul>
                <ul class='flex items-center'>
                    <li class=' bg-[#9E9E9E] w-[22px] h-[22px] rounded-sm '></li>
                    <p class='font-Fredoka  text-md ml-2 mt-1 text-white'>Request Timed out({{$rto}})</p>
                </ul>
                
            </div>
        </div>
    </div>
@elseif (Auth::user()->role == 'operator')
<div class='flex flex-row   mt-36 ml-12 space-x-16'>
    <div class=' bg-white w-[750px] h-[80vh] rounded-2xl  drop-shadow-xl  overflow-y-auto '>
        <div class='flex  ml-7 mt-5 h-9 items-center'>
            <img src='img/clipboard-text.png' alt=''class='w-[34px] h-[30px]'>
            <p class='font-Fredoka font-medium text-2xl ml-2 mt-1 text-[#A9A9A9]'>List Blok</p>
        </div>
        <ul class='ml-5 mt-5'>
            @foreach ($Blok as $item)
            <a href="/monitoring/ip/{{$item->id}}"class='flex ml-5 mt-2 h-9 items-center  hover:bg-[#E5EBEE] hover:rounded-md hover:w-[90%]  '>
                <img src='img/bus.png' alt=''class='w-[38px] h-[35px]'>
                <p class='font-Fredoka  text-2xl ml-2 mt-1 text-[#3C8DBC] font-medium'>{{ $item->namaBlok }}</p>
            </a>
            @endforeach
            
        </ul>
    </div>
    <div class='flex flex-col bg-[#222D32] w-[330px] h-[40vh] rounded-2xl  border-2 p-1'>
        <div class='flex  ml-5 mt-5 h-9 items-center'>
            <img src='img/chart.png' alt=''class='w-[30px] h-[30px]'>
            <p class='font-Fredoka  text-xl ml-2 mt-1 text-[#7ACEFF]'>Status Ip Address</p>
        </div>
        <div class=' ml-6 mt-5 space-y-2'>
            <ul class='flex items-center'>
                <li class=' bg-[#93FF81] w-[22px] h-[22px] rounded-sm '></li>
                <p class='font-Fredoka  text-md ml-2 mt-1 text-white'>Connected({{$cnt}})</p>
            </ul>
            <ul class='flex items-center'>
                <li class=' bg-[#EF6363] w-[22px] h-[22px] rounded-sm '></li>
                <p class='font-Fredoka  text-md ml-2 mt-1 text-white'>Disconnected({{$dc}})</p>
            </ul>
            <ul class='flex items-center'>
                <li class=' bg-[#EFC063] w-[22px] h-[22px] rounded-sm '></li>
                <p class='font-Fredoka  text-md ml-2 mt-1 text-white'>Destination Net Unreachable({{$dnu}})</p>
            </ul>
            <ul class='flex items-center'>
                <li class=' bg-[#E4EF63] w-[22px] h-[22px] rounded-sm '></li>
                <p class='font-Fredoka  text-md ml-2 mt-1 text-white'>Destination Host Unreachable({{$dhu}})</p>
            </ul>
            <ul class='flex items-center'>
                <li class=' bg-[#9E9E9E] w-[22px] h-[22px] rounded-sm '></li>
                <p class='font-Fredoka  text-md ml-2 mt-1 text-white'>Request Timed out({{$rto}})</p>
            </ul>
            
        </div>
    </div>
</div>

@endif


