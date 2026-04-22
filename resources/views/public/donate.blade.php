@extends('layouts.public')
@section('title', 'Palestina SI - Fai una Donazione')
@section('content')
<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 text-center" id="dona">
        <h2 class="text-3xl font-bold mb-6">Fai una Donazione</h2>
        <p class="text-lg text-gray-600 mb-8">Il tuo supporto è fondamentale per portare avanti l'iniziativa.</p>
        <div class="mb-8">
            <!-- QR Placeholder -->
            <div class="w-48 h-48 bg-gray-200 mx-auto flex items-center justify-center rounded-lg border-2 border-gray-300">QR Code</div>
        </div>
        <div class="bg-gray-50 p-4 rounded-lg inline-block text-left">
            <p class="text-sm text-gray-500 mb-1">IBAN per bonifico:</p>
            <p class="font-mono font-bold text-lg">CH 050 0774 0105 2036 7100</p>
        </div>
    </div>
</div>
@endsection