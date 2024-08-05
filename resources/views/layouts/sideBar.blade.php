<div class='absolute flex flex-col z-0 left-0 mt-24 bg-[#222D32] w-[20%] h-screen p-6'>
    <div class='mt-6 bg-[rgb(63,81,89)] w-[100%] h-[80px] rounded-xl'>
        <p class ='text-white font-Fredoka text-xl font-medium pl-4 pt-4'>{{Auth::user()->name}}</p>
        <p class ='text-white font-Fredoka text-xl font-medium pl-4 '>{{Auth::user()->role}}</p>
    </div>

    @if (Auth::user()->role == 'admin')
        <p class='text-[#4E6772] mt-8 font-medium font-Fredoka text-lg'>Main Menu</p>
        <div class='flex flex-col mt-3'>
            <a href="/ListBlok" class='flex flex-row w-full hover:bg-[#3F5159] rounded-lg p-1'>
                <div class='flex'>
                    <img src='/img/menu.png' alt="" class='w-[35px] h-[35px] ml-2'>
                </div>
                <p class='text-white ml-4 font-medium text-xl mt-1 font-Fredoka'>List Blok</p>
            </a>
            <div class='flex flex-row w-full hover:bg-[#3F5159] rounded-lg p-1 mt-3'>
                <div class='flex'>
                    <img src='/img/setting-3.png' alt="" class='w-[35px] h-[35px] ml-2'>
                </div>
                <p class='text-white ml-4 font-medium text-xl mt-1 font-Fredoka'>Pengaturan</p>
                <button id="dropdownButton" class='bg-[#D9D9D9] w-[31px] h-[25px] rounded-lg absolute right-10 mt-1 items-center'>
                    <img id="dropdownIcon" src='/img/triangle.png' alt="" class='h-[10px] w-[17px] ml-1.5 transition duration-300'>
                </button>
            </div>
            <div class='flex bg-[#222D32] rounded-lg absolute-top-0 w-full'>
                <ul id='dropdown' class='font-Fredoka w-full overflow-hidden max-h-0 transition-all duration-500 ease-in-out'>
                    <li class='flex flex-row w-[100%] h-[45px] hover:bg-[#5A6D77] rounded-lg p-2'>
                        <a href="/logger" class='text-[#8699AD] font-medium text-xl ml-14'>Log Laporan E-mail</a>
                    </li>
                    <li class='flex flex-row w-[100%] h-[45px] hover:bg-[#5A6D77] rounded-lg p-2'>
                        <a href="/blok/form" class='text-[#8699AD] font-medium text-xl ml-14'>Tambah Blok</a>
                    </li>
                    <li class='flex flex-row w-[100%] h-[45px] hover:bg-[#5A6D77] rounded-lg p-2'>
                        <a href="/ipAddress" class='text-[#8699AD] font-medium text-xl ml-14'>IP Address</a>
                    </li>
                </ul>
            </div>
            <form action="/logout" method="POST">
                @csrf
                @method('DELETE')
                <button class='flex flex-row w-full hover:bg-[#3F5159] rounded-lg p-1 mt-3'>
                    <img src='/img/logout.png' alt="" class='w-[35px] h-[35px] ml-1'>
                    <p class='text-[#E16F6F] ml-4 font-medium text-xl mt-1 font-Fredoka'>Logout</p>
                </button>
            </form>
        </div>
    </div>
@elseif (Auth::user()->role == 'operator')
<p class='text-[#4E6772] mt-8 font-medium font-Fredoka text-lg'>Main Menu</p>
        <div class='flex flex-col mt-3'>
            <a href="/ListBlok" class='flex flex-row w-full hover:bg-[#3F5159] rounded-lg p-1'>
                <div class='flex'>
                    <img src='/img/menu.png' alt="" class='w-[35px] h-[35px] ml-2'>
                </div>
                <p class='text-white ml-4 font-medium text-xl mt-1 font-Fredoka'>List Blok</p>
            </a>
            <a href="/ipAddress" class='flex flex-row w-full hover:bg-[#3F5159] rounded-lg p-1'>
                <div class='flex'>
                    <img src='/img/menu.png' alt="" class='w-[35px] h-[35px] ml-2'>
                </div>
                <p class='text-white ml-4 font-medium text-xl mt-1 font-Fredoka'>IP Address</p>
            </a>
            {{-- <div class='flex flex-row w-full hover:bg-[#3F5159] rounded-lg p-1 mt-3'>
                <div class='flex'>
                    <img src='img/setting-3.png' alt="" class='w-[35px] h-[35px] ml-2'>
                </div>
                <p class='text-white ml-4 font-medium text-xl mt-1 font-Fredoka'>Pengaturan</p>
                <button id="dropdownButton" class='bg-[#D9D9D9] w-[31px] h-[25px] rounded-lg absolute right-10 mt-1 items-center'>
                    <img id="dropdownIcon" src='img/triangle.png' alt="" class='h-[10px] w-[17px] ml-1.5 transition duration-300'>
                </button>
            </div>
            <div class='flex bg-[#222D32] rounded-lg absolute-top-0 w-full'>
                <ul id='dropdown' class='font-Fredoka w-full overflow-hidden max-h-0 transition-all duration-500 ease-in-out'>
                    <li class='flex flex-row w-[100%] h-[45px] hover:bg-[#5A6D77] rounded-lg p-2'>
                        <a href="/logger" class='text-[#8699AD] font-medium text-xl ml-14'>Log Laporan E-mail</a>
                    </li>
                    <li class='flex flex-row w-[100%] h-[45px] hover:bg-[#5A6D77] rounded-lg p-2'>
                        <a href="/blok/form" class='text-[#8699AD] font-medium text-xl ml-14'>Tambah Blok</a>
                    </li>
                    <li class='flex flex-row w-[100%] h-[45px] hover:bg-[#5A6D77] rounded-lg p-2'>
                        <a href="/ipAddress" class='text-[#8699AD] font-medium text-xl ml-14'>Tambah IP</a>
                    </li>
                </ul>
            </div> --}}
            <form action="/logout" method="POST">
                @csrf
                @method('DELETE')
                <button class='flex flex-row w-full hover:bg-[#3F5159] rounded-lg p-1 mt-3'>
                    <img src='/img/logout.png' alt="" class='w-[35px] h-[35px] ml-1'>
                    <p class='text-[#E16F6F] ml-4 font-medium text-xl mt-1 font-Fredoka'>Logout</p>
                </button>
            </form>
        </div>
    </div>
@endif

<script defer>
    document.addEventListener('DOMContentLoaded', () => {
        const dropdownButton = document.getElementById('dropdownButton');
        const dropdown = document.getElementById('dropdown');
        const dropdownIcon = document.getElementById('dropdownIcon');

        dropdownButton.addEventListener('click', () => {
            if (dropdown.classList.contains('max-h-0')) {
                dropdown.classList.remove('max-h-0');
                dropdown.classList.add('max-h-64');  // Adjust max-height based on content size
            } else {
                dropdown.classList.remove('max-h-64');
                dropdown.classList.add('max-h-0');
            }
            dropdownIcon.classList.toggle('rotate-180');
        });
    });
</script>
