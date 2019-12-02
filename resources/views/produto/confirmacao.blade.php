@extends('/layout/principal')

@section('conteudo')

{{-- <div class="modal-body">
    <h2>{{$msn[0]}}</h2>
    <h2> Produto  {{$msn[1]}} foi inserido na base de dados</h2> 
</div> --}}
<div class="alert alert-success">
    <strong>Sucesso!</strong> O produto {{$msn[1]}} foi adicionado.
    </div>



@endsection
{{-- 
@php
  sleep(10);
  header("Location: /produtos");
@endphp --}}
