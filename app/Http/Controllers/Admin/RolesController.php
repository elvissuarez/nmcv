<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Gate;
use App\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    /**
     * Sure user is logged in
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index')->with('roles', $roles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        if (Gate::denies('manage-roles')) {
            return redirect(route('admin.roles.index'));
        }
        $permisos = Permission::get();
        return view('admin.roles.edit')->with([
            'rol' => $role,
            'permisos' => $permisos,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $role->permissions()->sync($request->permissions);

        $role->name = $request->name;
        $role->active = $request->active;
        if ($role->save()) {
            $request->session()->flash('success', 'El Rol ' . $role->name . ' se actualizó correctamente');
        } else {
            $request->session()->flash('error', 'Hubo un problema con la actualizacion del Usuario');
        }

        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        // if (Gate::denies('edit-users')) {
        //     return redirect(route('admin.users.index'));
        // }

        // $user->roles()->detach();
        // $user->delete();

        // return redirect()->route('admin.users.index');
    }

}
