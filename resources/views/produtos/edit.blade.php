@extends('template.app')

@section('content')
    <div class="col-md-12">
        <h3>Editar produto</h3>
    </div>

    <div class="col-md-6 well">
        <form class="col-md-12" action="{{ url('/produtos/update') }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $produto->id }}">
            <div class="from-group col-md-6  {{ $errors->has('nome') ? 'has-error' : '' }}">
                <label class="control-label">Produto</label>
                <input name="nome" value="{{ $produto->nome }}" class="form-control">
                @if($errors->has('nome'))
                    <span class="help-block">
                        {{ $errors->first('nome') }}
                    </span>
                @endif
            </div>
            <div class="from-group col-md-4  {{ $errors->has('tipo') ? 'has-error' : '' }}">
                <label class="control-label">Tipo</label>
                <input name="tipo" value="{{ $produto->tipo }}" class="form-control">
                @if($errors->has('tipo'))
                    <span class="help-block">
                        {{ $errors->first('tipo') }}
                    </span>
                @endif
            </div>
            <div class="from-group col-md-6  {{ $errors->has('periodoValidade') ? 'has-error' : '' }}">
                <label class="control-label">Data de Validade</label>
                <input name="periodoValidade" value="{{ $produto->periodoValidade }}" class="form-control">
                @if($errors->has('periodoValidade'))
                    <span class="help-block">
                        {{ $errors->first('periodoValidade') }}
                    </span>
                @endif
            </div>
            <div class="from-group col-md-4 {{ $errors->has('quantidade') ? 'has-error' : '' }}">
                <label class="control-label">Quantidade</label>
                <input name="quantidade" value="{{ $produto->quantidade }}" class="form-control">
                @if($errors->has('quantidade'))
                    <span class="help-block">
                        {{ $errors->first('quantidade') }}
                    </span>
                @endif
            </div>
            <div class="from-group col-md-2  {{ $errors->has('tipoUnidade') ? 'has-error' : '' }}">
                <label class="control-label">Medida</label>
                <input name="tipoUnidade" value="{{ $produto->tipoUnidade }}" class="form-control">
                @if($errors->has('tipoUnidade'))
                    <span class="help-block">
                        {{ $errors->first('tipoUnidade') }}
                    </span>
                @endif
            </div>
            <div class="from-group col-md-3  {{ $errors->has('preco') ? 'has-error' : '' }}">
                <label class="control-label">Preço</label>
                <input name="preco" value="{{ $produto->preco }}" class="form-control">
                @if($errors->has('preco'))
                    <span class="help-block">
                        {{ $errors->first('preco') }}
                    </span>
                @endif
            </div>
            <div class="col-md-12">
                <button style="margin-top: 5px; float: right" class="btn btn-primary">
                    Alterar
                </button>
            </div>
        </form>
    </div>
    <div class="col-md-3">
        <div class="panel panel-info">
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