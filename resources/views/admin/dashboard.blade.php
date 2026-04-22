@extends('layouts.admin')
@section('header_title', 'Dashboard Overview')
@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    <!-- Stat cards placeholder -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h3 class="text-gray-500 text-sm font-medium">Nuove Richieste Posta</h3>
        <p class="text-3xl font-bold mt-2">12</p>
    </div>
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h3 class="text-gray-500 text-sm font-medium">Formulari Caricati</h3>
        <p class="text-3xl font-bold mt-2">5</p>
    </div>
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h3 class="text-gray-500 text-sm font-medium">Nuovi Volontari</h3>
        <p class="text-3xl font-bold mt-2">8</p>
    </div>
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h3 class="text-gray-500 text-sm font-medium">Richieste Shop</h3>
        <p class="text-3xl font-bold mt-2">3</p>
    </div>
</div>

<div class="bg-white rounded-lg shadow-sm">
    <div class="px-6 py-4 border-b border-gray-200">
        <h2 class="text-lg font-medium text-gray-800">Attività Recente</h2>
    </div>
    <div class="p-6 text-gray-500">
        Nessuna attività da mostrare.
    </div>
</div>
@endsection