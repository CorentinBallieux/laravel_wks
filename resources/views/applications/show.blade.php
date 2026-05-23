@extends('layouts.app')

@section('title', 'Détails de la candidature')

@section('content')
    <main class="max-w-2xl mx-auto px-4 py-12">

        <header class="mb-8">
            <a href="{{ route('applications.index') }}" class="text-sm text-gray-500 hover:text-gray-800 transition">← Retour à la liste</a>
            <h1 class="text-2xl font-semibold text-gray-900 mt-2">Détails de la candidature</h1>
        </header>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-5">

            <div>
                <p class="text-sm font-medium text-gray-500">Entreprise</p>
                <p class="text-gray-900 mt-1">Acme Corp</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Poste</p>
                <p class="text-gray-900 mt-1">Développeur full-stack</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Statut</p>
                <p class="mt-2">
                    <span class="inline-flex items-center px-2 py-0.5 text-xs font-medium rounded-full bg-amber-100 text-amber-800">Entretien</span>
                </p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Postulée le</p>
                <p class="text-gray-900 mt-1 tabular-nums">12 mai 2026</p>
            </div>

            <div class="flex items-center gap-3 pt-4 border-t border-gray-200">
                <a href="{{ route('applications.edit', ['application' => 1]) }}"
                   class="bg-gray-900 text-white text-sm font-medium px-4 py-2 rounded-lg hover:bg-gray-700 transition">
                    Modifier
                </a>

                <form action="{{ route('applications.destroy', ['application' => 1]) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="text-sm text-red-600 hover:text-red-700 px-3 py-2 rounded-md hover:bg-red-50 transition">
                        Supprimer
                    </button>
                </form>
            </div>

        </div>

        {{-- Notes (relation one-to-many : une candidature a plusieurs notes) --}}
        <section class="mt-6 bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

            <header class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900">Notes</h2>
                <span class="text-sm text-gray-500">2 notes</span>
            </header>

            <ul class="divide-y divide-gray-200">

                <li class="flex items-start gap-3 px-5 py-4">
                    <div class="flex-1">
                        <p class="text-gray-800">Premier contact avec le recruteur, équipe sympa.</p>
                        <p class="text-xs text-gray-500 mt-1">il y a 2 jours</p>
                    </div>
                    <form action="{{ route('applications.notes.destroy', ['application' => 1, 'note' => 1]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="text-sm text-red-600 hover:text-red-700 px-3 py-1 rounded-md hover:bg-red-50 transition">
                            Supprimer
                        </button>
                    </form>
                </li>

                <li class="flex items-start gap-3 px-5 py-4">
                    <div class="flex-1">
                        <p class="text-gray-800">Test technique demandé, à rendre avant vendredi.</p>
                        <p class="text-xs text-gray-500 mt-1">hier</p>
                    </div>
                    <form action="{{ route('applications.notes.destroy', ['application' => 1, 'note' => 2]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="text-sm text-red-600 hover:text-red-700 px-3 py-1 rounded-md hover:bg-red-50 transition">
                            Supprimer
                        </button>
                    </form>
                </li>

            </ul>

            <form action="{{ route('applications.notes.store', ['application' => 1]) }}" method="POST"
                  class="px-5 py-4 border-t border-gray-200 space-y-3">
                @csrf
                <textarea name="content" rows="2"
                          placeholder="Ajouter une note…"
                          class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-gray-900"></textarea>
                <div class="flex justify-end">
                    <button type="submit"
                            class="bg-gray-900 text-white text-sm font-medium px-4 py-2 rounded-lg hover:bg-gray-700 transition">
                        Publier
                    </button>
                </div>
            </form>

        </section>

    </main>
@endsection
