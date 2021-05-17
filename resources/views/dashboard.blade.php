<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--Bootsrap 4 CDN-->
        <script src="https://kit.fontawesome.com/cf02f69314.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row no-gutter mt-5">
                <div class="col-md-1 col-lg-1">
                </div>
                <div class="col-md-10 col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            <button class="btn btn-success" onclick="modalNovoEvento()">Cadastrar Evento</button>
                        </div>
                        <div class="card-body">
                            <p>Listagem de eventos</p>
                            <table id="table-eventos" class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 5%" scope="col">ID</th>
                                        <th style="width: 20%" scope="col">Titulo</th>
                                        <th style="width: 20%" scope="col">Projeto</th>
                                        <th style="width: 15%" scope="col">Usuario</th>
                                        <th style="width: 10%" scope="col">Data</th>
                                        <th style="width: 15%" scope="col">Valor</th>
                                        <th style="width: 15%" scope="col">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="card-body">
                            <a class="small" href="{{url('logout')}}">Deslogar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

@include('eventos.modal.novoEvento')
@include('eventos.modal.apagarEvento')
@include('eventos.modal.editarEvento')
@include('despesas.modal.novaDespesa')
@include('despesas.modal.listaDespesas')
@include('despesas.modal.deletarDespesa')


<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/eventos/index.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/despesas/index.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/geral.js') }}"></script>