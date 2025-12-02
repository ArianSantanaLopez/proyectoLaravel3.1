@extends('layouts.adminlte')

@section('title', 'Gestión de usuarios')

@section('content')
<div class="container-fluid">

    <div class="mb-3">
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Nuevo usuario</a>
    </div>

    @include('partials.alerts')

    <div class="card">
        <div class="card-body table-responsive p-0">

            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Creado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($users as $u)
                    <tr>
                        <td>
                            <a href="{{ route('admin.users.show', $u->id) }}">
                                {{ $u->name }}
                            </a>
                        </td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->created_at->format('Y-m-d') }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $u->id) }}" class="btn btn-warning btn-sm">
                                Editar
                            </a>

                            <form action="{{ route('admin.users.destroy', $u->id) }}"
                                  method="POST" style="display:inline-block"
                                  onsubmit="return confirm('¿Eliminar usuario?')">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>
    </div>

    <div class="mt-3">
        {{ $users->links() }}
    </div>

</div>
@endsection