<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\clothing;
use App\Models\makeUp;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Models\photography;
use App\Models\venue;
use App\Notifications\booking;
use App\Notifications\booked;
use Illuminate\Support\Facades\Notification;
use App\Models\Approved;
use App\Models\vendorDetails;
use App\Models\Post;
use App\Models\User;
use App\Models\contact;
use App\Models\bookDetail;
use Session;
use Mail;

class home extends Controller
{
    //
    public function home(){
        return view ('pages.home.home');
    }

    public function about(){
        return view ('pages.about.about');
    }

    public function blog(){
        return view ('pages.blog.blog');
    }

    public function contact(){
        return view ('pages.contact.contact');
    }

    public function service(){
        return view ('pages.service.service');
    }

    public function makeUp(){
        return view ('pages.makeUp.makeUp');
    }

    public function venued(){
        return view ('pages.makeUp.venue');
    }
  
    public function adminLogin(){
        return view ('pages.login.admin.login');
    }

    public function custLogin(){
        return view ('pages.login.customer.login');
    }

    public function vendorLogin(){
        return view ('pages.login.vendor.login');
    }

    public function customer(){
        return view ('pages.registration.customer.customer');
    }

    public function vendor(){
        return view ('pages.registration.vendor.vendor');
    }

    public function customerDash(){
        /*$users = bookDetail::select(
            "book_details.id",
            "book_details.bookDate",
            "book_details.service",
            "book_details.venEmail"
        )
        ->join("approveds","approveds.email","=", "book_details.venEmail")
        ->get();
    
        dd($users);*/

        return view ('pages.dashboard.customer.customer');
    }

    public function generate(){
        return view ('pages.dashboard.admin.generate');
    }

    public function adminDash(){
        $value = Vendor::all();
        return view ('pages.dashboard.admin.admin',compact('value'));
    }

    public function vendorDash(){
        return view ('pages.dashboard.vendor.vendor');
    }

    public function destroy($id){
        $value = Vendor::find($id);
        $value->delete();
        return redirect()->back();
    }

    public function destroyBooking($id){
        $value = bookDetail::find($id);
        $venEmail = $value->venEmail;
        $value1 = $value->email;
        $user = User::where(['email'=>$value1])->first();
        $user->notify(new booking($user, $value));

        $find = Approved::where(['email'=>$venEmail])->first();
        $vendName = $find->name;
        $data = ['name'=>$vendName,'data'=>'cancelled your booking', 'us'=>'User'];
        $user['to'] = $value1;
        Mail::send('mail',$data,function($messages) use ($user){
            $messages->to($user['to']);
            $messages->subject('Booking Cancellation !!');
        });
        $value->delete();
        return redirect()->back();
    }

    public function destroyCustomer($id){
        $value = bookDetail::find($id);
        $name=Session::get('user')['email'];
      
        
        $now = $value->created_at;
        $now1 = strtotime(date('Y-m-d H:i:s'));
        $diff = $now1 - strtotime($now);
        
        if ($diff >= 86400){
            return redirect()->back()->with('status', 'Booking cancellation failed !! 24 hrs crossed');
        } else {
            
            
            $value->delete();
          
            return redirect()->back();
        }
       
    }

    public function destroyApprove($id){
        $value = Approved::find($id);
        $value->delete();
        return redirect()->back();
    }

    public function approved($id){
        $request = Vendor::find($id);
        $approved = new Approved;
        $approved->name=$request->name;
        $approved->address=$request->address;
        $approved->email=$request->email;
        $approved->password=$request->password;
        $approved->vendorType=$request->vendorType;
        $approved->file=$request->file;
        $approved->save(); 
        $request->delete();
        return redirect()->back()->with('status','Successfully Approved');
    }

    public function customize($id){
        $value = makeUp::find($id);
        $values = $value->email;
        $views = Approved::where(['email'=>$values])->first();
        $views->view = $views->view + '1';
        $views->update();
        return view('pages.vendorPage.makeUp.indreni',compact('values'));  
    }

    public function customizeVenue($id){
        $value = venue::find($id);
        $values = $value->email;
        $views = Approved::where(['email'=>$values])->first();
        $views->view = $views->view + '1';
        $views->update();
        return view('pages.vendorPage.makeUp.indreni',compact('values'));  
    }

    /*vendor details upload*/
    public function details(){
        return view ('pages.dashboard.vendor.vendorDetails');
    }

    public function post(){
        return view ('pages.dashboard.vendor.vendorPost');
    }

    public function auction(){
        return view ('pages.dashboard.vendor.auction');
    }

    public function auctions(Request $request, $emails){
        $request->validate([
            'bet' => 'required',
        ]);
        $betPrice = $request->bet;
        if ($betPrice < 5000){
            return redirect()->back()->with('status','Please enter value greater than auction price');
        } else{
            $user = Approved::where(['email'=>$emails])->first();
            $user->value=$request->input('bet');
            $user1 = Approved::where(['value'=>$request->input('bet')])->first();
            if (!$user1){
                $user->update();
                return redirect()->back()->with('status','Your price has been submitted');
            } else{
                return redirect()->back()->with('status','The entered price has already been taken');
            }
            
        }
    }

    public function vendorDetails(Request $request,$emails){
        $request->validate([
            'experience' => 'required',
            'service' => 'required',
            'payment' => 'required',
            'price' => 'required',
            'price1' => 'required',
            'date' => 'required',
            'txt' => 'required',
        ]);

        $user = vendorDetails::where(['email'=>$emails])->first();
        if (!$user)
        {
            $detail = new vendorDetails;
            $detail->experience=$request->experience;
            $detail->service=$request->service;
            $detail->payment=$request->payment;
            $detail->price=$request->price;
            $detail->price1=$request->price1;
            $detail->date=$request->date;
            $detail->location=$request->location;
            $detail->email=$emails;
            $detail->txt=$request->txt;
            $detail->save(); 
            return redirect()->back()->with('status','Successfully Updated');
        } else{
            vendorDetails::destroy($user->id);
            $detail = new vendorDetails;
            $detail->experience=$request->experience;
            $detail->service=$request->service;
            $detail->payment=$request->payment;
            $detail->price=$request->price;
            $detail->price1=$request->price1;
            $detail->date=$request->date;
            $detail->location=$request->location;
            $detail->email=$emails;
            $detail->txt=$request->txt;
            $detail->save(); 
            return redirect()->back()->with('status','Successfully Updated');
        }  
    }

    public function vendorPost(Request $request, $sessionEmail){
        $request->validate([
            'uploadDate' => 'required',
            'imgFile' => 'required',
            'caption' => 'required',
        ]);

            $post = new Post;
            $post->uploadDate = $request->uploadDate;
            $post->imgFile = $request->imgFile;
            $post->sessionEmail = $sessionEmail;
            $post->caption = $request->caption;
            $post->save();
            return redirect()->back()->with('status','Successfully Posted');
    }

    public function deletePost($id){
        $value = Post::find($id);
        $value->delete();
        return redirect()->back();
    }

    /*public function vendorPost(Request $request, $sessionEmail){
        $request->validate([
            'uploadDate' => 'required',
            'imgFile' => 'required',
            'caption' => 'required',
        ]);

        $sessionEmail = $sessionEmail;
        $user = Post::where(['sessionEmail'=>$sessionEmail])->first();
        if (!$user){
            $post = new Post;
            $post->uploadDate = $request->uploadDate;
            $post->imgFile = $request->imgFile;
            $post->sessionEmail = $sessionEmail;
            $post->caption = $request->caption;
            $post->save();
            return redirect()->back()->with('status','Successfully Posted');
        } else{
            Post::destroy($user->id);
            $post = new Post;
            $post->uploadDate = $request->uploadDate;
            $post->imgFile = $request->imgFile;
            $post->sessionEmail = $sessionEmail;
            $post->caption = $request->caption;
            $post->save();
            return redirect()->back()->with('status','Successfully Posted');
        }
        
   
    }*/

    /* Booking details */
    public function books($venEmail){
        
        $value = Approved::where(['email'=>$venEmail])->first();
      
        $values = $value->email;
        return view ('pages.vendorPage.makeUp.book',compact('values'));
    }

    public function book(Request $request, $emails){
        if($request->session()->has('user'))
        {
            $request->validate([
                'bookDate' => 'required',
                'service' => 'required',
               
            ]);   
            $customerMail=Session::get('user')['email'];
            $book = new bookDetail;
            $book->bookDate=$request->bookDate;
            $book->service=$request->service;
            $book->venEmail=$emails;
            $book->email=$customerMail;
            $book->save();

            $bookNo = Approved::where(['email'=>$emails])->first();
            $bookNo->bookNo = $bookNo->bookNo + '1';
            $bookNo->update();

            $vendor = Approved::where(['email'=>$emails])->first();
            $vendor->notify(new booked($vendor, $customerMail));
           
            $find = User::where(['email'=>$customerMail])->first();
            $vendName = $find->name;
            $data = ['name'=>$vendName, 'data'=>'has booked your vendor', 'us'=>'vendor'];
            $user['to'] = $emails;
            Mail::send('mail',$data,function($messages) use ($user){
                $messages->to($user['to']);
                $messages->subject('Alert New Booking!!');
            });

            return redirect()->back()->with('status','Booking complete !! Please proceed to advance payment'); 
        } else{
            return redirect('/custLogin');
        }  
    }

    public function anyBook(){
        return view ('pages.dashboard.vendor.anyBook');
    }

    public function bookingHistory(){
        $value = bookDetail::all();
        return view ('pages.dashboard.customer.customer',compact('value'));
    }

    public function payment(Request $request, $amount){
        return view ('pages.dashboard.customer.payment',compact('amount'));
    }

    public function newsFeed(){
        return view ('pages.dashboard.customer.newsfeed');
    }

    public function contacts(Request $request){
        $request->validate([
            'name' => 'required',
            'number' => 'required',
            'email' => 'required',
        ]);

        $contact = new contact;
        $contact->name=$request->name;
        $contact->number=$request->number;
        $contact->email=$request->email;
        $contact->comment=$request->comment;
        $contact->save(); 
        return redirect()->back()->with('status','Your info has been submitted, you will soon be contacted');
    }

    public function deleteContact($id){
            $value = contact::find($id);
            $value->delete();
            return redirect()->back();
    }
    
    public function markasread($id){
        $iid = Session::get('user')['id']; 
        $user = User::find($iid);
        if($id){
            $user->unreadNotifications->where('id', $id)->markAsRead();
        }
        return back();
    }

    public function mark_as_read($id){
        $iid = Session::get('user')['id']; 
        $user = Approved::find($iid);
        if($id){
            $user->unreadNotifications->where('id', $id)->markAsRead();
        }
        return back();
    }

}
