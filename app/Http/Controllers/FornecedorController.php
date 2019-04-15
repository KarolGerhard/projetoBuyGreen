<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function store(Fornecedor $fornecedor){
        try{
            $fornecedor->save();
        }catch(\Exception $e){
            return "ERRO: " . $e->getMessage();
        }
    }
}
