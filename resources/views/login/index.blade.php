<form action="{{ route('users.index')}}" method="GET">
    @csrf
    Email: <br> <input type="email" name="email"> <br>
    Senha: <br> <input type="password" name="password"> <br>

    <button type="submit"> Entrar </button>
</form>
