@extends('layouts.app')

@section('content')

    <div class="max-w-7xl mx-auto mt-8 mb-16">
        <h1 class="text-2xl font-bold text-center mb-6">Players Rank</h1>
        <div class="overflow-x-auto shadow-md sm:rounded-lg border-2 border-rpg-border bg-gradient-to-br from-rpg-card-dark to-rpg-card-light backdrop-blur-sm">
            <table class="min-w-full text-sm text-left text-gray-400">
                <thead class="bg-gray-800 text-gray-200">
                    <tr class="border-b-2 border-rpg-border/30">
                        <th scope="col" class="px-6 py-3">Player</th>
                        <th scope="col" class="px-6 py-3">Classe</th>
                        <th scope="col" class="px-6 py-3">Experience</th>
                        <th scope="col" class="px-6 py-3">Guilda</th>
                        <th scope="col" class="px-6 py-3">Confirmado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($players as $player)
                        <tr class="bg-gray-800 hover:bg-gray-700 transition border-b border-rpg-border/30 hover:bg-rpg-primary/10 transition-colors">
                            <td class="px-6 py-4 flex items-center space-x-3">
                                <img src="https://picsum.photos//48" alt="{{ $player['name'] }}" class="w-10 h-10 rounded-full">
                                <div>
                                    <p class="font-medium text-white">{{ $player['name'] }}</p>
                                    <p class="text-sm">{{ $player['level'] }}</p>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="bg-purple-600 text-white text-xs font-semibold px-2 py-1 rounded">{{ $player['class']['name'] }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <p>{{ $player['xp'] }} XP</p>
                                <div class="w-full bg-gray-800 rounded-full h-2 mt-1">
                                    <div class="bg-pink-600 h-2 rounded-full" style="width: {{ $player['xp'] }}%;"></div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-purple-400">{{ $player['guild']['name'] ?? '⚪' }}</td>
                            <td>
                              <div class="flex ">
                                <label for="check-{{ $player->id }}" class="bg-gray-400 flex items-center cursor-pointer relative w-12 h-6 px-1 rounded-full">
                                  <input type="checkbox" id="check-{{ $player->id }}" data-id="{{ $player->id }}" class="sr-only peer" {{ $player['confirmed'] ? 'checked' : '' }}>
                                  <span class="w-2/5 h-4/5 bg-pink-500 absolute rounded-full  peer-checked:bg-purple-700 peer-checked:left-6 transition-all duration-500"></span>
                                </label>
                              </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection


@push('scripts')
    <script src="{{ asset('js/playerConfirm.js') }}"></script>
@endpush
