@extends('template.app')

@section('content')
    <div class="col-md-12">
        <h3>Editar produto</h3>
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
            <div class="from-group col-md-3 {{ $errors->has('quantidade') ? 'has-error' : '' }}">
                <label class="control-label">Quantidade</label>
                <input name="quantidade" value="{{ $produto->quantidade }}" class="form-control">
                @if($errors->has('quantidade'))
                    <span class="help-block">
                        {{ $errors->first('quantidade') }}
                    </span>
                @endif
            </div>
            <div class="from-group col-md-3  {{ $errors->has('tipoUnidade') ? 'has-error' : '' }}">
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
            </div><br>

           
            <div class="col-md-12">  
                <button type="submit" style="margin-top: 5px; float: right" class="btn btn-primary">
                        Alterar
                    </button>
                    <a id="btn-adiciona-fornecedor" class="btn btn-success" style="margin-top: 5px; float: right" href="#">
                            <i class="glyphicon glyphicon glyphicon-plus"></i>
                            &nbsp;Adicionar Fornecedor 
                    </a>
                    <a class="btn btn-default" style="margin-top: 5px; float: left" href="{{ url("produtos") }}">
                            <i class="glyphicon glyphicon-chevron-left"></i>
                            &nbsp;Cancelar
                    </a>
                  
            </div>
        </form>
    </div>
    <div id="adiciona-fornecedor" class="col-md-6 well" style="display: none">
        <form class="col-md-12" action="{{ url('/produtos/update') }}" method="POST">
                    {{ csrf_field() }}
            <div class="from-group col-md-6 {{ $errors->has('fornecedores') ? 'has-error' : '' }}">
                <h4 id="center"><b>Dados Fornecedor</b></h4>
                <br> 
                <input type="hidden" name="id" value="{{ $produto->id }}">
                <label class="control-label">Nome</label>
                <input name="nome_fornecedor" value="{{ old('nome_fornecedor') }}" class="form-control" placeholder="Nome Completo">
                <label class="control-label">Endereço</label>
                <input name="endereco" value="{{ old('endereco') }}" class="form-control" placeholder="Rua, nº, bairro, cidade">
                <label class="control-label">E-mail</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="name@example.com">
                <label class="control-label">Telefone</label>
                <input name="telefone" value="{{ old('telefone') }}" class="form-control" placeholder="(XX)9999-9999">
                @if($errors->has('telefone'))
                <span class="help-block">
                    {{ $errors->first('telefone') }}
                </span>
                @endif
            </div>
            <div class="col-md-12">
            <button type="submit" style="margin-top: 5px; float: right" class="btn btn-primary">salvar</button>
            </div>
        </form>
    </div>
@endsection



<script>
    setTimeout(() => {
        let btnAdiciona = document.querySelector("a#btn-adiciona-fornecedor")
        
        btnAdiciona.addEventListener('click', function() {
            let formulario = document.querySelector("#adiciona-fornecedor");
            formulario.style.display = 'block';
        });   
    }, 1000);
    
</script>