<!DOCTYPE html>
<html>
    <head>
        <title>Login Form</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--Bootsrap 4 CDN-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="{{url('style.css')}}">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="d-none d-md-flex col-md-5 col-lg-5 bg-image">
                </div>
                <div class="col-md-2 col-lg-2 card mt-5" style="box-shadow: 0px 0px 6px 2px rgba(0, 0, 0, 0.1)">
                    <div class="login d-flex align-items-center py-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 mx-auto">
                                    <h3 class="login-heading mb-4 text-center">Bem Vindo</h3>
                                    <form action="{{url('login')}}" method="POST" id="logForm">
                                        {{ csrf_field() }}
                                        <div class="form-label-group">
                                            <label for="inputEmail">E-mail</label>
                                            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Endereço de E-mail" >
                                            @if ($errors->has('email'))
                                                <span class="error">{{ $errors->first('email') }}</span>
                                            @endif    
                                        </div> 
                                        <div class="form-label-group mt-2">
                                            <label for="inputPassword">Senha</label>
                                            <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="senha">
                                            @if ($errors->has('password'))
                                                <span class="error">{{ $errors->first('senha') }}</span>
                                            @endif  
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-primary btn-login pl-5 pr-5 mt-4 ml-auto mr-auto d-block font-weight-bold mb-2" type="submit">Entrar</button>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <a class="small" href="{{url('registrar')}}">Cadastrar</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>