@extends('layouts.public')
@section('title', 'Palestina SI - Richiedi per Posta')
@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12" x-data="{ step: 1 }">
    <div class="wizard-container p-8">
        <h2 class="text-2xl font-bold mb-6 text-center">Richiedi il Formulario per Posta</h2>
        
        <div x-show="step === 1">
            <p class="mb-4">Inserisci i tuoi dati personali.</p>
            <input type="text" placeholder="Nome" class="form-input mb-4">
            <input type="text" placeholder="Cognome" class="form-input mb-4">
            <input type="email" placeholder="Email" class="form-input mb-4">
            <button @click="step = 2" class="btn btn-primary w-full">Avanti</button>
        </div>
        
        <div x-show="step === 2" style="display: none;">
            <p class="mb-4">Dove dobbiamo spedirlo?</p>
            <input type="text" placeholder="Indirizzo (Via)" class="form-input mb-4">
            <input type="text" placeholder="Numero Civico" class="form-input mb-4">
            <div class="flex gap-4 mb-4">
                <input type="text" placeholder="CAP" class="form-input w-1/3">
                <input type="text" placeholder="Città" class="form-input w-2/3">
            </div>
            <button @click="step = 3" class="btn btn-primary w-full">Avanti</button>
        </div>
        
        <div x-show="step === 3" style="display: none;">
            <p class="mb-4">Dettagli finali</p>
            <label class="block mb-2">Quanti formulari desideri ricevere?</label>
            <input type="number" value="1" min="1" max="50" class="form-input mb-6">
            <label class="flex items-center mb-6">
                <input type="checkbox" class="mr-2">
                <span class="text-sm">Ho capito che dovrò firmare fisicamente il modulo e rispedirlo.</span>
            </label>
            <button @click="step = 4" class="btn btn-primary w-full">Conferma Richiesta</button>
        </div>
        
        <div x-show="step === 4" class="text-center" style="display: none;">
            <div class="text-green-600 mb-4"><svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></div>
            <h3 class="text-xl font-bold mb-2">Richiesta Inviata!</h3>
            <p class="mb-6">Ti spediremo il formulario al più presto.</p>
            <a href="{{ route('home') }}" class="btn btn-secondary">Torna alla Home</a>
        </div>
    </div>
</div>
@endsection