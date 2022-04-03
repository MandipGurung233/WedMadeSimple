<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
use App\Models\Approved;

class followSystem extends Controller
{
    //
    public function following (Request $request, $userEmail)
    {
        $follow = new Follow;
        $follow->userEmail=$userEmail;
        $follow->followedVendor=$request->followedVendor;
        $follow->save(); 
        return redirect()->back()->with('status','Liked');
    }

    public function customizeFeature($id){
        $value = Approved::find($id);
        $values = $value->email;
        $views = Approved::where(['email'=>$values])->first();
        $views->view = $views->view + '1';
        $views->update();
        return view('pages.vendorPage.makeUp.indreni',compact('values'));  
    }

    public function deleteFollow($iid)
    {
        $value = Follow::find($iid);
        $value->delete();
        return redirect()->back();
    }

    /*public function random(Request $request){
            $random1 = Random::all();
            $names = $random1->name;
            $random = new Random;
            $random->name = $request->name;
            $random->save();
            return redirect()->back();
    }*/
}
