@extends('layouts.app')

@section('content')

<div
    class="rounded-lg overflow-hidden border border-indigo-500 hover:border-pink-500 shadow-lg bg-indigo-800 transition-transform transform hover:scale-105"
  >
    <img :src="player.image" alt="Player Image" class="w-full h-40 object-cover" />
    <div class="p-4">
      {{ $guilds }}
    </div>
  </div>


@endsection
