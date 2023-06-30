<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        $this->authorize('list', Permission::class);

        $search = $request->get('search', '');
        $permissions = Permission::where('name', 'like', "%{$search}%")->paginate(10);

        return view('Admin.app.permissions.index')
            ->with('permissions', $permissions)
            ->with('search', $search);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $this->authorize('create', Permission::class);

        $roles = Role::all();
        return view('Admin.app.permissions.create')->with('roles', $roles);
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {

        $this->authorize('create', Permission::class);

        $data = $this->validate($request, [
            'name' => 'required|max:64',
            'roles' => 'array'
        ]);

        $permission = Permission::create($data);
        
        $roles = Role::find($request->roles);
        $permission->syncRoles($roles);

        return redirect()
            ->route('permissions.edit', $permission->id)
            ->withSuccess(__('crud.common.created'));
    }

    /**
    * Display the specified resource.
    *
    * @param  \Spatie\Permission\Models\Permission  $permission
    * @return \Illuminate\Http\Response
    */
    public function show(Permission $permission)
    {
        $this->authorize('view', Permission::class);

        return view('Admin.app.permissions.show')->with('permission', $permission);
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \Spatie\Permission\Models\Permission  $permission
    * @return \Illuminate\Http\Response
    */
    public function edit(Permission $permission)
    {
        $this->authorize('update', $permission);

        $roles = Role::get();

        return view('Admin.app.permissions.edit')
            ->with('permission', $permission)
            ->with('roles', $roles);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Spatie\Permission\Models\Permission  $permission
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Permission $permission)
    {
        $this->authorize('update', $permission);

        $data = $this->validate($request, [
            'name' => 'required|max:40',
            'roles' => 'array'
        ]);

        $permission->update($data);
        
        $roles = Role::find($request->roles);
        $permission->syncRoles($roles);

        return redirect()
            ->route('permissions.edit', $permission->id)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \Spatie\Permission\Models\Permission  $permission
    * @return \Illuminate\Http\Response
    */
    public function destroy(Permission $permission)
    {
        $this->authorize('delete', $permission);

        $permission->delete();

        return redirect()
            ->route('permissions.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
