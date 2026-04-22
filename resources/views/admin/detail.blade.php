@extends('layouts.admin')
@section('header_title', $title ?? 'Dettaglio Record')
@section('content')
<div class="mb-4 flex space-x-2">
    <a href="#" class="btn btn-secondary py-1 px-3 text-sm">Indietro</a>
</div>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 space-y-6">
        <div class="bg-white rounded-lg shadow-sm p-6">
            <h2 class="text-lg font-medium border-b pb-2 mb-4">Informazioni Principali</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <span class="text-xs text-gray-500 uppercase">Nome Completo</span>
                    <p class="font-medium">Mario Rossi</p>
                </div>
                <div>
                    <span class="text-xs text-gray-500 uppercase">Email</span>
                    <p class="font-medium">mario@example.com</p>
                </div>
            </div>
        </div>
    </div>
    <div class="space-y-6">
        <div class="bg-white rounded-lg shadow-sm p-6">
            <h2 class="text-lg font-medium border-b pb-2 mb-4">Gestione Stato</h2>
            <form>
                <select class="form-input mb-4 text-sm">
                    <option>New</option>
                    <option>In Progress</option>
                    <option>Closed</option>
                </select>
                <textarea class="form-input mb-4 text-sm" placeholder="Nota di cambio stato (opzionale)" rows="2"></textarea>
                <button class="btn btn-primary w-full text-sm py-2">Aggiorna Stato</button>
            </form>
        </div>
        <div class="bg-white rounded-lg shadow-sm p-6">
            <h2 class="text-lg font-medium border-b pb-2 mb-4">Timeline</h2>
            <ul class="space-y-4 relative before:absolute before:inset-0 before:ml-2 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-slate-300 before:to-transparent">
                <li class="relative">
                    <div class="text-xs font-semibold text-gray-500">22/04 10:00</div>
                    <div class="text-sm">Creato (Stato: New)</div>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection