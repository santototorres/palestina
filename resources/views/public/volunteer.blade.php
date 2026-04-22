@extends('layouts.public')
@section('title', 'Palestina SI - Vuoi Aiutare?')
@section('content')
<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-12" x-data="{ step: 1 }">
    <h2 class="text-3xl font-bold mb-8 text-center">Vuoi Aiutare?</h2>
    <div class="wizard-container p-8">
        <div x-show="step === 1">
            <p class="mb-4">Come vorresti aiutarci?</p>
            <select class="form-input mb-6">
                <option>Raccolta firme</option>
                <option>Diffusione online</option>
                <option>Organizzazione eventi</option>
                <option>Altro</option>
            </select>
            <button @click="step = 2" class="btn btn-primary w-full">Avanti</button>
        </div>
        <div x-show="step === 2" style="display: none;">
            <p class="mb-4">I tuoi dati</p>
            <input type="text" placeholder="Nome" class="form-input mb-4">
            <input type="email" placeholder="Email" class="form-input mb-4">
            <button @click="step = 3" class="btn btn-primary w-full">Invia Richiesta</button>
        </div>
        <div x-show="step === 3" class="text-center" style="display: none;">
            <h3 class="text-xl font-bold mb-2">Grazie per il tuo supporto!</h3>
            <p class="mb-6">Ti contatteremo presto.</p>
        </div>
    </div>
</div>
@endsection