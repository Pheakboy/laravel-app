<header class="fixed top-0 w-full z-50 bg-white border-b border-gray-200">
    <nav class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4 lg:px-8" aria-label="Primary">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex items-center gap-2 font-semibold text-gray-900 hover:text-gray-700 transition-colors">
             <img src="./Shop_Logo.png" alt="Shop Logo" class="h-14 w-14 object-contain">
        </a>

        <!-- Desktop Navigation -->
        <div class="hidden md:flex justify-center gap-2">
            <a
                href="{{ route('chirps.index') }}"
                @class([
                    'px-4 py-2 text-sm font-medium rounded-lg transition-colors',
                    'bg-gray-100 text-gray-900' => request()->routeIs('chirps.index', 'home'),
                    'text-gray-600 hover:text-gray-900 hover:bg-gray-50' => !request()->routeIs('chirps.index', 'home'),
                ])
            >
                All Chirps
            </a>
            

            @auth
                <a
                    href="{{ route('chirps.my') }}"
                    @class([
                        'px-4 py-2 text-sm font-medium rounded-lg transition-colors',
                        'bg-gray-100 text-gray-900' => request()->routeIs('chirps.my'),
                        'text-gray-600 hover:text-gray-900 hover:bg-gray-50' => !request()->routeIs('chirps.my'),
                    ])
                >
                    My Chirps
                </a>
                
                <a
                    href="{{ route('chirps.create') }}"
                    class="px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors"
                >
                    New Chirp
                </a>
            @endauth
        </div>
        
        <!-- Auth Links -->
        <div class="hidden md:flex items-center gap-3">
            @auth
                <!-- User Menu -->
                <div class="relative group">
                    <button class="flex items-center cursor-pointer gap-2 px-3 py-2 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                        <div class="h-8 w-8 rounded-full bg-blue-600 flex items-center justify-center text-white text-sm font-medium">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                    </button>
                    
                    <!-- Dropdown -->
                    <div class="absolute right-0 mt-2 w-48 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all">
                        <div class="bg-white rounded-lg shadow-lg border border-gray-200 py-1">
                            <div class="px-4 py-3 border-b border-gray-100 cursor-pointer">
                                <p class="text-sm font-medium text-gray-900">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-gray-500 mt-1">{{ auth()->user()->email }}</p>
                            </div>
                            <form action="{{ route('logout') }}" method="POST" class="p-1">
                                @csrf
                                <button type="submit" class="w-full cursor-pointer text-left px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-md transition-colors">
                                    Sign out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 transition-colors">
                    Sign in
                </a>
                <a href="{{ route('register') }}" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors">
                    Get Started
                </a>
            @endauth
        </div>

        <!-- Mobile Menu Button -->
        <button 
            onclick="toggleMobileMenu()" 
            id="mobile-menu-btn"
            class="md:hidden p-2 text-gray-600 hover:bg-gray-50 rounded-lg transition-colors" 
            aria-label="Toggle menu"
        >
            <svg id="menu-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <svg id="close-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden border-t border-gray-200">
        <div class="px-4 py-4 space-y-1">
            <a href="{{ route('chirps.index') }}" class="block px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">
                All Chirps
            </a>
            
            @auth
                <a href="{{ route('chirps.my') }}" class="block px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">
                    My Chirps
                </a>
                
                <a href="{{ route('chirps.create') }}" class="block px-4 py-3 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors">
                    New Chirp
                </a>

                <div class="border-t border-gray-100 mt-3 pt-3">
                    <div class="flex items-center gap-3 px-4 py-2 mb-2">
                        <div class="h-10 w-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-medium">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-gray-500">{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                    
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-lg transition-colors text-left">
                            Sign out
                        </button>
                    </form>
                </div>
            @else
                <div class="border-t border-gray-100 mt-3 pt-3 space-y-1">
                    <a href="{{ route('login') }}" class="block px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">
                        Sign in
                    </a>
                    <a href="{{ route('register') }}" class="block px-4 py-3 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors">
                        Get Started
                    </a>
                </div>
            @endauth
        </div>
    </div>
</header>

<script>
    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');
        
        menu.classList.toggle('hidden');
        menuIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    }
</script>