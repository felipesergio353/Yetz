<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inclusão de Jogador</title>
    <!-- Adicione o link para o CSS do Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Inclusão de Jogador</h1>
        <!-- Formulário de Inclusão de Jogadores -->
        <form action="{{ route('players.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="level">Nível (1 a 5):</label>
                <input type="number" class="form-control" id="level" name="level" min="1" max="5" required>
            </div>
            <div class="form-group">
                <label for="goalkeeper">É Goleiro?</label>
                <select class="form-control" id="goalkeeper" name="goalkeeper" required>
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar Jogador</button>
            <a href="{{ route('players.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <!-- Adicione o link para o JavaScript do Bootstrap e outros scripts necessários -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>