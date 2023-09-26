<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\PropertyType;
use App\Models\Amenities;


class propertyTypeController extends Controller
{
  public function AllType(){
    $types=PropertyType::latest()->get();
    return view('backend.type.all_type',compact('types'));
  }//End Method


  public function AddType(){

    return view('backend.type.add_type');
  }//End Method


  public function StoreType(Request $request){

          // validate
          $request->validate([
            'type_name'=> 'required|unique:property_types|max:200',
            'type_icon'=> 'required',
            ]);
            propertyType::insert([
                'type_name' => $request->type_name,
                'type_icon' => $request->type_icon,
            ]);
            $notification= array(
                'message' => 'Property Type created successfully',
                'alert-type' => 'success'

           );
           return redirect()->route('all.type')->with($notification);

  }//End Method


  public function EditType($id){
    $type = PropertyType::findOrFail($id); // Fetch the row data from the database based on the ID
    return view('backend.type.edit_type', compact('type'));
}



public function UpdateType(Request $request){
        $pid= $request->id;

      propertyType::findOrFail($pid)->update([
          'type_name' => $request->type_name,
          'type_icon' => $request->type_icon,
      ]);
      $notification= array(
          'message' => 'Property Type updated successfully',
          'alert-type' => 'success'

     );
     return redirect()->route('all.type')->with($notification);

}//End Method
public function DeleteType($id){
    propertyType::findOrFail($id)->delete();
    $notification= array(
        'message' => 'Property Type Deleted successfully',
        'alert-type' => 'success'

   );
   return redirect()->back()->with($notification);
}



////////////////// All Amenities Type Methods

public function AllAmenities(){
    $amenities=Amenities::latest()->get();
    return view('backend.amenities.all_amenities',compact('amenities'));
  }//End Method

public function AddAmenities(){
    return view('backend.amenities.add_amenities');
}


 public function StoreAmenities(Request $request){

              Amenities::insert([
                'amenities_name' => $request->amenities_name,

            ]);
            $notification= array(
                'message' => 'Amenities created successfully',
                'alert-type' => 'success'

           );
           return redirect()->route('all.amenities')->with($notification);

  }//End Method
        public function EditAmenities($id){
            $amenities = Amenities::findOrFail($id);
            return view('backend.amenities.edit_amenities',compact('amenities'));
        }//End Method



        public function UpdateAmenities(Request $request){
            $ame_id= $request->id;

            Amenities::findOrFail($ame_id)->update([
              'amenities_name' => $request->amenities_name,

          ]);
          $notification= array(
              'message' => 'Amenities updated successfully',
              'alert-type' => 'success'

         );
         return redirect()->route('all.amenities')->with($notification);

    }//End Method
    public function DeleteAmenities($id){
        Amenities::findOrFail($id)->delete();
        $notification= array(
            'message' => 'Amenities Deleted successfully',
            'alert-type' => 'success'

       );
       return redirect()->back()->with($notification);
    }
}
