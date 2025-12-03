@extends('layouts.adminlte')

@section('title', 'Detalle de usuario')

@section('content')
<div class="card">
    <div class="card-body">
        <h3>{{ $user->name }}</h3>
        <p><b>Email:</b> {{ $user->email }}</p>
        <p><b>Creado:</b> {{ $user->created_at }}</p>
        <p><b>Teléfono:</b> {{ $user->telefono }}</p>
        <p><b>Rol:</b> {{ $user->rol }}</p>

        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Volver</a>
    </div>
</div>
@endsection