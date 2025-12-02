<div class="form-group">
    <label>Nombre</label>
    <input type="text" name="name" class="form-control"
           value="{{ old('name', $user->name ?? '') }}" required>
</div>

<div class="form-group">
    <label>Correo electrónico</label>
    <input type="email" name="email" class="form-control"
           value="{{ old('email', $user->email ?? '') }}" required>
</div>

<div class="form-group">
    <label>Contraseña</label>
    <input type="password" name="password" class="form-control">
    <small>Déjala vacía en edición para no cambiarla</small>
</div>

<div class="form-group">
    <label>Confirmar contraseña</label>
    <input type="password" name="password_confirmation" class="form-control">
</div>