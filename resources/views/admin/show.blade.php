@extends('layouts.adminlte')

@section('title', 'Detalle de usuario')

@section('content')
<div class="card">
    <div class="card-body">
        <h3>{{ $user->name }}</h3>
        <p><b>Email:</b> {{ $user->email }}</p>
        <p><b>Creado:</b> {{ $user->created_at }}</p>

        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Volver</a>
    </div>
</div>
@endsection