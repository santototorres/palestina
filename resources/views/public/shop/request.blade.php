@extends('layouts.public')
@section('title', 'Palestina SI - Ordina Merch')
@section('content')
<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-12" x-data="{
    ref: new URLSearchParams(window.location.search).get('ref') || '',
    size: 'M',
    lang: 'IT',
    qty: 1,
    name: '',
    generateWhatsapp() {
        const text = `Ciao, vorrei ordinare la maglietta.
Modello: ${this.ref}
Taglia: ${this.size}
Lingua: ${this.lang}
Quantità: ${this.qty}
Nome: ${this.name}`;
        window.open('https://wa.me/41000000000?text=' + encodeURIComponent(text), '_blank');
    }
}">
    <h2 class="text-3xl font-bold mb-8 text-center">Ordina T-Shirt</h2>
    <div class="wizard-container p-8">
        <p class="mb-4">Compila per generare il messaggio WhatsApp</p>
        <input type="text" x-model="ref" placeholder="Referenza Prodotto (es. W01)" class="form-input mb-4">
        <input type="text" x-model="size" placeholder="Taglia (es. M)" class="form-input mb-4" readonly>
        <select x-model="lang" class="form-input mb-4">
            <option value="IT">Italiano</option>
            <option value="FR">Français</option>
            <option value="DE">Deutsch</option>
        </select>
        <input type="number" x-model="qty" placeholder="Quantità" class="form-input mb-4">
        <input type="text" x-model="name" placeholder="Il tuo nome" class="form-input mb-6">
        <button @click="generateWhatsapp()" class="btn btn-primary w-full bg-green-600 border-green-600 hover:bg-green-700">Continua su WhatsApp</button>
    </div>
</div>
@endsection