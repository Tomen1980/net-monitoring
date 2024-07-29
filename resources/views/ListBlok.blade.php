@extends('layouts.app')
@section('content')
@include('layouts.header')
@include('layouts.sidebar')

<div class='flex flex-row   mt-36 ml-12 space-x-24'>
    <div class=' flex bg-white w-[750px] h-[80vh] rounded-2xl border-2 drop-shadow-xl'>
        <div class='flex  ml-7 mt-5 h-9 items-center'>
            <img src='img/clipboard-text.png' alt=''class='w-[34px] h-[30px]'>
            <p class='font-Fredoka font-medium text-2xl ml-2 mt-1 text-[#A9A9A9]'>List Blok</p>
        </div>
    </div>
    <div class='flex flex-col bg-[#222D32] w-[300px] h-[40vh] rounded-2xl  border-2 '>
        <div class='flex  ml-5 mt-5 h-9 items-center'>
            <img src='img/chart.png' alt=''class='w-[30px] h-[30px]'>
            <p class='font-Fredoka  text-xl ml-2 mt-1 text-[#7ACEFF]'>Status</p>
        </div>
        <div class=' ml-6 mt-5 space-y-2'>
            <ul class='flex items-center'>
                <li class=' bg-[#93FF81] w-[22px] h-[22px] rounded-sm '></li>
                <p class='font-Fredoka  text-md ml-2 mt-1 text-white'>Connected()</p>
            </ul>
            <ul class='flex items-center'>
                <li class=' bg-[#EF6363] w-[22px] h-[22px] rounded-sm '></li>
                <p class='font-Fredoka  text-md ml-2 mt-1 text-white'>Disconnected()</p>
            </ul>
            <ul class='flex items-center'>
                <li class=' bg-[#EFC063] w-[22px] h-[22px] rounded-sm '></li>
                <p class='font-Fredoka  text-md ml-2 mt-1 text-white'>Destination Net Unreachable()</p>
            </ul>
            <ul class='flex items-center'>
                <li class=' bg-[#E4EF63] w-[22px] h-[22px] rounded-sm '></li>
                <p class='font-Fredoka  text-md ml-2 mt-1 text-white'>Destination Host Unreachable()</p>
            </ul>
            <ul class='flex items-center'>
                <li class=' bg-[#9E9E9E] w-[22px] h-[22px] rounded-sm '></li>
                <p class='font-Fredoka  text-md ml-2 mt-1 text-white'>Request Timed out()</p>
            </ul>
            
        </div>
    </div>
</div>


