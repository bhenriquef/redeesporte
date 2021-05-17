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
        <link rel="stylesheet" type="text/css" href="{{url('style.css')}}">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="d-none d-md-flex col-md-4 col-lg-4 bg-image">
                </div>
                <div class="col-md-4 col-lg-4 card mt-5" style="box-shadow: 0px 0px 6px 2px rgba(0, 0, 0, 0.1)">
                    <div class="login d-flex align-items-center py-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-9 col-lg-8 mx-auto">
                                    <h3 class="login-heading mb-4 text-center">Registrar</h3>
                                    <form action="{{url('registrar')}}" method="POST" id="regForm">
                                        {{ csrf_field() }}
                                        <div class="form-label-group mt-3">
                                            <label for="inputName">Nome</label>
                                            <input type="text" id="inputName" name="nome" class="form-control" placeholder="Nome Completo" autofocus>
                                            @if ($errors->has('nome'))
                                            <span class="error">{{ $errors->first('nome') }}</span>
                                            @endif       
                                        </div> 
                                        <div class="form-label-group mt-3">
                                            <label for="inputEmail">E-mail</label>
                                            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Endereço de E-mail" >
                                            @if ($errors->has('email'))
                                            <span class="error">{{ $errors->first('email') }}</span>
                                            @endif    
                                        </div>
                                        <div class="form-label-group mt-3">
                                            <label for="inputPassword">Telefone</label>
                                            <input type="password" name="telefone" id="inputPassword" class="form-control" placeholder="Telefone">
                                            @if ($errors->has('telefone'))
                                            <span class="error">{{ $errors->first('telefone') }}</span>
                                            @endif  
                                        </div> 
                                        <div class="form-label-group mt-3">
                                            <label for="inputPassword">Senha</label>
                                            <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha">
                                            @if ($errors->has('senha'))
                                            <span class="error">{{ $errors->first('senha') }}</span>
                                            @endif  
                                        </div>
                                        <div class="form-label-group mt-3">
                                            <label for="inputPassword">Repetir Senha</label>
                                            <input type="password" name="re-senha" id="inputRePassword" class="form-control" placeholder="Repetir Senha">
                                            @if ($errors->has('re-senha'))
                                            <span class="error">{{ $errors->first('resenha') }}</span>
                                            @endif  
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-success btn-login font-weight-bold ml-auto mr-auto mt-4 pl-5 pr-5 d-block mb-2" type="submit">Cadastrar</button>
                                        </div>
                                        <div class="text-center">
                                            Já possuí uma conta? <br>
                                            <a class="small" href="{{url('login')}}">Entrar</a>
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