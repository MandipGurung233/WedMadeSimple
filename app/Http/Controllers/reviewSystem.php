<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User;
use Session;
class reviewSystem extends Controller
{
    public function review(Request $request)
    {
        $request->validate([
            'review' => 'required',
        ]);

        if($request->session()->has('user'))
        {
            $currentUser = Session::get('user')['email'];
            $review = new Review;
            $review->userEmail=$currentUser;
            $review->vendorEmail=$request->followedVendor;
            $review->review=$request->review;
            $review->save(); 
            return redirect()->back();
         
        }else{
            return redirect('/custLogin');
        } 
    }

    public function listReview(){
        return view ('pages.dashboard.customer.review');
    }

    public function reviewVendor(){
        return view ('pages.dashboard.vendor.vendorReview');
    }

    public function destroyReview($id){
        $value = Review::find($id);
        $value->delete();
        return redirect()->back();
    }
}