<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class EmployeeController extends Controller
{
    public function index()
    {
        return view('admin.employees.index');
    }

    public function edit(Employee $employee)
    {
        // $roles = Role::where('guard_name', 'company')->get(); //PARA CHECK BOX
        $roles = Role::where('guard_name', 'company')->pluck('name', 'id')->toArray(); // PARA LISTA
        return view('admin.employees.edit', compact('employee', 'roles'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required|min:3',
            'paternal_surname' => 'required|min:3',
            'maternal_surname' => 'required|min:3',
        ]);

        $employee->update([
            'name' => $request->name,
            'paternal_surname' => $request->paternal_surname,
            'maternal_surname' => $request->maternal_surname,
        ]);

        // $employee->roles()->sync($request->role);
        $employee->roles()->sync($request->roles);
        return redirect()->route('admin.employees.edit', $employee)->with('success', 'Datos Actualizados');
    }

    public function create()
    {
        $roles = Role::where('guard_name', 'company')->pluck('name', 'id')->toArray();
        return view('admin.employees.create', compact('roles'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|min:3',
            'paternal_surname' => 'required|min:3',
            'maternal_surname' => 'required|min:3',
            'email' => 'required|email|unique:employees'
        ]);

        Employee::create([
            'name' => $request->name,
            'paternal_surname' => $request->paternal_surname,
            'maternal_surname' => $request->maternal_surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'company_id' => auth()->user()->company->id
        ]);


        return redirect()->route('admin.employees.index')->with('success', 'Usuario Creado');
    }
}
