<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('permission:delete role', ['only'=>['destroy']]);
    // }
    public function index()
    {
        $roles=Role::get();

        return view('admin.role-permission.role.index',compact('roles'));
    }
    public function create()
    {
        return view('admin.role-permission.role.create');


    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'name'=>[
                    'required',
                    'string',
                    'unique:roles,name'

                ]

            ]
            );
            Role::create([
                'name'=>$request->name
            ]);
            return redirect('/admin/role-permission/roles')->with('success', '権限が正常に登録されました');
    }
    public function edit(Role $role)
    {

        return view('admin.role-permission.role.edit', compact('role'));


    }
    public function update(Request $request, Role $role)
    {
        $request->validate(
            [
                'name'=>[
                    'required',
                    'string',
                    'unique:roles,name,'.$role->id

                ]

            ]);
            $role->update([
                'name'=>$request->name
            ]);

            return redirect('admin/role-permission/roles')->with('success', '権限が正常に更新されました');



    }
    public function destroy($id)
    {
       $role= Role::find($id);
       $role->delete();

       return redirect('/admin/role-permission/roles')->with('success', '権限が正常に消去されました');



    }
    public function addPermissionToRole($roleId)
    {

        $permissions=Permission::get();
        $role=Role::findOrFail( $roleId );
        $rolePermissions=DB::table('role_has_permissions')

                ->where('role_has_permissions.role_id', $role->id)
                ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
                ->all();



        return view('admin.role-permission.role.add-permissions',[
            'role'=>$role,
            'permissions'=>$permissions,
            'rolePermissions'=>$rolePermissions
        ]);

    }

    public function givePermissionToRole(Request $request, $roleId)
    {
        $request->validate(
            [
                'permission'=>'required'
            ]);

            $role=Role::findOrFail( $roleId );
            $role->syncPermissions($request->permission);

            return redirect()->back()->with('success', '許可が権限にあたえられました');


    }

}
