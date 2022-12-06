<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.roles.index');
    }
    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|min:3',
        ]);

        $role->update($request->all());

        return redirect()->route('admin.roles.edit', $role)->with('success', 'Datos Actualizados');
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function show(Role $role)
    {
        return $role;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
        ]);

        Role::create(['name' => $request->name, 'guard_name' => 'company']);

        return redirect()->route('admin.roles.index')->with('success', 'Rol Creado');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')->with('success', 'Rol Eliminado');
    }
}
