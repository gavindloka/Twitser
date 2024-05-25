<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $request){
        $credential = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if(Auth::attempt($credential)){
            return redirect()->route('home');
        }
    }
    public function login_page(){

        return view("LandingPage/login");
    }


    public function register(Request $request){
        $rules = [
            'image' => 'required|mimes:jpg,png,jpeg',
            'email' => 'required|email',
            'phone_number' => 'required|min:12',
            'username' => 'required|min:5|max:20',
            'password' => 'required|min:5|max:20',
            'bio' => 'required|min:10'
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $random_role = ['admin', 'member'][rand(0, 1)];
        $file = $request->file('image');
        $image_name = time().'.'.$file->getClientOriginalExtension();
        Storage::putFileAs("public/images", $file, $image_name);
        $image_url = 'images/'.$image_name;
        $data = [
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'url' => $image_url,
            'phone_number' => $request->phone_number,
            'bio' => $request->bio,
            'is_verified' => 'no',
            'role' => $random_role,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ];

        DB::table('users')->insert($data);
        return view('LandingPage/login');
    }
    public function register_page(){
        return view("LandingPage/register");
    }

    public function profile(){
        return $this->show(auth()->user());
    }
}
