@extends('layouts.app')

@section('content')
    <section class="relative text-center bg-cover bg-no-repeat bg-center py-20" style="background-image: url('https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');">
        <div class="bg-black bg-opacity-50 absolute inset-0"></div>
        <div class="relative z-10">
            <h2 class="text-4xl md:text-5xl font-extrabold text-yellow-400 drop-shadow-lg">
                Bem-vindo ao RPG World
            </h2>
            <p class="text-gray-300 text-lg mt-4 max-w-3xl mx-auto">
                Prepare-se para explorar um mundo mágico, desafiar seus inimigos e alcançar a glória. Crie seu herói e viva aventuras épicas!
            </p>
            <div class="mt-8 flex justify-center gap-4">
                <a href="/cadastre-se" class="px-6 py-3 bg-purple-700 text-white font-bold rounded-lg hover:bg-purple-800 transition">
                    Começar agora
                </a>
                <a href="/sobre" class="px-6 py-3 bg-gray-800 text-gray-300 font-bold rounded-lg hover:bg-gray-700 transition">
                    Saiba mais
                </a>
            </div>
        </div>
    </section>

    <section class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto px-4">
            <h3 class="text-3xl font-extrabold text-center text-yellow-400 mb-8">Por que escolher o RPG World?</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="bg-gradient-to-r from-purple-700 to-purple-900 p-6 rounded-lg">
                        <h4 class="text-xl font-bold text-yellow-400">Mundo Imersivo</h4>
                        <p class="mt-2 text-gray-300">Explore reinos incríveis, masmorras perigosas e paisagens mágicas criadas com paixão e detalhes.</p>
                    </div>
                </div>
                <div class="text-center">
                    <div class="bg-gradient-to-r from-purple-700 to-purple-900 p-6 rounded-lg">
                        <h4 class="text-xl font-bold text-yellow-400">Personagens Personalizáveis</h4>
                        <p class="mt-2 text-gray-300">Crie e evolua seu herói com uma vasta seleção de classes, habilidades e equipamentos.</p>
                    </div>
                </div>
                <div class="text-center">
                    <div class="bg-gradient-to-r from-purple-700 to-purple-900 p-6 rounded-lg">
                        <h4 class="text-xl font-bold text-yellow-400">Comunidade Ativa</h4>
                        <p class="mt-2 text-gray-300">Junte-se a milhares de jogadores em batalhas épicas e eventos multiplayer emocionantes.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection 