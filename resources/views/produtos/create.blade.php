@extends('template.app')

@section('content')
  <div class="col-md-12">
    <h3>Novo Produto</h3>
  </div>

  <div class="col-md-6 well">
    <form class="col-md-12" action="{{ url('/produtos/store') }}" method="POST">
      {{ csrf_field() }}
      <div class="from-group col-md-12 {{ $errors->has('nome') ? 'has-error' : '' }}">
          <br>
          <h4 id="center"><b>Dados do produto</b></h4>
          <br> 
        <label class="control-label">Nome</label>
        <input name="nome" value="{{ old('nome') }}" class="form-control" placeholder="Nome completo">
        @if($errors->has('nome'))
          <span class="help-block">
            {{ $errors->first('nome') }}
          </span>
        @endif
      </div>
      {{-- <div class="from-group col-md-12 {{ $errors->has('nome') ? 'has-error' : '' }}">
        <label class="control-label">Imagem</label>
        <input value="{{ old('imagem') }}" name="imagem" accept=".gif,.jpg,.png"
        class="form-control" data-toggle="tooltip" data-placement="top"
        title="Usar arquivo com dimensões 300x300 
        - JPG, GIF, PNG">
        @if($errors->has('nome'))
          <span class="help-block">
            {{ $errors->first('nome') }}
          </span>
        @endif
      </div> --}}
      <div class="from-group col-md-5 {{ $errors->has('tipo') ? 'has-error' : '' }}">
        <label  class="control-label">Tipo de hortaliças</label>  
        <select class="form-control" name="tipo" value="{{ old('tipo')}}">
              <option value="verduras">Verduras</option>
              <option value="flor">Flor</option>
              <option value="fruto">Fruto</option>
              <option value="legume">Legume</option>
              <option value="raizes">Raízes</option>
              <option value="turbeculo">Tubérculo</option>
              <option value="bulbo">Bulbo</option>
              <option value="haste">Haste</option>
            </select>
            @if($errors->has('tipo'))
          <span class="help-block">
            {{ $errors->first('tipo') }}
          </span> 
        @endif
      </div>
        

      {{-- <div class="from-group col-md-4 {{ $errors->has('tipo') ? 'has-error' : '' }}">
        <label class="control-label">Tipo</label>
        <input name="tipo" value="{{ old('tipo') }}" class="form-control" placeholder="hortaliça, legumes, etc.">
        @if($errors->has('tipo'))
          <span class="help-block">
            {{ $errors->first('tipo') }}
          </span> 
        @endif
      </div> --}}
      <div class="from-group col-md-6 {{ $errors->has('periodoValidade') ? 'has-error' : '' }}">
        <label class="control-label">Data de Validade</label>
        <input name="periodoValidade" type="date" value="{{ old('periodoValidade') }}" class="form-control" placeholder="Validade">
        @if($errors->has('periodoValidade'))
          <span class="help-block">
            {{ $errors->first('periodoValidade') }}
          </span>
        @endif
      </div>

      <div class="from-group col-md-3 {{ $errors->has('quantidade') ? 'has-error' : '' }}">
        <label class="control-label">Quantidade</label>
        <input name="quantidade" value="{{ old('quantidade') }}" class="form-control" placeholder="ex.:2">
        @if($errors->has('quantidade'))
          <span class="help-block">
            {{ $errors->first('quantidade') }}
          </span>
        @endif
      </div> 

      <div class="from-group col-md-5 {{ $errors->has('tipoUnidade') ? 'has-error' : '' }}">
          <label  class="control-label">Medida</label>  
          <select class="form-control" name="tipoUnidade" value="{{ old('tipoUnidade') }}">
                <option value="UND">UND</option>
                <option value="Kg">Kg</option>
                <option value="g">g</option>
                <option value="maco">maço</option>
              </select>
              @if($errors->has('tipoUnidade'))
            <span class="help-block">
              {{ $errors->first('tipoUnidade') }}
            </span> 
          @endif
        </div>

      <div class="from-group col-md-4 {{ $errors->has('preco') ? 'has-error' : '' }}">
        <label class="control-label">Preço</label>
        <input name="preco" value="{{ old('preco') }}" class="form-control" placeholder="preço">
        @if($errors->has('preco'))
          <span class="help-block">
            {{ $errors->first('preco') }}
          </span>
        @endif
      </div><br>
      

      <div class="from-group col-md-8 {{ $errors->has('fornecedores') ? 'has-error' : '' }}"><br>
        <br>
        <h4 id="center"><b>Dados Fornecedor</b></h4>
        <br> 
        <label class="control-label">Nome</label>
        <input name="nome_fornecedor" value="{{ old('nome_fornecedor') }}" class="form-control" placeholder="Nome Completo">
        <label class="control-label">Endereço</label>
        <input name="endereco" value="{{ old('endereco') }}" class="form-control" placeholder="Rua, nº, bairro, cidade">
        <label  class="control-label">E-mail</label>
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
        <button style="margin-top: 5px; float: right" class="btn btn-primary">salvar</button>
      </div>
    </form>
  </div>
@endsection