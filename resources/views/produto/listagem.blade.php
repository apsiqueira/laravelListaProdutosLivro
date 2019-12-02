@extends('/layout/principal')

@section('conteudo')
<h1>Listagem de produtos</h1>
<h4>
    <span class="label label-danger pull-right">
        Itens em vermelho estão com um ou menos no estoque
    </span>
</h4>
<table class="table table-striped table-bordered table-hover">
    <tr>

        <th>Produto</th>
        <th>Valor</th>
        <th>Descrição</th>
        <th>Quantidade</th>
        <th>Visualizar</th>
        <th>Excluir</th>


    </tr>
    @if(empty($produtos))
    <div class="alert alert-danger">
        Você não tem nenhum produto cadastrado.
    </div>
    @else
    @foreach ($produtos as $prod)
    @php
    $id=$prod->id
    @endphp

    <tr class="{{$prod->quantidade<=1 ? 'danger' : ''}}">
        <td>
            {{$prod->nome }}
        </td>
        <td>
            {{$prod->valor }}
        </td>
        <td>
            {{ $prod->descricao }}
        </td>
        <td>

            {{$prod->quantidade }}

            @if( $prod->quantidade <=1) {{--                
                        <span class="label label-danger pull-right">
                        Um ou menos itens no estoque
                        </span>
                 --}} @endif </td> <td>
                <a href="/produtos/mostra/{{$id }}" </a> <span class="glyphicon glyphicon-search"></span>
                </a>

        </td>
        <td>
            <a href="{{action('ProdutoController@remove', $prod->id)}}">
                <span class="glyphicon glyphicon-trash"></span>
            </a>
        </td>

    </tr>

    @endforeach

    @endif


</table>

<br>


@if(old('nome'))
<div class="alert alert-success">
    <strong>Sucesso!</strong>
    O produto {{ old('nome') }} foi adicionado.
</div>
@endif




@endsection