<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {   
        $this->middleware('can:roles.index')->only('index');
        $this->middleware('can:roles.edit')->only('edit');
        $this->middleware('can:roles.destroy')->only('destroy');
    }

    public function index()
    {
        $roles = Role::where('id','<>',1)->get();

        return view('role.index', compact('roles'))
            ->with('i', 0);
    }

    public function create()
    {
        $role = new Role();
        $permissions = Permission::orderBy('id','asc')->get();
        return view('role.create', compact('role','permissions'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required'
        ]);

        $role = Role::create($request->all());
        $role->permissions()->sync($request->permissions);

        return redirect()->route('roles.edit',$role)
            ->with('success', 'Rol creado correctamente.');
    }

    public function show($id)
    {
        $role = Role::find($id);

        return view('role.show', compact('role'));
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        return view('role.edit', compact('role','permissions','rolePermissions'));
    }

    public function update(Request $request, Role $role)
    {
        request()->validate([
            'name' => 'required'
        ]);

        $role->update($request->all());
        $role->permissions()->sync($request->permissions);
        return redirect()->route('roles.edit',$role)
            ->with('success', 'Rol actualizado correctamente.');
    }

    public function destroy($id)
    {
        $role = Role::find($id)->delete();

        return redirect()->route('roles.index')
            ->with('success', 'Rol eliminado correctamente');
    }
}
