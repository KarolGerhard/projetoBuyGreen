@extends("template.app")

@section("content")
  <style>
    .btn-action {
      padding: 5px;
      margin-left: 5px;
      float: right;
    }
  </style>
  <div>
    <div class="col-sm-12" style="padding-bottom: 10px">
      @foreach(range('A', 'Z') as $letra)
        <div class="btn-group">
          <a href="{{ url('produtos/' . $letra) }}" class="btn btn-primary {{ $letra === $criterio ? 'disabled' : '' }}">
            {{ $letra }}
          </a>
        </div>
      @endforeach
    </div>

    <div class="row">
      <h1 class="col-sm-8">Índice: {{ $criterio }}</h1>
        <form action="{{ url('/produtos/busca') }}" method="post">
          <div style="margin-top: 70px" class="col-sm-4 input-group">
            {{ csrf_field() }}
            <input type="text" class="form-control" name="criterio" placeholder="Buscar...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="submit">ok</button>
            </span>
          </div>
        </form>
    </div>

    @foreach($produtos as $produto)
      <div class="col-md-3">
        <div class="panel panel-info">
          <div class="panel-heading">
            {{ $produto->nome }}
            <a href="{{ url("/produtos/$produto->id/excluir") }}" class="btn btn-xs btn-danger btn-action">
              <i class="glyphicon glyphicon-trash"></i>
            </a>
            <a href="{{ url("/produtos/$produto->id/editar") }}" class="btn btn-xs btn-primary btn-action">
              <i class="glyphicon glyphicon-pencil"></i>
            </a>
          </div>

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
    @endforeach
  </div>
@endsection