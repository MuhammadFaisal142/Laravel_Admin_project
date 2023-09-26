<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    public function AdminDashboard(){
        return view('admin.index');
    }//End Method



    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
    // Start AdminLogin
    public function AdminLogin(){
        return view('admin.admin_login');
    }//End AdminLogin Method


    // Start Adminprofile
    public function AdminProfile(){
        $id= Auth::user()->id;       //Fetch the id from user table from database
        $profileData= User::find($id);
        return view('admin.body.admin_profile_view',compact('profileData'));
    }//End Adminprofile Method

     // Start AdminProfileStore
    public function AdminProfileStore(Request $request){
        $id= Auth::user()->id;       //Fetch the id from user table from database
        $data= User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
       if($request-> file('photo')){
        $file = $request->file('photo');
        @unlink(public_path('upload/admin_images/'.$data->photo));

        $filename= date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('upload/admin_images'),$filename);
        $data['photo'] = $filename;
       }
       $data->save();
       $notification= array(
            'message' => 'Admin Profile Updated successfully',
            'alert-type' => 'success'

       );
       return redirect()->back()->with($notification);
   }//End AdminProfileStore Method

    // Start AdminChangePassword
   	    public function AdminChangePassword(){
            $id= Auth::user()->id;       //Fetch the id from user table from database
            $profileData= User::find($id);
        return view('admin.body.admin_change_password',compact('profileData'));
        }//End AdminChangePassword Method
    // Start AdminUpdatePassword
   	    public function AdminUpdatePassword(Request $request){

                // validate
                $request->validate([
                'old_password'=> 'required',
                'new_password'=> 'required|confirmed',
                ]);
                // match password
                    if(!Hash::check($request->old_password, Auth::user()->password)){
                    $notification= array(
                        'message' => 'Old password Does not Match',
                        'alert-type' => 'error'

                   );
                   return back()->with($notification);
                }
                    // update new password
                    User::whereId(auth()->user()->id)->update([
                        'password' => Hash::make($request->new_password)
                    ]);

                    $notification= array(
                        'message' => 'Password change successfully',
                        'alert-type' => 'success'
                   );
                   return back()->with($notification);
                }//End UpdatePasswordgePassword Method

}
