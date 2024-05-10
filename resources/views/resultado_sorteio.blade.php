<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Times de Futebol</title>
    <!-- Adicione os links para os arquivos CSS do Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @if(isset($times[0]) && !empty($times[0]))
                    <div class="card mt-3">
                        <div class="card-body">
                            <h2 class="card-title">Time 1</h2>
                            <ul class="list-group">
                                @foreach($times[0] as $jogador)
                                    <li class="list-group-item">{{ $jogador['name'] }} (Nível {{ $jogador['level'] }})</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                @if(isset($times[1]) && !empty($times[1]))
                    <div class="card mt-3">
                        <div class="card-body">
                            <h2 class="card-title">Time 2</h2>
                            <ul class="list-group">
                                @foreach($times[1] as $jogador)
                                    <li class="list-group-item">{{ $jogador['name'] }} (Nível {{ $jogador['level'] }})</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @else
                    @if(isset($times[0]) && !empty($times[0]))
                        <div class="card mt-3">
                            <div class="card-body">
                                <h2 class="card-title">Time 2</h2>
                                <ul class="list-group">
                                    @foreach($times[0] as $jogador)
                                        <li class="list-group-item">{{ $jogador['name'] }} (Nível {{ $jogador['level'] }})</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                @endif
            </div>
        </div>

        @if($jogadoresNaoSelecionados->isNotEmpty())
            <div class="card mt-4">
                <div class="card-body">
                    <h2 class="card-title">Jogadores Não Selecionados</h2>
                    <ul class="list-group">
                        @foreach($jogadoresNaoSelecionados as $jogador)
                            <li class="list-group-item">{{ $jogador['name'] }} (Nível {{ $jogador['level'] }})</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @else
            <p class="mt-4">Todos os jogadores foram selecionados para um time.</p>
        @endif
    </div>

    <!-- Adicione os scripts do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>