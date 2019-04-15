<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Fornecedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProdutoController extends Controller
{
    private $fornecedor_controller;
    private $produto;
    public function __construct(FornecedorController $fornecedor_controller)
    {
        $this->fornecedor_controller = $fornecedor_controller;
        $this->produto = new Produto();
    }
    public function index($letra)
    {
        $list_produtos = Produto::indexLetra($letra);
        return view('produtos.index', [
            'produtos' => $list_produtos,
            'criterio' => $letra
        ]);
    }
    public function busca(Request $request)
    {
        $produtos = Produto::busca($request->criterio);
        return view('produtos.index', [
            'produtos' => $produtos,
            'criterio' => $request->criterio
        ]);
    }
    public function novoView()
    {
        return view('produtos.create');
    }

    public function store(Request $request)
    {
        $validacao = $this->validacao($request->all());
        if ($validacao->fails()) {
            return redirect()->back()
                ->withErrors($validacao->errors())
                ->withInput($request->all());
        }
        $produto = Produto::create($request->all());
        // $fornecedor = Fornecedor::create($request->all());
        // Fornecedor::find($fornecedor->id)->produto()->save($produto);
        if ($request->nome && $request->telefone) {
            $fornecedor = new Fornecedor();
            $fornecedor->nome = $request->nome_fornecedor;
            $fornecedor->endereco = $request->endereco;
            $fornecedor->email = $request->email;
            $fornecedor->telefone = $request->telefone;
            $fornecedor->produto_id = $produto->id;
            //  Ship::find($ship->id)->captain()->save($captain);//Captain is saved to existing ship
            // Produto::find($produto->id)->fornecedor()->save($fornecedor);
            // $produto->fornecedor()->save($fornecedor);
            $this->fornecedor_controller->store($fornecedor);
            // Fornecedor::create($fornecedor);
        }
        return redirect("/produtos")->with("message", "produto criado com sucesso!");
    }

    public function excluirView($id)
    {
        return view('produtos.delete', [
            'produto' => $this->getproduto($id)
        ]);
    }
    public function destroy($id)
    {
        $this->getproduto($id)->delete();
        return redirect(url('produtos'))->with('success', 'Excluído!');
    }
    public function editarView($id)
    {
        return view('produtos.edit', [
            'produto' => $this->getproduto($id)
        ]);
    }
    public function update(Request $request)
    {
        $validacao = $this->validacao($request->all());
        if ($validacao->fails()) {
            return redirect()->back()
                ->withErrors($validacao->errors())
                ->withInput($request->all());
        }
        $produto = $this->getproduto($request->id);
        $produto->update($request->all());
        return redirect('/produtos');
    }
    protected function getproduto($id)
    {
        return $this->produto->find($id);
    }
    private function validacao($data)
    {
        if (array_key_exists('nome', $data) && array_key_exists('telefone', $data)) {
            if ($data['nome'] || $data['telefone']) {
                $regras['nome'] = 'required|size:30';
                $regras['telefone'] = 'required';
            }
        }
        $regras['nome'] = 'required|min:3';
        $mensagens = [
            'nome.required' => 'Campo nome é obrigatório',
            'nome.min' => 'Campo nome deve ter ao menos 10 letras',
            'nome.required' => 'Campo ddd é obrigatório',
            'nome.size' => 'Campo ddd deve ter 2 digitos',
            'telefone.required' => 'Campo telefone é obrigatório'
        ];
        return Validator::make($data, $regras, $mensagens);
    }
}
