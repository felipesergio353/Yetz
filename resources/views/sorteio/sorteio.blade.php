<form action="{{ route('sorteio.sortear') }}" method="post">
    @csrf
    <input type="number" name="numero_jogadores" min="1" max="10">
    <button type="submit">Sortear Times</button>
</form>