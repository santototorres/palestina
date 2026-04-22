@extends('layouts.public')
@section('title', 'Palestina SI - Firma l\'iniziativa')
@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h2 class="text-3xl font-extrabold text-gray-900 text-center mb-8">Come vuoi firmare?</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 flex flex-col items-center text-center">
            <h3 class="text-xl font-bold mb-4">Scarica e Stampa</h3>
            <p class="text-gray-500 mb-6 flex-grow">Scarica il formulario in formato PDF, stampalo a casa, firmalo e spediscilo per posta.</p>
            <a href="{{ route('sign.download') }}" class="btn btn-primary w-full">Scarica ora</a>
        </div>
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 flex flex-col items-center text-center">
            <h3 class="text-xl font-bold mb-4">Ricevi per Posta</h3>
            <p class="text-gray-500 mb-6 flex-grow">Non hai una stampante? Compila i tuoi dati e ti invieremo il formulario direttamente a casa.</p>
            <a href="{{ route('sign.mail-request') }}" class="btn btn-secondary w-full">Richiedi per posta</a>
        </div>
    </div>
</div>
@endsection