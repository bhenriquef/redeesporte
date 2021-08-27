<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login/style.css') }}">
</head>

<body>
    <div class="row">
        <div class="col col-md-4">
            <div class="card">
                <form action="{{url('login')}}" method="POST" id="logForm">
                    {{ csrf_field() }}
                    <h3>Bem Vindo</h3>
                    <div class="form-label-group">
                        <input autocomplete="off" type="email" name="email" id="inputEmail" class="form-control" placeholder="E-mail">
                        <label for="inputEmail">Email</label>
                        @if ($errors->has('email'))
                        <span class="error">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-label-group mt-3 mb-3">
                        <input autocomplete="off" type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha">
                        <label for="inputPassword">Senha</label>
                        @if ($errors->has('password'))
                        <span class="error">{{ $errors->first('senha') }}</span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <button class="btn-login" type="submit">Entrar</button>
                        </div>
                    </div>
                    <div class="text-center">
                        <b>Ainda não possui conta?</b> <br>
                        <a class="small font-weight-bold" href="{{url('registrar')}}">Cadastrar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
