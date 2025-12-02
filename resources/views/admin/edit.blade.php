@extends('layouts.adminlte')

@section('title', 'Editar usuario')

@section('content')
<div class="card">
    <div class="card-body">

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            @include('admin.users.form', ['user' => $user])

            <button class="btn btn-primary">Actualizar usuario</button>
        </form>

    </div>
</div>
@endsection