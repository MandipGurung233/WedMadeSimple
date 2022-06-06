<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\Admin;
use App\Models\Vendor;
use App\Models\Approved;
use Session;

class logging extends Controller
{
    public function customerLogin(Request $request)
    {

        
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where(['email'=>$request->email])->first();
        if (!$user || !Hash::check($request->password,$user->password))
        {
            return redirect()->back()->with('status','Incorrect email or password');

        }
        else{
            $request->session()->put('user',$user);
            return redirect('/custDash');
        }
    }

    public function vendorLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user1 = Approved::where(['email'=>$request->email])->first();
        if ($user1){
            $approved = $user1->approves;
            if (!$approved){
                return redirect()->back()->with('status','still pending');
            } else{
                $password = $user1->password;
                $Password1 = $request->password;
                if ($password == $Password1){
                    $request->session()->put('user',$user1);
                    return redirect('/vendDash');
                } else{
                    return redirect()->back()->with('status','Incorrect email or password');
                }
            }
        } else{
            return redirect()->back()->with('status','Incorrect email or password');
      
        }
        
    }

    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $user=Admin::where(['email'=>$request->email])->first();
        if (!$user || !Hash::check($request->password,$user->password))
        { 
            return redirect()->back()->with('status','Incorrect email or password');       
        }else{
            $request->session()->put('user',$user);
            return redirect('/adminDashboard');
        }
    }

    public function logout(){
        Session::forget('user');
        return redirect ('/');   
    }

    public function customerRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'email' => 'required|unique:admins|unique:users|unique:approveds',
            'check' => 'required',
            'password' => 'required',
        ]);

        
       if(isset($_POST['signin'])){
            $purpose = $_POST['check'];
            $purposes_list = '';
            foreach((array)$purpose as $purposes)
            {
                $purposes_list .= $purposes.',';
            }
        }
        $user = new User;
        $user->name=$request->name;
        $user->address=$request->address;
        $user->email=$request->email;
        $user->check=implode(',', (array)$purposes_list);
        $user->password=Hash::make($request->password);
        $user->save();
        return redirect()->back()->with('status','Successfully registered');
    }

    public function vendorRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'email' => 'required|unique:admins|unique:users|unique:approveds',     
            'password' => 'required',
            'vendorType' => 'required',
            'file' => 'required',
            'description' => 'required'
        ]);

        if(isset($_POST['signin'])){
            $purpose = $_POST['vendorType'];
        }

         
        $approved = new Approved;
        $approved->name=$request->name;
        $approved->address=$request->address;
        $approved->email=$request->email;
        $approved->password=$request->password;
        $approved->vendorType=$purpose;
        if($request->hasfile('file')){
            $file = $request->file('file');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/doc/',$filename);
            $approved->file = $filename;    
        }
        if($request->hasfile('img')){
            $file = $request->file('img');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/vendor/',$filename);
            $approved->img = $filename;    
        }
        $approved->description=$request->description;
        $approved->save();
        return redirect()->back()->with('status','Pending');
        /*
        $vendor = new Vendor;
        $vendor->name=$request->name;
        $vendor->address=$request->address;
        $vendor->email=$request->email;
        $vendor->password=$request->password;
        $vendor->vendorType=$purpose;
        $vendor->file=$request->file;
        $vendor->description=$request->description;
        if($request->hasfile('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/doc/',$filename);    
        }
        $vendor->save();*/
   
        
    }

}
