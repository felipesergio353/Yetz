<!-- resultado_sorteio.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Resultado do Sorteio</h1>
        
        @if (isset($times) && count($times) > 0)
            @foreach ($times as $index => $time)
                <div class="time">
                    <h2>Time {{ $index + 1 }}</h2>
                    <ul>
                        @foreach ($time as $jogador)
                            <li>{{ $jogador['nome'] }} (Nível {{ $jogador['nivel'] }})</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        @else
            <p>Nenhum time sorteado.</p>
        @endif
    </div>
@endsection