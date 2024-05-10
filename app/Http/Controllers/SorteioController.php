<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Player; // Importe o modelo de Jogador se necessário

class SorteioController extends Controller
{

    public function index()
    {
        return view('sorteio.index');
    }

    public function sortear(Request $request)
{
    $numeroJogadoresPorTime = $request->input('numero_jogadores');

    // Selecionar todos os jogadores disponíveis no banco de dados
    $jogadoresDisponiveis = Player::where('goalkeeper', 0)
        ->where('confirmacao', 1) // Apenas jogadores confirmados
        ->orderBy('level', 'desc')
        ->get();

    // Selecionar todos os goleiros disponíveis no banco de dados
    $goleirosDisponiveis = Player::where('goalkeeper', 1)->get();

    // Verificar se há jogadores e goleiros suficientes para formar times
    if ($jogadoresDisponiveis->count() >= ($numeroJogadoresPorTime - 1) * 2 && $goleirosDisponiveis->count() >= 2) {
        // Embaralhar a lista de jogadores disponíveis e de goleiros
        $jogadoresDisponiveis = $jogadoresDisponiveis->shuffle();
        $goleirosDisponiveis = $goleirosDisponiveis->shuffle();

        // Selecionar um goleiro para cada time
        $goleiroTime0 = $goleirosDisponiveis->pop();
        $goleiroTime1 = $goleirosDisponiveis->pop();

        // Selecionar os jogadores de linha para cada time
        $jogadoresTime0 = $jogadoresDisponiveis->splice(0, $numeroJogadoresPorTime - 1); // Subtrair 1 para incluir o goleiro
        $jogadoresTime1 = $jogadoresDisponiveis->splice(0, $numeroJogadoresPorTime - 1);

        // Adicionar os goleiros aos times
        $times[0] = collect([$goleiroTime0])->merge($jogadoresTime0);
        $times[1] = collect([$goleiroTime1])->merge($jogadoresTime1);

        $todosJogadores = Player::all();
        $jogadoresTimes = collect($times[0] ?? [])->merge($times[1] ?? []);
        $jogadoresNaoSelecionados = $todosJogadores->diff($jogadoresTimes);

        return view('resultado_sorteio', ['times' => $times, 'jogadoresNaoSelecionados' => $jogadoresNaoSelecionados]);
    } else {
        return redirect()->back()->withErrors(['message' => 'Não há jogadores ou goleiros suficientes para formar dois times diferentes.']);
    }
}







}