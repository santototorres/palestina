@extends('layouts.public')
@section('title', 'Palestina SI - Contatti')
@section('content')
<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h2 class="text-3xl font-bold mb-8">Contattaci</h2>
    <form class="space-y-4 bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
        <input type="text" placeholder="Nome completo" class="form-input">
        <input type="email" placeholder="Email" class="form-input">
        <input type="text" placeholder="Oggetto" class="form-input">
        <textarea rows="5" placeholder="Messaggio" class="form-input"></textarea>
        <button type="submit" class="btn btn-primary w-full">Invia Messaggio</button>
    </form>
</div>
@endsection