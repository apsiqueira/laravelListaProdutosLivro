<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutosRequest;
use App\Produto;
use Hamcrest\Core\HasToString;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use phpDocumentor\Reflection\Types\Float_;

class ProdutoController extends Controller
{
    public function lista()
    {

        // $produtos = DB::select('select * from produtos');
        $produtos = Produto::all();
        // return view('listagem')->with('produtos',$produtos);
        return view('/produto/listagem')->withProdutos($produtos);
        // return view('listagem')->withProdutos(Array());
    }

    public function remove($id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()
            ->action('ProdutoController@lista');
    }


    public function mostra($id)
    {
        $produto = Produto::find($id);
        if (empty($produto)) {
            return "Esse produto não existe";
        }
        return view('produto.detalhes')->withProduto($produto);
        // return view(’produto.detalhes’)->with(’produto’, $produto);
    }


    // public function mostra($id)
    // {
    //     // $id = Request::route('id');
    //     $produto = DB::select('select * from produtos where id = ?', [$id]);

    //     if ($produto) {
    //         return view('/produto/detalhes')->withProduto($produto[0]);
    //     } else {
    //         return "Produto inexistente";
    //     }
    // }
    public function novo()
    {


        return view('/produto/formulario');
    }

    //versao 1
    // public function adiciona()
    // {
    //     // var_dump(Request::input());


    //     // pegar dados do formulario
    //     $nome = Request::input('nome');
    //     $descricao = Request::input('descricao');
    //     $valor = Request::input('valor');
    //     $quantidade = Request::input('quantidade');

    //     $salvamento = DB::insert(
    //         'insert into produtos
    //     (nome, valor, descricao,quantidade) values (?,?,?,?)',
    //         array($nome, $valor, $descricao, $quantidade)
    //     );

    //versao 2
    // public function adiciona(){
    //     $produto = new Produto();
    //     $produto->nome = Request::input('nome');
    //     $produto->valor = Request::input('valor');
    //     $produto->descricao = Request::input('descricao');
    //     $produto->quantidade = Request::input('quantidade');
    //     $produto->save();
    //     return redirect()
    //     ->action('ProdutoController@lista')
    //     ->withInput(Request::only('nome'));
    //     }



    //versao 3
    //    public function adiciona(){
    //     $params = Request::all();
    //     $produto = new Produto($params);
    //     $produto->save();
    //     return redirect()
    //     ->action('ProdutoController@lista')
    //     ->withInput(Request::only('nome'));

    //     }

    //versao 4

    public function adiciona(ProdutosRequest $request)
    {
        Produto::create($request->all());
        return redirect()
            ->action('ProdutoController@lista')
            ->withInput(Request::only('nome'));
    }




    //query builder
    // DB::table('produtos')->insert(
    //     ['nome' => $nome,
    //     'valor' => $valor,
    //     'descricao' => $descricao,
    //     'quantidade' => $quantidade
    //     ]


    // $resposta = ($salvamento) ? "Sucesso" : "Erro no salvamento do produto";
    // $msn = array();


    // $msn[0] = $resposta;
    // $msn[1] = $nome;


    //redirecionamento
    // return redirect('/produtos')->withInput(Request::only('nome'));

    // return redirect()
    //    ->action('ProdutoController@lista')
    //    ->withInput(Request::only('nome'));

    // var_dump($msn);

    // $produtos = DB::select('select * from produtos');
    // return view('/produto/listagem')->withMsn($msn);


    // return implode(',', array(
    //     $nome,
    //     $descricao, $valor, $quantidade
    // ));

    //outra alternativa
    // $all = Request::all();

    //terceira alternativa
    // $only = Request::only('descricao', 'descricao','valor','quantidade');



    // salvar no banco de dados





    // retornar alguma view

    // }
    public function listaJson()
    {
        $produtos = Produto::all();
        return response()->json($produtos);
    }
}
