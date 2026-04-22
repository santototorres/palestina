<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Palestina SI')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
    
    <!-- CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-900 bg-gray-50 flex flex-col min-h-screen">
    
    <!-- Navigation -->
    <header class="bg-white shadow-sm sticky top-0 z-50" x-data="{ mobileMenuOpen: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('home') }}" class="text-xl font-bold tracking-tight text-p-black">
                            Palestina <span class="text-p-red">SÌ</span>
                        </a>
                    </div>
                    <nav class="hidden md:ml-6 md:flex md:space-x-8">
                        <a href="{{ route('home') }}#form" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                            {{ __('messages.home') }}
                        </a>
                        <a href="{{ route('sign.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-p-red text-sm font-medium text-gray-900">
                            {{ __('messages.download') }}
                        </a>
                        <!-- Add other links based on translations -->
                    </nav>
                </div>
                
                <!-- Language Selector -->
                <div class="hidden md:flex items-center">
                    <div class="relative ml-3" x-data="{ langOpen: false }">
                        <div>
                            <button @click="langOpen = !langOpen" type="button" class="flex text-sm font-medium text-gray-500 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-p-red" id="language-menu-button" aria-expanded="false" aria-haspopup="true">
                                {{ strtoupper(app()->getLocale()) }}
                                <svg class="ml-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                        
                        <div x-show="langOpen" @click.away="langOpen = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="language-menu-button" tabindex="-1" style="display: none;">
                            <div class="py-1" role="none">
                                <a href="/it{{ Str::after(request()->getRequestUri(), '/' . app()->getLocale()) }}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Italiano</a>
                                <a href="/fr{{ Str::after(request()->getRequestUri(), '/' . app()->getLocale()) }}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Français</a>
                                <a href="/de{{ Str::after(request()->getRequestUri(), '/' . app()->getLocale()) }}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Deutsch</a>
                                <a href="/rm{{ Str::after(request()->getRequestUri(), '/' . app()->getLocale()) }}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Romantsch</a>
                                <a href="/en{{ Str::after(request()->getRequestUri(), '/' . app()->getLocale()) }}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">English</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Mobile menu button -->
                <div class="-mr-2 flex items-center md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-p-red" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg x-show="!mobileMenuOpen" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg x-show="mobileMenuOpen" class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile menu -->
        <div x-show="mobileMenuOpen" class="md:hidden" id="mobile-menu" style="display: none;">
            <div class="pt-2 pb-3 space-y-1">
                <a href="{{ route('home') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800">Home</a>
                <a href="{{ route('sign.index') }}" class="bg-red-50 border-p-red text-p-red block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Download</a>
            </div>
            <div class="pt-4 pb-3 border-t border-gray-200">
                <div class="flex items-center px-4">
                    <span class="text-base font-medium text-gray-800">Language</span>
                </div>
                <div class="mt-3 space-y-1">
                    <a href="/it{{ Str::after(request()->getRequestUri(), '/' . app()->getLocale()) }}" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Italiano</a>
                    <a href="/fr{{ Str::after(request()->getRequestUri(), '/' . app()->getLocale()) }}" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Français</a>
                    <!-- others omitted for brevity -->
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-p-black text-white py-12 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-1 md:col-span-2">
                    <h2 class="text-2xl font-bold mb-4">Palestina <span class="text-p-red">SÌ</span></h2>
                    <p class="text-gray-400 max-w-md">Iniziativa popolare federale per il riconoscimento dello Stato di Palestina. Un atto di giustizia, coerenza e pace.</p>
                </div>
                <div>
                    <h3 class="text-sm font-semibold tracking-wider uppercase mb-4 text-gray-300">Social</h3>
                    <ul class="space-y-2">
                        <li><a href="https://www.instagram.com/palestina_si/" class="text-gray-400 hover:text-white transition-colors" target="_blank" rel="noopener">Instagram</a></li>
                        <li><a href="https://www.youtube.com/@PalestinaSi" class="text-gray-400 hover:text-white transition-colors" target="_blank" rel="noopener">YouTube</a></li>
                        <li><a href="https://www.tiktok.com/@palestina_si" class="text-gray-400 hover:text-white transition-colors" target="_blank" rel="noopener">TikTok</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold tracking-wider uppercase mb-4 text-gray-300">Contatto</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('contact') }}" class="text-gray-400 hover:text-white transition-colors">Contattaci</a></li>
                        <li><a href="mailto:info@palestinasi.ch" class="text-gray-400 hover:text-white transition-colors">info@palestinasi.ch</a></li>
                        <li><a href="{{ route('resources') }}" class="text-gray-400 hover:text-white transition-colors">Press & Media</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-12 pt-8 border-t border-gray-800 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-500 text-sm">© {{ date('Y') }} Palestina Sì – Iniziativa popolare federale. All Rights Reserved.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="text-gray-500 hover:text-white text-sm">Privacy</a>
                    <a href="#" class="text-gray-500 hover:text-white text-sm">Imprint</a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
