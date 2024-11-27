<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Player;
use Illuminate\Http\Request;
use App\Http\Requests\PlayerRequest;

class PlayerController extends Controller
{
    public function index()
    {
        return response()->json(Player::with('class')->get());
    }

    public function store(PlayerRequest $request)
    {
        $validated = $request->validated();

        $player = Player::create( $validated);

        return response()->json($player, 201);
    }

    public function show($id)
    {
        $player = Player::with('class')->findOrFail($id);

        return response()->json($player);
    }

    public function confirm(Request $request, $id)
    {
        $player = Player::findOrFail($id);
        $player->confirmed = $request->input('confirmed');
        $player->save();

        return response()->json(['message' => 'Player atualizado com sucesso!', 'player' => $player]);
    }

    public function update(PlayerRequest $request, $id)
    {
        $validated = $request->validated();

        $player = Player::findOrFail($id);
        $player->update($validated);

        return response()->json($player);
    }

    public function destroy($id)
    {
        Player::destroy($id);

        return response()->json(null, 204);
    }
}