<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function UserDashboard()
    {
        return view('user.users');
    } //End Method

    public function allUsers(){

        $authUser = auth()->user(); // Fetch the currently authenticated user
        $users = User::latest()->get();
        return view('admin.user.allUser', compact('users', 'authUser'));
    }



    public function addUsers()
    {
        $roles = Role::all();
        return view('admin.user.addUser' ,compact('roles'));
    } //End Method

    public function userStore(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'password' => 'required',
            'role_id' => 'required',
        ]);

        // Create a new user with the provided data
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'password' => bcrypt($validatedData['password']),
            'role' => $validatedData['role_id'],
        ]);

        // Redirect with a success message
        $notification = array(
            'message' => 'User created successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.users')->with($notification);
    }

            public function destroy($id){
                User::findOrFail($id)->delete();
            $notification= array(
                'message' => 'User Deleted successfully',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
            }//End Method


public function editUser($id, $roleId) {
    $user = User::findOrFail($id);
    $roles = Role::all(); // Retrieve all roles
    return view('admin.user.editUser', compact('user', 'roles', 'roleId'));
}


public function updateuser(Request $request){
    $pid= $request->id;
  User::findOrFail($pid)->update([
      'name' => $request->name,
      'email' => $request->email,
      'phone' => $request->phone,
      'password' => $request->password,
      'role' => $request->role_id,
  ]);
  $notification= array(
      'message' => 'User updated successfully',
      'alert-type' => 'success'

 );
 return redirect()->route('all.users')->with($notification);

}//End Method
}
