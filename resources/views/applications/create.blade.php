@extends('layouts.app')

@section('title', 'Nouvelle candidature')

@section('content')
    <main class="max-w-2xl mx-auto px-4 py-12">

        <header class="mb-8">
            <a href="{{ route('applications.index') }}" class="text-sm text-gray-500 hover:text-gray-800 transition">← Retour à la liste</a>
            <h1 class="text-2xl font-semibold text-gray-900 mt-2">Nouvelle candidature</h1>
        </header>

        <form action="{{ route('applications.store') }}" method="POST"
              class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-6">
            @csrf

            <div>
                <label for="company" class="block text-sm font-medium text-gray-700 mb-1">Entreprise</label>
                <input type="text" id="company" name="company"
                       placeholder="Acme Corp"
                       class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-gray-900">
            </div>

            <div>
                <label for="position" class="block text-sm font-medium text-gray-700 mb-1">Poste</label>
                <input type="text" id="position" name="position"
                       placeholder="Développeur full-stack"
                       class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-gray-900">
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Statut</label>
                <select id="status" name="status"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-gray-900">
                    <option value="postulee">Postulée</option>
                    <option value="entretien">Entretien</option>
                    <option value="refusee">Refusée</option>
                    <option value="acceptee">Acceptée</option>
                </select>
            </div>

            <div>
                <label for="applied_at" class="block text-sm font-medium text-gray-700 mb-1">Postulée le</label>
                <input type="date" id="applied_at" name="applied_at"
                       class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-gray-900">
            </div>

            <div class="flex items-center gap-3 pt-2">
                <button type="submit"
                        class="bg-gray-900 text-white text-sm font-medium px-4 py-2 rounded-lg hover:bg-gray-700 transition">
                    Enregistrer
                </button>
                <a href="{{ route('applications.index') }}"
                   class="text-sm text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md hover:bg-gray-100 transition">
                    Annuler
                </a>
            </div>
        </form>

    </main>
@endsection
