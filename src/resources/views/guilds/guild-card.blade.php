@extends('layouts.app') 

@section('content')




<div class="max-w-7xl mx-auto my-8 ">
  <h1 class="text-2xl font-bold text-center mb-6">Guilds</h1>

  
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      @foreach ($guilds as $guild)
      <a href="{{ route('guild.players', $guild->id) }}">
    <div class="player-card group" >
      <div class="relative overflow-hidden rounded-lg">
        <img          
          src="https://picsum.photos/350/220"
          alt="player.name"
          class="w-full h-56 object-cover transform group-hover:scale-105 transition-transform duration-500"
        />

        
        <div class="absolute inset-0 bg-gradient-to-t from-rpg-dark via-transparent to-transparent"></div>
        <div class="absolute bottom-0 left-0 right-0 p-4">
          <h3 class="text-2xl font-bold text-rpg-accent mb-1">{{ $guild['name'] }}</h3>
        </div>
      </div>

      <div class="mt-4 flex gap-4">
        <div class="flex-grow">
          <p class="stat-label">Top Member</p>
          <p class="stat-value">{{ $guild['topplayer']['name'] ?? '🪨'}}</p>
        </div>
        <div>
          <p class="stat-value">
            <span class="text-sm bg-purple-600 text-white px-2 py-1 rounded">
              {{ $guild['players_count' ]}} Members
            </span>
          </p>
        </div>
      </div>

      <div class="mt-4 flex gap-4">
        <div class="flex-grow">
          <p class="stat-value">{{ $guild['topplayer']['class']['name'] ?? '✨'}} </p>
        </div>
        <div>
          <p class="stat-value">
            <span class="text-sm bg-blue-600 text-white px-2 py-1 rounded">
              {{ $guild['topplayer']['xp'] ?? '💥'}} XP
            </span>
          </p>
        </div>
      </div>

      <div class="col-span-2 mt-3">
          <p class="stat-label">Experience</p>
          <div class="relative w-full h-2 bg-rpg-card-dark rounded-full mt-2 overflow-hidden">
            <div
              class="absolute top-0 left-0 h-full bg-gradient-to-r from-pink-700 to-purple-500"
              style="width: 55%"
            ></div>
          </div>
          
          <p class="text-right text-sm text-rpg-muted mt-1">

          {{ $guild['players_sum_xp' ]}}XP
          </p>
        </div>


    </div>
</a>
    @endforeach
  </div>
</div>

@endsection
