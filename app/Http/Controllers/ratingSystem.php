<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\User;
use Mail;
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
            if ($currentUser != 'admin@gmail.com'){
                $rating = new Rating;
                $rating->userEmail=$currentUser;
                $rating->vendorEmail=$request->followedVendor;
                $rating->rating=$request->flexRadioDefault;
                $rating->save(); 
                return redirect()->back();  
            } else {
                return redirect()->back()->with('status','Please login as customer or vendor');  
            }
        }else{
            return redirect('/custLogin');
        } 
    }

    public function share(Request $request)
    {
      
        if($request->session()->has('user'))
        {
            $currentUser = Session::get('user')['email'];
            if ($currentUser != 'admin@gmail.com'){
                return view ('pages.dashboard.customer.share');
            } else {
                return redirect()->back()->with('status','Please login as customer or vendor');  
            }
        }else{
            return redirect('/custLogin');
        } 
    }

    public function shareCustomer(Request $request, $custEmail)
    {
        $request->validate([
            'share' => 'required',
        ]);

                $find = User::where(['email'=>$custEmail])->first();
                $vendName = $find->name;
                $data = ['name'=>$vendName,'data'=>'has shared a post with you', 'us'=>'Customer'];
                $user['to'] = $request->share;
                Mail::send('mail',$data,function($messages) use ($user){
                    $messages->to($user['to']);
                    $messages->subject('Post shared!!');
                });
                return redirect()->back()->with('status','Succesfully shared');  
        
    }

    public function destroyRating($id){
        $value = Rating::find($id);
        $value->delete();
        return redirect()->back();
    }
}
