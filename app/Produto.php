<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['id','nome', 'tipo', 'periodoValidade', 'quantidade','tipoUnidade', 'preco'];
    //protected $guarded = ['id', 'create_at', 'update_at'];
    protected $table = 'produtos';

    public function fornecedores (){
        return $this->hasMany(Fornecedor::class, 'produto_id');
    }

    public static function indexLetra($letra)
    {
        return static::where('nome', 'LIKE', $letra . '%')->get();
    }
    public static function busca($criterio)
    {
      return static::where('nome', 'LIKE', '%' . $criterio . '%')->get();
    }
}
