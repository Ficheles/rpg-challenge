<!-- Adicione Alpine.js no seu layout principal -->
@extends('layouts.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

<!-- Adicione Alpine.js no seu layout principal -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

<div class="flex items-center space-x-4">
    <!-- Texto que explica o que está acontecendo -->
    <span class="text-lg font-semibold">Confirmar Player</span>
    
    <!-- Slide Button -->
    <label for="confirmPlayer" class="relative inline-block w-16 mr-2 align-middle select-none transition duration-200 ease-in">
        <input type="checkbox" id="confirmPlayer" class="toggle__checkbox absolute opacity-0 w-0 h-0" />
        <span class="toggle__line block w-10 h-6 bg-gray-300 rounded-full"></span>
        <span class="toggle__dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition transform duration-200"></span>
    </label>

    <!-- Indicador visual -->
    <span class="text-sm toggle__status text-red-500">
        Não confirmado
    </span>
</div>

<!-- Script para realizar uma ação quando o estado do switch mudar -->
<script>
    // Adiciona o evento ao elemento input
    document.addEventListener('DOMContentLoaded', function () {
        const toggleButton = document.querySelector('.toggle__checkbox');
        const statusText = document.querySelector('.toggle__status');
        const toggleDot = document.querySelector('.toggle__dot');
        const playerId = 123; // ID do player, substitua com o valor real

        // Verifica o estado inicial do slide button
        toggleButton.addEventListener('change', function () {
            const isChecked = toggleButton.checked;

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

            // Faz a requisição à API para atualizar o status do player
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
                console.log(data);
                // Aqui você pode tratar a resposta da API, como mostrar um feedback para o usuário
            })
            .catch(error => {
                console.error('Erro ao confirmar player:', error);
            });
        });
    });
</script>

@endsection