@extends('layouts.app')

@section('title', 'Mes candidatures')

@section('content')
    <main class="max-w-2xl mx-auto px-4 py-12">

        {{-- En-tête : titre + bouton "créer" --}}
        <header class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-2xl font-semibold text-gray-900">Mes candidatures</h1>
                <p class="text-sm text-gray-500 mt-1">3 candidatures · 1 en entretien</p>
            </div>

            <a href="{{ route('applications.create') }}"
               class="inline-flex items-center gap-2 bg-gray-900 text-white text-sm font-medium px-4 py-2 rounded-lg hover:bg-gray-700 transition">
                + Nouvelle candidature
            </a>
        </header>

        {{-- Liste des candidatures --}}
        <ul class="bg-white rounded-xl shadow-sm border border-gray-200 divide-y divide-gray-200">

            {{-- Candidature en entretien --}}
            <li class="flex items-center gap-4 px-5 py-4">
                <div class="flex-1 min-w-0">
                    <a href="{{ route('applications.show', ['application' => 1]) }}"
                       class="text-gray-800 hover:underline">Acme Corp</a>
                    <p class="text-sm text-gray-500">Développeur full-stack</p>
                </div>

                <span class="inline-flex items-center px-2 py-0.5 text-xs font-medium rounded-full bg-amber-100 text-amber-800">Entretien</span>
                <span class="text-sm text-gray-500 tabular-nums">12 mai 2026</span>

                <div class="flex items-center gap-2">
                    <a href="{{ route('applications.edit', ['application' => 1]) }}"
                       class="text-sm text-gray-600 hover:text-gray-900 px-3 py-1 rounded-md hover:bg-gray-100 transition">
                        Modifier
                    </a>
                    <form action="{{ route('applications.destroy', ['application' => 1]) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="text-sm text-red-600 hover:text-red-700 px-3 py-1 rounded-md hover:bg-red-50 transition">
                            Supprimer
                        </button>
                    </form>
                </div>
            </li>

            {{-- Candidature postulée --}}
            <li class="flex items-center gap-4 px-5 py-4">
                <div class="flex-1 min-w-0">
                    <a href="{{ route('applications.show', ['application' => 2]) }}"
                       class="text-gray-800 hover:underline">Pixel Labs</a>
                    <p class="text-sm text-gray-500">UX Designer</p>
                </div>

                <span class="inline-flex items-center px-2 py-0.5 text-xs font-medium rounded-full bg-blue-100 text-blue-800">Postulée</span>
                <span class="text-sm text-gray-500 tabular-nums">18 mai 2026</span>

                <div class="flex items-center gap-2">
                    <a href="{{ route('applications.edit', ['application' => 2]) }}"
                       class="text-sm text-gray-600 hover:text-gray-900 px-3 py-1 rounded-md hover:bg-gray-100 transition">
                        Modifier
                    </a>
                    <form action="{{ route('applications.destroy', ['application' => 2]) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="text-sm text-red-600 hover:text-red-700 px-3 py-1 rounded-md hover:bg-red-50 transition">
                            Supprimer
                        </button>
                    </form>
                </div>
            </li>

            {{-- Candidature refusée --}}
            <li class="flex items-center gap-4 px-5 py-4">
                <div class="flex-1 min-w-0">
                    <a href="{{ route('applications.show', ['application' => 3]) }}"
                       class="text-gray-800 hover:underline">Datafleet</a>
                    <p class="text-sm text-gray-500">Data Analyst</p>
                </div>

                <span class="inline-flex items-center px-2 py-0.5 text-xs font-medium rounded-full bg-red-100 text-red-800">Refusée</span>
                <span class="text-sm text-gray-500 tabular-nums">30 avr 2026</span>

                <div class="flex items-center gap-2">
                    <a href="{{ route('applications.edit', ['application' => 3]) }}"
                       class="text-sm text-gray-600 hover:text-gray-900 px-3 py-1 rounded-md hover:bg-gray-100 transition">
                        Modifier
                    </a>
                    <form action="{{ route('applications.destroy', ['application' => 3]) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="text-sm text-red-600 hover:text-red-700 px-3 py-1 rounded-md hover:bg-red-50 transition">
                            Supprimer
                        </button>
                    </form>
                </div>
            </li>

        </ul>

    </main>
@endsection
