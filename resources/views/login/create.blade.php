
<form action="{{ route('users.store')}}" method="POST">
    @csrf
    Nome: <br> <input type="text" name="name"> <br>
    Email: <br> <input type="email" name="email"> <br>
    Senha: <br> <input type="password" name="password"> <br>
    Confirmação da Senha: <br> <input type="password" name="confirmPassword"> <br>

    <button type="submit"> Cadastrar </button>
</form>
