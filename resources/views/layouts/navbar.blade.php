{{-- <div>
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <button id="mobileMenuButton" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                        </svg>
                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <div class="flex-1 flex items-center justify-between sm:items-stretch sm:justify-between">
                    <div class="flex-shrink-0">
                        <a href="/dashboard" class="text-2xl font-bold text-gray-900">NetMonitoring</a>
                    </div>
                    <div class="hidden sm:flex sm:space-x-4">
                        <a href="/dashboard" class="text-gray-900 px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>
                        <a href="/list-monitoring" class="text-gray-900 px-3 py-2 rounded-md text-sm font-medium">List Monitoring</a>
                        @if(Auth::user()->role == 'admin')
                        <a href="/blok" class="text-gray-900 px-3 py-2 rounded-md text-sm font-medium">Block</a>
                        <a href="/ipAddress" class="text-gray-900 px-3 py-2 rounded-md text-sm font-medium">IP</a>
                        <a href="/logger" class="text-gray-900 px-3 py-2 rounded-md text-sm font-medium">Log</a>
                        @endif
                        <div class="relative">
                            <button id="profileButton" class="flex items-center text-gray-900 px-3 py-2 rounded-md text-sm font-medium focus:outline-none">
                                {{Auth::user()->name}}
                                <svg class="ml-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            <div id="profileDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 ring-1 ring-black ring-opacity-5">
                                <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                                <form action="/logout" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="sm:hidden" id="mobileMenu">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="/dashboard" class="text-gray-900 block px-3 py-2 rounded-md text-base font-medium">Dashboard</a>
                <a href="/list-monitoring" class="text-gray-900 block px-3 py-2 rounded-md text-base font-medium">List Monitoring</a>
                @if(Auth::user()->role == 'admin')
                <a href="/blok" class="text-gray-900 block px-3 py-2 rounded-md text-base font-medium">Block</a>
                <a href="/ipAddress" class="text-gray-900 block px-3 py-2 rounded-md text-base font-medium">IP</a>
                <a href="/logger" class="text-gray-900 block px-3 py-2 rounded-md text-base font-medium">Log</a>
                @endif
                <a id="profileMobileButton" href="#" class="text-gray-900 block px-3 py-2 rounded-md text-base font-medium">Profile</a>
                <div id="profileMobileDropdown" class="hidden px-2 pt-2 pb-3 space-y-1">
                    <a href="/profile" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-100">Profile</a>
                    <form action="/logout" method="POST">
                        @csrf
                        @method('DELETE')
                        <button  class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-100">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    
</div> --}}


