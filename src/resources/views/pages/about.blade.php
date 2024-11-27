@extends('layouts.app')

@section('content')
    
<section class="container mx-auto px-4 py-12 text-center">
    <h2 class="text-4xl font-bold text-purple-400 mb-6">Bem-vindo ao RPG World</h2>
    <p class="text-lg text-gray-300 mb-8">
        Explore um mundo repleto de aventuras, batalhas épicas e amizades forjadas no calor da batalha. 
        Em nosso RPG, cada jogador tem a chance de se tornar uma lenda. Seja você um guerreiro corajoso, um mago 
        sábio ou um ladino astuto, há espaço para sua história!
    </p>
    <img src="https://picsum.photos/600/300" alt="Arte do RPG" class="rounded-lg shadow-lg mx-auto mb-8">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Card 1 -->
        <div class="bg-gray-800 rounded-lg shadow-lg p-6">
            <h3 class="text-xl font-semibold text-pink-400 mb-4">Missão</h3>
            <p class="text-gray-300">
                Criar um ambiente imersivo para jogadores explorarem suas histórias, evoluírem seus personagens
                e viverem aventuras épicas.
            </p>
        </div>
        <!-- Card 2 -->
        <div class="bg-gray-800 rounded-lg shadow-lg p-6">
            <h3 class="text-xl font-semibold text-pink-400 mb-4">Visão</h3>
            <p class="text-gray-300">
                Tornar-se o maior jogo de RPG online com foco na comunidade, criatividade e inovação contínua.
            </p>
        </div>
        <!-- Card 3 -->
        <div class="bg-gray-800 rounded-lg shadow-lg p-6">
            <h3 class="text-xl font-semibold text-pink-400 mb-4">Valores</h3>
            <p class="text-gray-300">
                Respeito, trabalho em equipe e diversão são o coração do RPG World. Jogamos juntos, crescemos juntos!
            </p>
        </div>
    </div>
</section>

@endsection 
