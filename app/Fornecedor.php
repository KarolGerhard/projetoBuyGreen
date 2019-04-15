<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $fillable = ['id', 'nome', 'telefone', 'endereco', 'email', 'produto_id'];

    protected $table = 'fornecedores';

    public function produto(){
        return $this->belongsTo(Produto::class, 'produto_id');
    }
}
