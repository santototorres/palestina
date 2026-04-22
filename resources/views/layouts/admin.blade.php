<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Palestina SI - Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <aside class="w-64 bg-gray-900 text-white flex flex-col h-full">
        <div class="h-16 flex items-center px-6 font-bold text-xl border-b border-gray-800">
            Palestina <span class="text-p-red ml-1">SÌ</span> Admin
        </div>
        <nav class="flex-1 overflow-y-auto py-4">
            <ul class="space-y-1">
                <li><a href="#" class="block px-6 py-2 hover:bg-gray-800 {{ request()->is('admin') ? 'bg-gray-800 border-l-4 border-p-red text-white' : 'text-gray-400' }}">Dashboard</a></li>
                <li class="px-6 mt-4 mb-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">Operazioni</li>
                <li><a href="#" class="block px-6 py-2 text-gray-400 hover:bg-gray-800 hover:text-white">Richieste Posta</a></li>
                <li><a href="#" class="block px-6 py-2 text-gray-400 hover:bg-gray-800 hover:text-white">Upload Formulari</a></li>
                <li><a href="#" class="block px-6 py-2 text-gray-400 hover:bg-gray-800 hover:text-white">Volontari</a></li>
                <li><a href="#" class="block px-6 py-2 text-gray-400 hover:bg-gray-800 hover:text-white">Contatti</a></li>
                <li><a href="#" class="block px-6 py-2 text-gray-400 hover:bg-gray-800 hover:text-white">Richieste Shop</a></li>
                <li><a href="#" class="block px-6 py-2 text-gray-400 hover:bg-gray-800 hover:text-white">Donazioni</a></li>
                
                <li class="px-6 mt-4 mb-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">Sistema</li>
                <li><a href="#" class="block px-6 py-2 text-gray-400 hover:bg-gray-800 hover:text-white">Utenti e Ruoli</a></li>
                <li><a href="#" class="block px-6 py-2 text-gray-400 hover:bg-gray-800 hover:text-white">Log Attività</a></li>
            </ul>
        </nav>
        <div class="p-4 border-t border-gray-800">
            <div class="flex items-center">
                <div class="flex-1">
                    <p class="text-sm font-medium text-white">Admin User</p>
                    <a href="#" class="text-xs text-gray-400 hover:text-white">Logout</a>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col h-full overflow-hidden">
        <!-- Header -->
        <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-6">
            <h1 class="text-xl font-semibold text-gray-800">@yield('header_title', 'Dashboard')</h1>
        </header>

        <!-- Main section -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
            @yield('content')
        </main>
    </div>
</body>
</html>