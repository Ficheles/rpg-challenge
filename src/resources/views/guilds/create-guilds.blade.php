@extends('layouts.app')

@section('content')
<div class="flex items-center self-center justify-center bg-gray-900 mt-16">
    <div class="bg-gray-800 text-white shadow-lg rounded-lg p-6 w-full max-w-md">
        <h1 class="text-2xl font-bold text-center mb-4">Criar Guildas</h1>

        <!-- Players Confirmados -->
        <div class="bg-gray-700 rounded-lg p-4 mb-8">
            <p class="text-lg">Players Confirmados:</p>
            <h2 class="text-3xl font-bold text-purple-400">{{ $confirmedPlayers }}</h2>
        </div>

        <!-- Formulário -->
        <form action="/api/v1/form-guilds" method="POST" id="create-guilds-form">
            @csrf
            <div class="mb-8">
                <label for="number_of_guilds" class="block text-sm font-medium">Número de Guildas</label>
                <input 
                    type="number" 
                    id="number_of_guilds" 
                    name="number_of_guilds" 
                    min="1"
                    class="mt-1 w-full p-2 bg-gray-900 text-white rounded-lg border border-gray-700 focus:ring-2 focus:ring-purple-500"
                    placeholder="Digite o número de guildas"
                    required
                >
            </div>

            <button 
                type="submit" 
                class="w-full bg-purple-600 hover:bg-purple-500 transition text-white font-semibold py-2 px-4 rounded-lg"
            >
                Criar Guildas
            </button>
        </form>
    </div>
</div>
@endsection


@push('scripts')
    <script src="{{ asset('js/createGuildsForm.js') }}"></script>
@endpush