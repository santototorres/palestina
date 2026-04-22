@extends('layouts.admin')
@section('header_title', $title ?? 'Gestione Dati')
@section('content')
<div class="bg-white rounded-lg shadow-sm">
    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
        <div class="flex space-x-2">
            <input type="text" placeholder="Cerca..." class="form-input text-sm py-1">
            <select class="form-input text-sm py-1">
                <option>Tutti gli stati</option>
                <option>Nuovo</option>
            </select>
        </div>
        <button class="btn btn-secondary text-sm py-1 px-3">Esporta CSV</button>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b-2 border-gray-200 bg-gray-50 text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 border-b-2 border-gray-200 bg-gray-50 text-xs font-semibold text-gray-600 uppercase tracking-wider">Data</th>
                    <th class="px-6 py-3 border-b-2 border-gray-200 bg-gray-50 text-xs font-semibold text-gray-600 uppercase tracking-wider">Nome</th>
                    <th class="px-6 py-3 border-b-2 border-gray-200 bg-gray-50 text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 border-b-2 border-gray-200 bg-gray-50 text-xs font-semibold text-gray-600 uppercase tracking-wider">Azioni</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 border-b border-gray-200 text-sm">#1001</td>
                    <td class="px-6 py-4 border-b border-gray-200 text-sm">22/04/2026</td>
                    <td class="px-6 py-4 border-b border-gray-200 text-sm">Mario Rossi</td>
                    <td class="px-6 py-4 border-b border-gray-200 text-sm"><span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">New</span></td>
                    <td class="px-6 py-4 border-b border-gray-200 text-sm"><a href="#" class="text-p-red hover:underline">Vedi Dettagli</a></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="px-6 py-4 border-t border-gray-200">
        <!-- Pagination Placeholder -->
        Paginazione (1 di 1)
    </div>
</div>
@endsection