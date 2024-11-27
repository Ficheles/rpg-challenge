<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\BalancingService;
use App\Models\Player;
use Illuminate\Http\Request;


class GuildController extends Controller
{
    protected $balanceService;

    public function __construct(BalancingService $balanceService)
    {
        $this->balanceService = $balanceService;
    }

    public function formGuilds(Request $request)
    {
        $request->validate([
            'number_of_guilds' => 'required|integer|min:1',
        ]);

        $playersConfirmed = Player::where('confirmed', true)->get();
        $guilds = $this->balanceService->balanceGuilds($playersConfirmed, $request->input('number_of_guilds'));

        return response()->json($guilds);        
    }
}