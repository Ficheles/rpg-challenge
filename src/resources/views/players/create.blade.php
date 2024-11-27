@extends('layouts.app')

@section('content')

    <main class="flex-grow flex items-center justify-center py-12 mt-8">
        <section class="w-full max-w-lg bg-gray-800 rounded-lg shadow-lg p-8">
            <h2 class="text-3xl font-bold text-center text-purple-400 mb-6">Cadastrar Novo Player</h2>
            
            <form action="/api/v1/players" method="POST" class="space-y-6" id="player-form">
                <!-- CSRF Token -->
                @csrf

                <!-- Nome -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Nome do Player</label>
                    <input type="text" id="name" name="name" required 
                        class="w-full p-3 rounded-lg bg-gray-700 border border-gray-600 text-white focus:ring-2 focus:ring-purple-400 focus:outline-none" 
                        placeholder="Digite o nome do player">
                    @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror    
                </div>

                <!-- Classe -->
                <div>
                    <label for="class" class="block text-sm font-medium text-gray-300 mb-2">Classe</label>
                    <select id="class" name="class_id" required 
                        class="w-full p-3 rounded-lg bg-gray-700 border border-gray-600 text-white focus:ring-2 focus:ring-purple-400 focus:outline-none">
                        <option value="">Selecione a classe</option>
                        @foreach ($classes as $classe)
                        <option value="{{ $classe->id }}">{{ $classe->name }}</option>
                        @endforeach
                    </select>

                    @error('class')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Experiência -->
                <div>
                    <label for="experience" class="block text-sm font-medium text-gray-300 mb-2">Experiência (XP)</label>
                    <input type="number" id="experience" name="xp" required min="0"
                        class="w-full p-3 rounded-lg bg-gray-700 border border-gray-600 text-white focus:ring-2 focus:ring-purple-400 focus:outline-none"
                        placeholder="Digite a quantidade de XP">

                    @error('class')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Guilda -->
                <div>
                    <label for="guild" class="block text-sm font-medium text-gray-300 mb-2">Guilda</label>
                    <input type="text" id="guild_" name="guild_id" 
                        class="w-full p-3 rounded-lg bg-gray-700 border border-gray-600 text-white focus:ring-2 focus:ring-purple-400 focus:outline-none"
                        placeholder="Digite o nome da guilda (opcional)"  value="{{ old('guild_id') }}" >
                    
                    @error('guild_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror                        
                </div>

                <!-- Botão -->
                <div class="text-center">
                    <button type="submit" 
                        class="w-full p-3 bg-purple-600 hover:bg-purple-700 rounded-lg font-semibold text-white shadow-lg transition duration-200">
                        Cadastrar Player
                    </button>
                </div>
            </form>
        </section>
    </main>
@endsection

@push('scripts')
    <script src="{{ asset('js/playerForm.js') }}"></script>
@endpush