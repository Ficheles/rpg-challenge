<!-- resources/views/guild/players.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="flex justify-between items-center">

        <h1 class="text-3xl font-bold mb-4">Jogadores da Guilda: {{ $guild->name }}</h1>
        <a href="/guildas"
        class="inline-block bg-purple-500 hover:bg-purple-700 text-white font-semibold py-1 px-2 rounded-lg shadow-md transition duration-200 mr-8"
         >
        Voltar
    </a>
    </div>
    
    <!-- Verifique se a guilda tem jogadores -->
    @if($guild->players->isEmpty())
        <p class="text-lg text-gray-600">Esta guilda não tem jogadores registrados.</p>
    @else
        <!-- Tabela de jogadores -->

        
                
        <div class="overflow-x-auto shadow-md sm:rounded-lg border-2 border-rpg-border bg-gradient-to-br from-rpg-card-dark to-rpg-card-light backdrop-blur-sm">
          <table class="min-w-full text-sm text-left text-gray-400">
            <thead class="bg-gray-800 text-gray-200">
              <tr class="border-b-2 border-rpg-border/30">
                    <th class="py-3 px-6 border-b text-left text-sm font-semibold">Player</th>
                    <th class="py-3 px-6 border-b text-left text-sm font-semibold">Classe</th>
                    <th class="py-3 px-6 border-b text-left text-sm font-semibold">XP</th>
                    <th class="py-3 px-6 border-b text-left text-sm font-semibold">Cadastro</th>
                    <th class="py-3 px-6 border-b text-left text-sm font-semibold">Confirmado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($guild->players as $player)
                <tr class="bg-gray-800 hover:bg-gray-700 transition border-b border-rpg-border/30 hover:bg-rpg-primary/10 transition-colors">
                    <td class="px-6 py-4 flex items-center space-x-3">
                      <img src="https://picsum.photos/48/48" alt="{{ $player['name'] }}" class="w-10 h-10 rounded-full">
                      <div>
                        <p class="font-medium text-white">{{ $player['name'] }}</p>
                        <p class="text-sm">{{ $player['level'] }}</p>
                      </div>
                    </td>
                    <td class="py-3 px-6  text-sm text-white">
                    <span class="bg-purple-600 text-white text-xs font-semibold px-2 py-1 rounded">{{ $player->class->name ?? 'Desconhecido' }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <p>{{ $player['xp'] }} XP</p>
                        <div class="w-full bg-gray-800 rounded-full h-2 mt-1">
                            <div class="bg-pink-600 h-2 rounded-full" style="width: {{ $player['xp'] }}%;"></div>
                        </div>
                    </td>
                    <td class="py-3 px-6  text-sm text-white">{{ $player->created_at->format('d/m/Y') }}</td>
                    <td class="py-3 px-6  text-sm text-white">
                      <label for="confirmPlayer-{{ $player->id }}" class="relative inline-block w-16 mr-2 align-middle select-none transition duration-200 ease-in">
                        <input type="checkbox" id="confirmPlayer-{{ $player->id }}" class="toggle__checkbox absolute opacity-0 w-0 h-0" data-id="{{ $player->id }}" {{ $player->confirmed ? 'checked' : '' }} />
                        <span class="toggle__line block w-10 h-6 bg-gray-300 rounded-full"></span>
                        <span class="toggle__dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition transform duration-200"></span>
                      </label>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    @endif

    
    <a
        href="/guildas"
        class="inline-block bg-purple-500 hover:bg-purple-700 text-white font-semibold py-1 px-2 rounded-lg shadow-md transition duration-200 mt-8 float-right mr-8"
         >
        Voltar
    </a>
</div>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Seleciona todos os slides de confirmação
        const toggleButtons = document.querySelectorAll('.toggle__checkbox');

        toggleButtons.forEach(toggleButton => {
            // Evento para monitorar as mudanças no slide
            toggleButton.addEventListener('change', function () {
                const playerId = toggleButton.getAttribute('data-id');
                const isChecked = toggleButton.checked;
                const toggleDot = toggleButton.nextElementSibling.querySelector('.toggle__dot');
                const statusText = toggleButton.closest('.flex').querySelector('span.text-sm');

                // Atualiza a interface
                if (isChecked) {
                    toggleDot.classList.add('translate-x-4', 'bg-green-400');
                    toggleDot.classList.remove('translate-x-0', 'bg-red-400');
                    statusText.classList.remove('text-red-500');
                    statusText.classList.add('text-green-500');
                    statusText.innerText = 'Confirmado';
                } else {
                    toggleDot.classList.add('translate-x-0', 'bg-red-400');
                    toggleDot.classList.remove('translate-x-4', 'bg-green-400');
                    statusText.classList.remove('text-green-500');
                    statusText.classList.add('text-red-500');
                    statusText.innerText = 'Não confirmado';
                }

                // Envia a requisição à API para atualizar o estado do player
                fetch(`/api/players/${playerId}/confirm`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Inclua o token CSRF para garantir a segurança
                    },
                    body: JSON.stringify({ confirmed: isChecked })
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Player status atualizado:', data);
                })
                .catch(error => {
                    console.error('Erro ao confirmar player:', error);
                });
            });
        });
    });
</script>