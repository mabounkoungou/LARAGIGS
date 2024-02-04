<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    //WANT TO DISPLAY LOGIN  AND RESGISTRATION PAGE
    public function registration(){
        return view("front.account.registration");
    }

    public function processRegistration(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|same:confirm_password',
            'confirm_password' => 'required',
        ]);
    
        if ($validator->passes()) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            session()->flash('success','You have successfully registered at LARA-GIGS.');

            return response()->json([
                'status' => true,
                'errors' => []
            ]);
            
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }
    

    public function login(){
        return view('front.account.login');
    }

    public function authenticate(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->passes()){
            if (Auth::attempt(['email'=> $request->email,'password'=> $request->password])){
                return redirect()->route('account.profile');
            }
            else{
                return redirect()->route('account.login')->with('error','Either Email/Password is incorrect');
            }
        }else{
            return redirect()->route('account.login')
            ->withErrors($validator)
            ->withInput($request->only('email'));
        }
    }
    public function profile(){

        $id =Auth::user()->id;
        $user = user::where('id',$id)->first();
         

        return view('front.account.profile',[
            'user'=> $user
        ]);
    }

    public function updateprofile(Request $request){
        $id = Auth::user()->id;
    
        $validator = Validator::make($request->all(),[
            'name' => 'required|min:5|max:25',
            'email'=> 'required|email|unique:users,email,'.$id.',id'

        ]);
        
        if ($validator->passes()){
            $user = user::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->designation = $request->designation;
            $user->save();

            session()->flash('success','profile updated succesfully');

            return response()->json([
                'status' => true,
                'errors' => []
            ]);
        }
        
        else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

    
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('account.login');
    }


}
