<?php
namespace App\Http\Controllers;

use App\Models\Guild;
use Illuminate\Http\Request;

class GuildController extends Controller
{
    public function showPlayers($guildId)
    {
        // Encontre a guilda pelo ID, incluindo os jogadores relacionados
        $guild = Guild::with('players')->findOrFail($guildId);

        // Passar a guilda e os jogadores para a view
        return view('guilds.players', compact('guild'));
    }
}
