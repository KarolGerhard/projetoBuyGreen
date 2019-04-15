@extends('template.app')

@section('content')
    <div class="col-md-6 well">
        <div class="col-md-12">
            <h3>Deseja excluir esse produto?</h3>
            <div style="float: right">
                <a class="btn btn-default" href="{{ url("produtos") }}">
                    <i class="glyphicon glyphicon-chevron-left"></i>
                    &nbsp;Cancelar
                </a>
                <a class="btn btn-danger" href="{{ url("produtos/$produto->id/destroy") }}">
                    <i class="glyphicon glyphicon-remove"></i>
                    &nbsp;Excluir
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-danger">
            <div class="panel-heading">{{ $produto->nome }}</div>
            <div class="panel-body">
                    <p><strong>Informações do produto </strong> <br>
                        <span>Tipo: </span>{{ $produto->tipo }} <br>
                        <span>Data de Validade: </span>{{ $produto->periodoValidade }}<br>
                        <span>Quantidade: </span>{{ $produto->quantidade }}<br>
                        <span>Medida: </span>{{ $produto->tipoUnidade }}<br>
                        <span>Preço: </span>{{ $produto->preco }}
                      </p>
                    
                      @foreach($produto->fornecedores as $fornecedor)
                        <p><strong>Informações do fornecedor </strong><br>
                            <span>Fornecedor: </span>{{ $fornecedor->nome }}<br>
                            <span>Telefone: </span>{{ $fornecedor->telefone }}<br>
                            <span>E-mail: </span>{{ $fornecedor->email }}
                          </p>
                      @endforeach
            </div>
        </div>
    </div>
@endsection