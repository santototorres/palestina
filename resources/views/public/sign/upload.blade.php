@extends('layouts.public')
@section('title', 'Palestina SI - Carica Documento')
@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="wizard-container p-8 text-center">
        <h2 class="text-2xl font-bold mb-4">Carica Documento Amministrativo</h2>
        <div class="bg-red-50 border-l-4 border-p-red p-4 mb-6 text-left">
            <p class="text-sm text-red-700"><strong>Attenzione:</strong> Questo modulo NON sostituisce l'invio fisico. Carica qui i documenti solo per fini amministrativi o di verifica interna.</p>
        </div>
        <input type="file" class="form-input mb-4">
        <button class="btn btn-primary w-full">Carica File</button>
    </div>
</div>
@endsection