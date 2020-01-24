<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user1;

class UserController extends Controller
{
   public function  campany()
   {
     return view('admin.campany');
   }
   public function  store(Request $request )
   {
   
    $user = new user1();
    // dd($user);
    $user->name= $request->input('name');
    $user->email= $request->input('email');
    // $user->image= $request->input('image');
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('upload/Images/');
        $image->move($destinationPath, $name);
        
      }else {
          dd("rehman");
      }
      $user->save();
      return back()->with('success','Image Upload successfully');

   }
}
