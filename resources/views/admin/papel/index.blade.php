@extends('layouts.app')

@section('content')
	<div class="container">
		<h2 class="center">Lista de Papéis</h2>

		@include('admin._caminho')
		<div class="row">
			<table>
				<thead>
					<tr>
						<th>Id</th>
						<th>Nome</th>
						<th>Descrição</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($registros as $registro)
					<tr>
						<td>{{ $registro->id }}</td>
						<td>{{ $registro->nome }}</td>
						<td>{{ $registro->descricao }}</td>

						<td>


							<form action="{{route('papeis.destroy',$registro->id)}}" method="post">
								<a title="Editar" class="btn orange" href="{{ route('papeis.edit',$registro->id) }}"><i class="material-icons">mode_edit</i></a>
								<a title="Permissões" class="btn blue" href="#"><i class="material-icons">lock_outline</i></a>


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
		<div class="row">
			<a class="btn blue" href="{{route('papeis.create')}}">Adicionar</a>
		</div>
	</div>

@endsection
