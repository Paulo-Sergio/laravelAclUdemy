@extends('layouts.app')

@section('content')
	<div class="container">
		<h2 class="center">Lista de Papéis para {{$usuario->name}}</h2>

		@include('admin._caminho')

		<div class="row">
			<form action="{{route('usuarios.papel.store',$usuario->id)}}" method="post">
				{{ csrf_field() }}
				<div class="input-field">
					<select name="papel_id">
						@foreach($papel as $valor)
							<option value="{{$valor->id}}">{{$valor->nome}}</option>
						@endforeach
					</select>
				</div>
				<button class="btn blue">Adicionar</button>
			</form>


		</div>

		<div class="row">
			<table>
				<thead>
					<tr>

						<th>Papel</th>
						<th>Descrição</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($usuario->papeis as $papel)
					<tr>
						<td>{{ $papel->nome }}</td>
						<td>{{ $papel->descricao }}</td>

						<td>

							<form action="{{route('usuarios.papel.destroy',[$usuario->id,$papel->id])}}" method="post">
									{{ method_field('DELETE') }}
									{{ csrf_field() }}
									<button title="Deletar" class="btn red"><i class="material-icons">delete</i></button>
							</form>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>

		</div>

	</div>

@endsection
