@extends('layouts.app')

@section('title', 'Détails de la todo')

@section('content')
    <main class="max-w-2xl mx-auto px-4 py-12">

        <header class="mb-8">
            <a href="{{ route('todos.index') }}" class="text-sm text-gray-500 hover:text-gray-800 transition">← Retour à la liste</a>
            <h1 class="text-2xl font-semibold text-gray-900 mt-2">Détails de la todo</h1>
        </header>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-5">

            <div>
                <p class="text-sm font-medium text-gray-500">Nom</p>
                <p class="text-gray-900 mt-1 pl-4">{{ $todo->name }}</p>
            </div>

            {{-- Bloc description --}}
            <div>
                <p class="text-sm font-medium text-gray-500">Description</p>
                @if ($todo->description)
                    <p class="text-gray-400 mt-1 italic pl-4">{{ $todo->description }}</p>
                @else
                    <p class="text-sm text-gray-400 mt-1 italic pl-4">Aucune description.</p>
                @endif
            </div>            

            <div>
                <p class="text-sm font-medium text-gray-500">Statut</p>
                <div class="mt-2 flex items-center gap-2">
                    <form action="{{ route('todos.toggle', ['todo' => $todo->id]) }}" method="POST" class="shrink-0">
                        @csrf
                        @method('PATCH')
                        @if ($todo->completed_at === null)
                            <button type="submit" title="Marquer comme terminée"
                                class="h-5 w-5 rounded-full border-2 border-gray-300 hover:border-gray-500 transition cursor-pointer"></button>
                        @else
                            <button type="submit" title="Marquer comme à faire"
                                class="h-5 w-5 rounded-full bg-green-500 border-2 border-green-500 hover:bg-green-600 hover:border-green-600 transition cursor-pointer flex items-center justify-center">
                                <svg class="h-3 w-3 text-white" viewBox="0 0 12 12" fill="none">
                                    <path d="M2 6l3 3 5-6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </button>
                        @endif
                    </form>
                    <span class="text-gray-800">À faire</span>
                </div>
            </div>

            <div class="flex items-center gap-3 pt-4 border-t border-gray-200">
                    
                <a href="{{ route('todos.edit', ['todo' => $todo->id]) }}"   class="bg-gray-900 text-white text-sm font-medium px-4 py-2 rounded-lg hover:bg-gray-700 transition">
                    Modifier
                </a>

                <form action="{{ route('todos.destroy', ['todo' => $todo->id]) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="text-sm text-red-600 hover:text-red-700 px-3 py-2 rounded-md hover:bg-red-50 transition">
                        Supprimer
                    </button>
                </form>
            </div>

        </div>

        {{-- Commentaires (relation one-to-many : un todo a plusieurs commentaires) --}}
        <section class="mt-6 bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

            <header class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900">Commentaires</h2>
                @if ($comments->count() > 0)
                    <span class="text-sm text-gray-500">{{ $comments->count() }} commentaires</span>
                @endif
            </header>

            <ul class="divide-y divide-gray-200">
                @foreach ($comments as $comment)
                    <li class="flex items-start gap-3 px-5 py-4">
                        <div class="flex-1">
                            <p class="text-gray-800">{{ $comment->content }}</p>
                            <p class="text-xs text-gray-500 mt-1 pl-3">{{ $comment->created_at->translatedFormat('d F Y à H:i') }}</p>
                        </div>
                    <form action="{{ route('todos.comments.destroy', ['todo' => $todo->id, 'comment' => $comment->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="text-sm text-red-600 hover:text-red-700 px-3 py-1 rounded-md hover:bg-red-50 transition">
                            Supprimer
                        </button>
                    </form>
                    </li>
                @endforeach
            </ul>

            <form action="{{ route('todos.comments.store', ['todo' => $todo->id]) }}" method="POST"
                  class="px-5 py-4 border-t border-gray-200 space-y-3">
                @csrf
                <textarea name="content" rows="2" required
                          placeholder="Ajouter un commentaire…"
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
