<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // LISTADO DE USUARIOS
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    // VISTA DETALLE DE UN USUARIO
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    // FORMULARIO CREAR
    public function create()
    {
        return view('admin.users.create');
    }

    // GUARDAR NUEVO
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->route('admin.users.index')
                         ->with('success', 'Usuario creado correctamente.');
    }

    // FORMULARIO EDITAR
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    // ACTUALIZAR
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id)
            ],
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // SI password viene vacía → NO CAMBIAR LA ACTUAL
        if (!empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }

        $user->name  = $data['name'];
        $user->email = $data['email'];

        $user->save();

        return redirect()->route('admin.users.index')
                         ->with('success', 'Usuario actualizado correctamente.');
    }

    // ELIMINAR
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // IMPEDIR AUTOBORRADO
        if (auth()->id() == $user->id) {
            return redirect()->route('admin.users.index')
                ->with('error', 'No puedes eliminarte a ti mismo.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
                         ->with('success', 'Usuario eliminado.');
    }
}