<!DOCTYPE html>
<html>

<head>
    <title>Registration Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/register/style.css') }}">
</head>

<body>
    <div class="row">
        <div class="col col-md-4">
            <div class="card">
                <h3 class="mt-4">Cadastrar</h3>
                <form action="{{url('registrar')}}" method="POST" id="regForm">
                    {{ csrf_field() }}
                    <div class="form-label-group mt-3">
                        <input type="text" id="inputName" name="nome" placeholder="a" autocomplete="off" class="form-control" autofocus>
                        <label for="inputName">Nome</label>
                        @if ($errors->has('nome'))
                        <span class="error">{{ $errors->first('nome') }}</span>
                        @endif
                    </div>
                    <div class="form-label-group mt-3">
                        <input type="email" name="email" id="inputEmail" placeholder="a" autocomplete="off" class="form-control">
                        <label for="inputEmail">E-mail</label>
                        @if ($errors->has('email'))
                        <span class="error">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-label-group mt-3">
                        <input type="text" name="telefone" id="inputTelefone" placeholder="a" autocomplete="off" class="form-control">
                        <label for="inputTelefone">Telefone</label>
                        @if ($errors->has('telefone'))
                        <span class="error">{{ $errors->first('telefone') }}</span>
                        @endif
                    </div>
                    <div class="form-label-group mt-3">
                        <input type="password" name="senha" id="inputPassword" placeholder="a" autocomplete="off" class="form-control">
                        <label for="inputPassword">Senha</label>
                        @if ($errors->has('senha'))
                        <span class="error">{{ $errors->first('senha') }}</span>
                        @endif
                    </div>
                    <div class="form-label-group mt-3">
                        <input type="password" name="re-senha" id="inputRePassword" placeholder="a" autocomplete="off" class="form-control">
                        <label for="inputRePassword">Repetir Senha</label>
                        @if ($errors->has('re-senha'))
                        <span class="error">{{ $errors->first('resenha') }}</span>
                        @endif
                    </div>
                    <div class="col-md-12 mt-4">
                        <button class="btn-cadastrar" type="submit">Cadastrar</button>
                    </div>
                    <div class="text-center mb-3">
                        <b>Já possui uma conta?</b> <br>
                        <a class="small font-weight-bold" href="{{url('login')}}">Entrar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
