<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteio de Times</title>
    <!-- Adicione os links para os arquivos CSS do Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Sortear Times</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('sorteio.sortear') }}" method="POST" id="formSortear">
                            @csrf
                            <div class="form-group">
                                <label for="num_jogadores_por_time">Número de Jogadores por Time:</label>
                                <input type="number" name="numero_jogadores" id="num_jogadores_por_time" class="form-control" min="1" required>
                                <!-- Adicionar um elemento para exibir a mensagem de erro -->
                                <small id="erroJogadores" class="text-danger"></small>
                            </div>
                            <button type="submit" id="btnSortear" class="btn btn-primary">Sortear Times</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Adicione o script JavaScript para validação -->
    <script>
        document.getElementById('formSortear').addEventListener('submit', function(event) {
            // Obter o valor do número de jogadores por time informado pelo usuário
            var numeroJogadoresPorTime = parseInt(document.getElementById('num_jogadores_por_time').value);
            
            // Defina aqui o número real de jogadores disponíveis
            var numeroJogadoresDisponiveis = 50; // Por exemplo, substitua 50 pelo número real de jogadores disponíveis

            // Verificar se há jogadores suficientes
            if (numeroJogadoresDisponiveis < numeroJogadoresPorTime * 2) {
                // Exibir um alerta de erro
                document.getElementById('erroJogadores').innerText = 'Não há jogadores suficientes para o número de jogadores por time informado.';
                // Impedir o envio do formulário
                event.preventDefault();
            } else {
                // Limpar a mensagem de erro caso não haja mais erro
                document.getElementById('erroJogadores').innerText = '';
            }
        });
    </script>

    <!-- Adicione os scripts do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>