<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions=Permission::get();

        return view('admin.role-permission.permission.index',compact('permissions'));
    }
    public function create()
    {
        return view('admin.role-permission.permission.create');


    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'name'=>[
                    'required',
                    'string',
                    'unique:permissions,name'

                ]

            ]
            );
            Permission::create([
                'name'=>$request->name
            ]);
            return redirect('admin/role-permission/permissions')->with('success', '許可が正常に登録されました');
    }
    public function edit(Permission $permission)
    {



        return view('admin.role-permission.permission.edit', compact('permission'));


    }
    public function update(Request $request, Permission $permission)
    {
        $request->validate(
            [
                'name'=>[
                    'required',
                    'string',
                    'unique:permissions,name,'.$permission->id

                ]

            ]);
            $permission->update([
                'name'=>$request->name
            ]);

            return redirect('admin/role-permission/permissions')->with('success', '許可が正常に更新されました');



    }
    public function destroy($id)
    {
        $permission=Permission::find($id);
        $permission->delete();
        return redirect('/admin/role-permission/permissions')->with('success', '許可が正常に消去されました');

    }


}
