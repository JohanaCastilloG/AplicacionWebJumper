<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        
        return view('administrador.usuarios.index', compact('usuarios'));

    }

    public function create()
    {
        $roles = Role::all();
        return view('administrador.usuarios.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $usuario = User::create([
            'name' => $request->name,
            'apellido' => $request->apellido,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $usuario->roles()->sync($request->roles);

        return redirect()->route('admin.usuarios.index')->with('info', '¡Usuario creado exitosamente!');
    }

    public function show(User $usuario)
    {
        return view('administrador.usuarios.show', compact('usuario'));
    }

    public function edit(User $usuario)
    {
       $roles = Role::all();
       return view('administrador.usuarios.edit', compact('usuario', 'roles'));
    }

    public function update(Request $request, User $usuario)
    {
        $usuario->update($request->all());

        $usuario->roles()->sync($request->roles);

        return redirect()->route('admin.usuarios.index')->with('info', '¡Usuario actualizado exitosamente!');
    }

    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect()->route('admin.usuarios.index')->with('eliminar', 'ok');
    }
}
