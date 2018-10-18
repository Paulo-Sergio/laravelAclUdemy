@extends('layouts.app')

@section('content')
	<div class="container">
		<h2 class="center">Lista de Usuários</h2>

		@include('admin._caminho')


		<div class="row">
			<table>
				<thead>
					<tr>
						<th>Id</th>
						<th>Nome</th>
						<th>E-mail</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($usuarios as $usuario)
					<tr>
						<td>{{ $usuario->id }}</td>
						<td>{{ $usuario->name }}</td>
						<td>{{ $usuario->email }}</td>
						<td>

							<a title="Papel" class="btn blue" href="{{route('usuarios.papel', $usuario->id)}}"><i class="material-icons">lock_outline</i></a>

						</td>
					</tr>
				@endforeach
				</tbody>
			</table>

		</div>

	</div>

@endsection
