@extends('layouts.adminlte')

@section('title', 'Crear usuario')

@section('content')
<div class="card">
    <div class="card-body">

        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            @include('admin.users.form')

            <button class="btn btn-primary">Crear usuario</button>
        </form>

    </div>
</div>
@endsection