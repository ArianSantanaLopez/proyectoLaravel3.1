@extends('layouts.adminlte')

@section('title', 'Formulario')

@section('content')
<h1>Formulario de ejemplo</h1>

<form>
    <div class="form-group">
        <label>Nombre:</label>
        <input type="text" class="form-control">
    </div>
    <button class="btn btn-primary mt-2">Enviar</button>
</form>
@endsection
