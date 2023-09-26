<?php

namespace App\Http\Controllers\Backend;

use App\Exports\PermissionExport;
use App\Imports\PermissionImport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Maatwebsite\Excel\Facades\Excel;
class RoleController extends Controller
{
    public function AllPermission(){
        $permissions = Permission::all();
        return view('backend.pages.permission.all_permission',compact('permissions'));
     }//End Method

     public function AddPermission(){
        return view('backend.pages.permission.add_permission');
     }//End Method

     public function StorePermission(Request $request){
        $permission = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);
        $notification= array(
            'message' => 'Permission Create successfully',
            'alert-type' => 'success'

       );
       return redirect()->route('all.permission')->with($notification);
     }//End Method


     public function EditPermission($id){
        $permission=Permission::findOrFail($id);
        return view('backend.pages.permission.edit_permission',compact('permission'));
     }//End Method

     public function UpdatePermission(Request $request){
        $pid= $request->id;

        Permission::findOrFail($pid)->update([
          'name' => $request->name,
          'group_name' => $request->group_name,
      ]);
      $notification= array(
          'message' => 'permission updated successfully',
          'alert-type' => 'success'

     );
     return redirect()->route('all.permission')->with($notification);

}//End Method
public function DeletePermission($id){
    Permission::findOrFail($id)->delete();
    $notification= array(
        'message' => 'Permission Deleted successfully',
        'alert-type' => 'success'

   );
   return redirect()->back()->with($notification);
}//End Method

public function ImportPermission(){
    return view('backend.pages.permission.import_permission');
}//End Method
public function Export(){
    return Excel::download(new PermissionExport, 'permission.xlsx');
}//End Method


public function Import(Request $request){
    Excel::import(new PermissionImport, $request->file('file_name'));
    $notification= array(
        'message' => 'Permission Imported successfully',
        'alert-type' => 'success'

   );
   return redirect()->back()->with($notification);
}//End Method




////////////////// Role All Methods ///////////////////

public function AllRoles(){
        $roles= Role::all();
        return view('backend.pages.roles.all_roles',compact('roles'));
}

public function AddRoles(){
    return view('backend.pages.roles.add_roles');
 }//End Method

 public function StoreRoles(Request $request){
    $roles = Role::create([
        'name' => $request->name,
    ]);
    $notification= array(
        'message' => 'Role Create successfully',
        'alert-type' => 'success'

   );
   return redirect()->route('all.roles')->with($notification);
 }//End Method
 public function EditRoles($id){
    $role=Role::findOrFail($id);
    return view('backend.pages.roles.edit_roles',compact('role'));
 }//End Method

 public function UpdateRoles(Request $request){
    $pid= $request->id;

    Role::findOrFail($pid)->update([
      'name' => $request->role_name,

  ]);
  $notification= array(
      'message' => 'Role updated successfully',
      'alert-type' => 'success'

 );
 return redirect()->route('all.roles')->with($notification);

}//End Method
public function DeleteRoles($id){
    Role::findOrFail($id)->delete();
$notification= array(
    'message' => 'Role Deleted successfully',
    'alert-type' => 'success'
);
return redirect()->back()->with($notification);
}//End Method


}
