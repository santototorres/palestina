@extends('layouts.public')
@section('title', 'Palestina SI - Shop')
@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h2 class="text-3xl font-bold mb-8 text-center">Shop / Merch</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Products -->
        <div class="bg-white rounded-lg shadow-sm border p-4 text-center">
            <div class="h-48 bg-gray-200 mb-4 rounded flex items-center justify-center">T-Shirt W01</div>
            <h3 class="font-bold">Ref: W01</h3>
            <p class="text-gray-600 mb-4">CHF 20.-</p>
            <a href="{{ route('shop.request') }}?ref=w01" class="btn btn-secondary w-full text-sm">Ordina</a>
        </div>
        <!-- other products -->
    </div>
</div>
@endsection