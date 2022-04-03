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

        $user1 = Vendor::where(['email'=>$request->email])->first();
        $user = Approved::where(['email'=>$request->email])->first();
        if (!$user1){
            if (!$user){
                return redirect()->back()->with('status','Incorrect email or password');
            } else{
                $password = $user->password;
                $Password1 = $request->password;
                if ($password == $Password1){
                    $request->session()->put('user',$user);
                    return redirect('/vendDash');
                } else{
                    return redirect()->back()->with('status','Incorrect email or password');
                }
            }
        } else{
            return redirect()->back()->with('status','Still pending');
      
        }
        
        /*$user = Approved::where(['email'=>$request->email])->first();
        if (!$user){
            return redirect()->back()->with('status','Incorrect email or password');
        } else{
            $password = $user->password;
            $Password1 = $request->password;
            if ($password == $Password1){
                $request->session()->put('user',$user);
                return redirect('/vendDash');
            } else{
                return redirect()->back()->with('status','Incorrect password');
            }
        }*/
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
            'email' => 'required|unique:vendors|unique:admins|unique:users|unique:approveds',
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
            'email' => 'required|unique:vendors|unique:admins|unique:users',     
            'password' => 'required',
            'vendorType' => 'required',
            'file' => 'required',
        ]);

        if(isset($_POST['signin'])){
            $purpose = $_POST['vendorType'];
        }

        $vendor = new Vendor;
        $vendor->name=$request->name;
        $vendor->address=$request->address;
        $vendor->email=$request->email;
        $vendor->password=$request->password;
        $vendor->vendorType=$purpose;
        $vendor->file=$request->file;
        if($request->hasfile('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/doc/',$filename);    
        }
        $vendor->save();
        return redirect()->back()->with('status','Pending');
        
    }

}
