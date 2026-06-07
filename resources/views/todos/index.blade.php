@extends('layouts.app')

@section('title', 'Mes todos')

@section('content')
    <main class="max-w-2xl mx-auto px-4 py-12">

        {{-- En-tête : titre + bouton "créer" --}}
        <header class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-2xl font-semibold text-gray-900">Mes todos</h1>
                <p class="text-sm text-gray-500 mt-1">{{ $todos->count() }} tâches · {{ $doneCount }} terminée</p>
            </div>

            <a href="{{ route('todos.create') }}"
                class="inline-flex items-center gap-2 bg-gray-900 text-white text-sm font-medium px-4 py-2 rounded-lg hover:bg-gray-700 transition">
                + Nouvelle todo
            </a>
        </header>

        {{-- Liste des todos --}}
        <ul class="bg-white rounded-xl shadow-sm border border-gray-200 divide-y divide-gray-200">

            @foreach ($todos as $todo)
                <li class="flex items-center gap-4 px-5 py-4">
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

                    <div class="flex-1">
                        <div class="flex items-center gap-2">
                            <a href="{{ route('todos.show', ['todo' => $todo->id]) }}"
                                class="text-gray-800 hover:underline">{{ $todo->name }}</a>


                            @if ($todo->comments_count > 0)
                            <a href="{{ route('todos.show', ['todo' => $todo->id]) }}" class="ml-auto">
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 text-xs font-medium rounded-full bg-slate-200/50 text-gray-600 border border-slate-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="oklch(55.4% 0.046 257.417)" class="size-3.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 0 1 .778-.332 48.294 48.294 0 0 0 5.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                    </svg>
                                    <span class="text-slate-400">{{ $todo->comments_count }}</span>
                                </span>
                            </a>
                            @endif
                        </div>
                        @if ($todo->description)
                            <p class="text-sm text-gray-400 mt-0.5 italic pl-4">{{ $todo->description }}</p>
                        @endif
                    </div>

                    <div class="flex items-center gap-2">
                        <a href="{{ route('todos.edit', ['todo' => $todo->id]) }}"
                            class="text-sm text-gray-600 hover:text-gray-900 px-3 py-1 rounded-md hover:bg-gray-100 transition">
                            Modifier
                        </a>
                        <form action="{{ route('todos.destroy', ['todo' => $todo->id]) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-sm text-red-600 hover:text-red-700 px-3 py-1 rounded-md hover:bg-red-50 transition">
                                Supprimer
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach

        </ul>

    </main>
@endsection
