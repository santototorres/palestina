@extends('layouts.public')
@section('title', 'Palestina SI - Scarica Formulario')
@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12" x-data="{ step: 1 }">
    <div class="wizard-container p-8">
        <h2 class="text-2xl font-bold mb-6 text-center">Scarica il Formulario</h2>
        
        <div x-show="step === 1" class="text-center">
            <p class="text-lg mb-6">Scaricando il formulario, dovrai stamparlo in formato A4, firmarlo a mano e spedirlo via posta.</p>
            <button @click="step = 2" class="btn btn-primary">Continua</button>
        </div>
        
        <div x-show="step === 2" class="text-center" style="display: none;">
            <p class="text-lg mb-6 text-red-600 font-semibold">Attenzione: La firma digitale NON è valida. Il modulo deve essere firmato fisicamente con una penna.</p>
            <button @click="step = 3" class="btn btn-primary">Ho capito</button>
        </div>
        
        <div x-show="step === 3" class="text-center" style="display: none;">
            <h3 class="font-bold mb-4">Scegli la lingua del formulario:</h3>
            <div class="space-y-4 max-w-sm mx-auto">
                <a href="#" @click="step = 4" class="btn btn-outline-red w-full block">Italiano (PDF)</a>
                <a href="#" @click="step = 4" class="btn btn-outline-red w-full block">Français (PDF)</a>
                <a href="#" @click="step = 4" class="btn btn-outline-red w-full block">Deutsch (PDF)</a>
            </div>
        </div>
        
        <div x-show="step === 4" class="text-center" style="display: none;">
            <div class="text-green-600 mb-4"><svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></div>
            <h3 class="text-xl font-bold mb-2">Download Completato!</h3>
            <p class="mb-6">Ora non ti resta che stampare, firmare e spedire il formulario.</p>
            <a href="{{ route('home') }}" class="btn btn-secondary">Torna alla Home</a>
        </div>
    </div>
</div>
@endsection