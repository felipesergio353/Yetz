<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Jogadores</title>
    <!-- Adicione o link para o CSS do Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos Personalizados */
        .table-responsive {
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Listagem de Jogadores</h1>
        <a href="{{ route('players.create') }}" class="btn btn-primary mb-3">Cadastrar Novo Jogador</a>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Nível</th>
                        <th scope="col">Goleiro</th>
                        <th scope="col">Confirmar Presença</th>
                        <th scope="col">Desconfirmar Presença</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($players as $player)
                        <tr>
                            <td>{{ $player->name }}</td>
                            <td>{{ $player->level }}</td>
                            <td>{{ $player->goleiro ? 'Sim' : 'Não' }}</td>
                            <td>
                                @if($player->confirmacao === 1)
                                    <button type="button" class="btn btn-success" disabled>Confirmado</button>
                                @else
                                    <form action="{{ route('players.confirmar-presenca', $player->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="confirmacao" value="1">
                                        <button type="submit" class="btn btn-info">Confirmar</button>
                                    </form>
                                @endif
                            </td>
                            <td>
                                @if($player->confirmacao === 1)
                                    <form action="{{ route('players.confirmar-presenca', $player->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="confirmacao" value="0">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que não irá comparecer?')">Desconfirmar</button>
                                    </form>
                                @else
                                    <span style='font-weight:bold' class="text-danger">Não irá comparecer</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Adicione o link para o JavaScript do Bootstrap e outros scripts necessários -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>