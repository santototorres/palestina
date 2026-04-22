@extends('layouts.public')
@section('title', 'Palestina SI - Home')
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="text-center">
        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
            Stiamo raccogliendo le firme per <span class="text-p-red">l'iniziativa popolare federale</span>
        </h1>
        <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
            Un atto di giustizia. Una richiesta di dignità. Una voce dalla Svizzera per la Palestina.
        </p>
        <div class="mt-5 max-w-md mx-auto sm:flex sm:justify-center md:mt-8">
            <div class="rounded-md shadow">
                <a href="{{ route('sign.index') }}" class="btn btn-primary w-full text-lg px-8 py-4">Firma L'iniziativa</a>
            </div>
            <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
                <a href="#dona" class="btn btn-secondary w-full text-lg px-8 py-4">Fai una donazione</a>
            </div>
        </div>
    </div>
</div>
@endsection