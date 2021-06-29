<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
        public function login(Request $request){

            // dd($request->all());
             $user=User::where(['email'=>$request->email])->first();

                if(!$user || !Hash::check($request->password,$user->password))
                {
                   return 'username or password is incorrect';

                }
                else {
                        $request->session()->put('user',$user);
                    return redirect()->route('index');
                }
    }
    public function register(Request $request)
    {

        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->save();

        return redirect()->route('login');

    }
}
