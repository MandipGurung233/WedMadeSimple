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
use Illuminate\Support\Facades\Storage;
use App\Models\Approved;
use App\Models\vendorDetails;
use App\Models\Post;
use App\Models\User;
use App\Models\vendorDate;
use App\Models\service;
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

    public function setting(){
        return view ('pages.dashboard.vendor.setting');
    }

    public function updateCustomer(){
        return view ('pages.dashboard.customer.customerInfo');
    }

    public function editInf($id){
        $approved = Approved::find($id);
        return view('pages.dashboard.vendor.settingUpdate',compact('approved'));
    }

    public function editCustomer($id){
        $approved = User::find($id);
        return view('pages.dashboard.customer.customerInformation',compact('approved'));
    }

    public function updateApprove(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'password' => 'required',
            'description' => 'required',
            'img' => 'required',
        ]);

        

        $book = Approved::find($id);
        $book->name = $request->input('name');
        $book->address = $request->input('address');
        $book->password = $request->input('password');
        $book->description = $request->input('description');
        
        if($request->hasfile('img')){
            $destination = 'uploads/vendor/'.$book->img;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/vendor/', $filename);
            $book->img = $filename;
        }
        $book->update();
        return redirect()->back()->with('status','Information updated');
    }

    public function updateApproved(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);

        

        $book = User::find($id);
        $book->name = $request->input('name');
        $book->address = $request->input('address');
        $book->update();
        return redirect()->back()->with('status','Information updated');
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
        return view ('pages.dashboard.admin.admin');
    }

    public function vendorDash(){
        return view ('pages.dashboard.vendor.vendor');
    }

    public function destroy($id){
        $value = Approved::find($id);
        $value->delete();
        return redirect()->back();
    }

    public function destroyID($id){
        $value = vendorDate::find($id);
        $value->delete();
        return redirect()->back();
    }

    public function file(Request $request,$file){
        return response()->download(public_path('uploads/doc/'.$file));
    }

    public function view($id){
        $value = Approved::find($id);
        return view('viewFile',compact('value'));
    }

    public function destroyBooking($id){
        $value = bookDetail::find($id);
        $venEmail = $value->venEmail;
        $value1 = $value->email;
        $user = User::where(['email'=>$value1])->first();
        $user->notify(new booking($user, $value));

        /*$find = Approved::where(['email'=>$venEmail])->first();
        $vendName = $find->name;
        $data = ['name'=>$vendName,'data'=>'cancelled your booking', 'us'=>'User'];
        $user['to'] = $value1;
        Mail::send('mail',$data,function($messages) use ($user){
            $messages->to($user['to']);
            $messages->subject('Booking Cancellation !!');
        });*/
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

    /*public function destroyApprove($id){
        $value = Approved::find($id);
        $value->delete();
        return redirect()->back();
    }*/

    public function approved($id){
        $request = Approved::find($id);
        $request->approves = $request->approves = '1';
        $request->update();
        /*$approved = new Approved;
        $approved->name=$request->name;
        $approved->address=$request->address;
        $approved->email=$request->email;
        $approved->password=$request->password;
        $approved->vendorType=$request->vendorType;
        $approved->file=$request->file;
        $approved->description=$request->description;
        $approved->save(); 
        $request->delete();*/
        return redirect()->back()->with('status','Successfully Approved');
    }

    public function customize($email){
        $values = $email;
        $views = Approved::where(['email'=>$values])->first();
        $views->view = $views->view + '1';
        $views->update();
        return view('pages.vendorPage.makeUp.indreni',compact('values'));  
    }

    public function customizeVenue($email){
        $values = $email;
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

    public function vendorService(Request $request,$emails){
        $request->validate([
            'service' => 'required',
            'price' => 'required',
        ]);

        $user = service::where(['email'=>$emails])->first();    
        if (!$user){
            $detail = new service;
            $detail->service=$request->service; 
            $detail->price=$request->price; 
            $detail->email=$emails;
            $detail->save(); 
            return redirect()->back()->with('status','Successfully Updated');    
        } else{
            $service = service::all();
            $seer = array();
            foreach ($service as $services){
                $emai = $services->email;       
                if ($emai == $emails){
                    $see = $services->service;
                    array_push($seer, $see);
                }
            }
            $total = count($seer);
           
             
            if ($total == 2){
                foreach ($service as $services){
                    $emai = $services->email;
                    if ($emai == $emails){
                        $serviceType = $services->service;
                        if ($serviceType == $request->service){
                            service::destroy($services->id);
                            $detail = new service;
                            $detail->service=$request->service; 
                            $detail->price=$request->price; 
                            $detail->email=$emails;
                            $detail->save(); 
                            return redirect()->back()->with('status','Successfully Updated');
                        }
                    }        
                }
            } elseif ($total == 1){
                foreach ($service as $services){
                    $emai = $services->email;
                    if ($emai == $emails){
                        $serviceType = $services->service;
                        if ($serviceType == $request->service){
                            service::destroy($services->id);
                            $detail = new service;
                            $detail->service=$request->service; 
                            $detail->price=$request->price; 
                            $detail->email=$emails;
                            $detail->save(); 
                            return redirect()->back()->with('status','Successfully Updated');
                        } else{
                            $detail = new service;
                            $detail->service=$request->service; 
                            $detail->price=$request->price; 
                            $detail->email=$emails;
                            $detail->save(); 
                            return redirect()->back()->with('status','Successfully Updated');
                        }
                    }        
                }
            }
        }
    }

    public function vendorDate(Request $request,$emails){
        $request->validate([
            'date' => 'required',
        ]);
            $detail = new vendorDate;
            $detail->date=$request->date; 
            $detail->email=$emails;
            $detail->save(); 
            return redirect()->back()->with('status','Successfully Updated');    
    }

    public function vendorDetails(Request $request,$emails){
        $request->validate([
            'experience' => 'required',
            'payment' => 'required',
        ]);

        $user = vendorDetails::where(['email'=>$emails])->first();
        if (!$user)
        {
            
            $detail = new vendorDetails;
            $detail->experience=$request->experience; 
            $detail->payment=$request->payment; 
            $detail->email=$emails;
            $detail->save(); 
            return redirect()->back()->with('status','Successfully Updated');
        } else{
            vendorDetails::destroy($user->id);
            $detail = new vendorDetails;
            $detail->experience=$request->experience; 
            $detail->payment=$request->payment; 
            $detail->email=$emails;
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
            if($request->hasfile('imgFile')){
                $file = $request->file('imgFile');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('uploads/postImg/',$filename);
                $post->imgFile = $filename;    
            }
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
                'comment' => 'required'
               
            ]); 
            $booking = bookDetail::all(); 
            $vendorDate = vendorDate::all();
            $customerMail=Session::get('user')['email'];
            $find = User::where(['email'=>$customerMail])->first();
            if ($find){
                $value = '0';
                foreach ($booking as $detail){
                    if ($detail->venEmail == $emails && $detail->email == $customerMail){
                        $value = '1';
                        return redirect()->back()->with('status','Already Booked !!');  
                        break;
                    } 
                }

                foreach ($vendorDate as $vendorDates){
                    if ($vendorDates->email == $emails){
                        if ($vendorDates->date == $request->bookDate){
                            return redirect()->back()->with('status','Not available on that date');
                            break;
                        }
                    }
                }
                $book = new bookDetail;
                $book->bookDate=$request->bookDate;
                $book->service=$request->service;
                $book->venEmail=$emails;
                $book->email=$customerMail;
                $book->comment=$request->comment;
                $book->save();

                $bookNo = Approved::where(['email'=>$emails])->first();
                $bookNo->bookNo = $bookNo->bookNo + '1';
                $bookNo->update();

                $vendor = Approved::where(['email'=>$emails])->first();
                $vendor->notify(new booked($vendor, $customerMail));
            
                /*$find = User::where(['email'=>$customerMail])->first();
                $vendName = $find->name;
                $data = ['name'=>$vendName, 'data'=>'has booked your vendor', 'us'=>'vendor'];
                $user['to'] = $emails;
                Mail::send('mail',$data,function($messages) use ($user){
                    $messages->to($user['to']);
                    $messages->subject('Alert New Booking!!');
                });*/

                return redirect()->back()->with('status','Booking complete !! Please proceed to advance payment'); 
    
            }else{
                return redirect()->back()->with('status','Please login as a customer to book !!'); 
            }
        } else{
            return redirect('/custLogin');
        }  
    }

    public function search(Request $request){
        $approved = Approved::all();
        $search = request()->query('search');
        if(!$search){
            return redirect('/');
        }
        $id = array();
        foreach ($approved as $approve){
            $location = $approve->address;
            $idd = $approve->id;
            $location1 = $request->search;
            if (strtolower($location) == strtolower($location1)){
                array_push($id, $idd);
            }
        }
        if (!$id){
            return back()->with('status','!! No any properties on that location');
        }
        else{
            return view ('pages.home.search',compact('id'));   
        }
        
    }


    public function anyBook(){
        return view ('pages.dashboard.vendor.anyBook');
    }

    public function bookingHistory(){
        $value = bookDetail::all();
        return view ('pages.dashboard.customer.customer',compact('value'));
    }

    public function payment(Request $request, $id){
        return view ('pages.dashboard.customer.payment',compact('id'));
    }

    public function vendorPayment($id){
        return view ('pages.dashboard.vendor.vendorPayment',compact('id'));
    }

    public function newsFeed(){
        return view ('pages.dashboard.customer.newsfeed');
    }

    public function replyContact($email){
        return view ('pages.dashboard.admin.replyContact',compact('email'));
    }

    public function replyAdmin(Request $request, $email){
        $request->validate([
            'reply' => 'required',
        ]);

        $values = $email;
        $views = Contact::where(['email'=>$values])->first();
        $views->reply = $request->reply;
        $views->update();

        $data = ['comment'=>$request->reply];
        $user['to'] = $email;
        Mail::send('mail1',$data,function($messages) use ($user){
            $messages->to($user['to']);
            $messages->subject('Wed Made Simple!!');
        });
        return redirect()->back()->with('status','replied');
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
