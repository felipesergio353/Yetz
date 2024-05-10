<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::all();
        return view('players.index', compact('players'));
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'level' => 'required|integer|between:1,5',
        'goalkeeper' => 'required|boolean',
    ]);

    Player::create($request->all());
    
    return redirect()->route('players.index')->with('success', 'Jogador adicionado com sucesso!');
}
public function confirmarPresenca(Request $request, $id)
{
    $jogador = Player::findOrFail($id);
    $jogador->confirmacao = $request->confirmacao;
    $jogador->save();

    return redirect()->route('players.index')->with('success', 'Presença confirmada com sucesso!');
}



    public function create()
{
    return view('players.create');
}
}