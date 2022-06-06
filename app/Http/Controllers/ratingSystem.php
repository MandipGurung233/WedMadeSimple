<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\User;
use Session;

class ratingSystem extends Controller
{
    //
    public function rating(Request $request)
    {
        $request->validate([
            'flexRadioDefault' => 'required',
        ]);

        if($request->session()->has('user'))
        {
            $currentUser = Session::get('user')['email'];
            $rating = new Rating;
            $rating->userEmail=$currentUser;
            $rating->vendorEmail=$request->followedVendor;
            $rating->rating=$request->flexRadioDefault;
            $rating->save(); 
            return redirect()->back();   
        }else{
            return redirect('/custLogin');
        } 
    }

    public function destroyRating($id){
        $value = Rating::find($id);
        $value->delete();
        return redirect()->back();
    }
}
