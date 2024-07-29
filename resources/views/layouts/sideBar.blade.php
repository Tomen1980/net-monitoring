<div class= 'absolute flex flex-col z-0 left-0 mt-24  bg-[#222D32] w-[20%] h-screen p-6'>
    <div class=' mt-6 bg-[rgb(63,81,89)] w-[100%] h-[80px] rounded-xl'>
        <img src="" alt="">
    </div>
    <div class='flex flex-row w-full  '>
        <input type="text" placeholder="Search" class=" placeholder:font-Fredoka p-4 placeholder:text-xl placeholder:text-white placeholder:font-medium bg-[#3F5159] w-[80%] h-[45px] rounded-l-xl outline-none mt-8">
        <div class ='flex bg-[#3F5159] w-[20%] h-[45px] rounded-r-xl mt-8'>
            <img src="img/kaca gede.png" alt="" class='p-2'>
        </div>
    </div>
    <p class='text-[#4E6772] mt-8 font-medium font-Fredoka text-lg'>Main Menu</p>
    <div class='flex flex-col mt-3'>
        <a href="/ListBlok" class='flex flex-row w-full hover:bg-[#3F5159] rounded-lg p-1'>
            <div class='flex'> 
                <img src='img/menu.png' alt="" class='w-[35px] h-[35px] ml-2'>
            </div>
            <p class='text-white ml-4 font-medium text-xl mt-1 font-Fredoka'>List Blok</p>
        </a>
        <div class='flex flex-row w-full hover:bg-[#3F5159] rounded-lg p-1 mt-3'> 
            <div class='flex'>
                <img src='img/setting-3.png' alt="" class='w-[35px] h-[35px] ml-2'>
            </div>
            <p class='text-white ml-4 font-medium text-xl mt-1 font-Fredoka'>Pengaturan</p>
            <button id="dropdownButton" class='bg-[#D9D9D9] w-[35px] h-[25px] rounded-lg  absolute right-10 mt-1' >
                <img id ="dropdownIcon" src='img/triangle.png' alt="" class='h-[10px] w-[17px] ml-2 transition duration-300'>
            </button>
        </div>
        <div class='flex bg-[#222D32] rounded-lg absolute-top-0 w-full '>
            
            <ul id='dropdown' class=' font-Fredoka  w-full hidden '>
                <li class='flex flex-row w-[100%] h-[45px] hover:bg-[#5A6D77] rounded-lg p-2'>
                    <a href="/#" class='text-[#8699AD] font-medium text-xl ml-14 '>Log Laporan E-mail</a>
                </li>
                <li class='flex flex-row w-[100%] h-[45px] hover:bg-[#5A6D77] rounded-lg p-2'>
                    <a href="/#" class='text-[#8699AD] font-medium text-xl ml-14 '>Tambah Blok</a>
                </li>
                <li class='flex flex-row w-[100%] h-[45px] hover:bg-[#5A6D77] rounded-lg p-2'>
                    <a href="/#" class='text-[#8699AD] font-medium text-xl ml-14 '>Tambah IP</a>
                </li>
            </ul>
        </div>
        <form action="/logout" method="POST">
            @csrf
            @method('DELETE')
            <button class='flex flex-row w-full hover:bg-[#3F5159] rounded-lg p-1 mt-3'>
                <img src='img/logout.png' alt="" class='w-[35px] h-[35px] ml-1'>
                <p class='text-[#E16F6F] ml-4 font-medium text-xl mt-1 font-Fredoka'>Logout</p>
            </button>
        </form>
    </div>
        
    
</div>

<script defer>
    document.addEventListener('DOMContentLoaded', () => {
        const profileButton = document.getElementById('dropdownButton');
        const profileDropdown = document.getElementById('dropdown');

        dropdownButton.addEventListener('click', () => {
            dropdown.classList.toggle('hidden');
            dropdownIcon.classList.toggle('rotate-180');
        });
    });
</script>
    





