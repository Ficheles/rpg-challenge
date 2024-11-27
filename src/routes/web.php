<?php

use App\Models\Guild;
use App\Models\Player;
use App\Models\RpgClass;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuildController;


Route::get('/', function () {
    return view('pages.home');
});

Route::get('/sobre', function () {
    return view('pages.about');
});

Route::get('/cadastre-se', function() {

    $classes = RpgClass::all();

    return view('players.create', compact('classes'));
});


Route::get('/ranking', function () {

    $players = Player::with(['class', 'guild'])->orderBy('xp', 'desc')->get();

    return view('players.player-table', compact('players'));
});

Route::get('/guildas', function () {

    $guilds = Guild::with(['topPlayer'])->withCount('players')->withSum('players', 'xp')->get();
    
    return view('guilds.guild-card', compact( 'guilds'));
});


Route::get('/guilda/{guild}/players', [GuildController::class, 'showPlayers'])->name('guild.players');



Route::get('/organizar', function () {
    $confirmedPlayers = Player::where('confirmed', true)->count();

    return view('guilds.create-guilds', compact('confirmedPlayers'));
});

Route::get('test', function (){
    $confirmed = true;
    return view('pages.test', compact('confirmed'));
});