@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    @can('view',$chamado)
      <h2>Detalhe de Chamado</h2>

      Título: {{$chamado->titulo}}
    @else
      <h3>Você não tem permissão para acessar este registro!</h3>
    @endcan

    </div>
</div>
@endsection
