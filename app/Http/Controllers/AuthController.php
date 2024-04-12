<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
   public function home()
    {
        return view('home');
    }

  public function loginpage()
    {
        return view('login');
    }

   public function login(Request $request){
     $validation = Validator::make($request->all(), [
          'email'    => 'required|email',
          'password' => 'required|string',
            [
                'email.required' => 'email is required',
                'password.required'=>'password is required',             
            ]
      ]);

    if ($validation->fails()) {
        session()->flash('errors', $validation->errors());
        return redirect()->back();
    }

    $user = User::where('email','=', $request->email)->first();
    if($user)
    {
      if(Hash::check($request->password, $user->password))
      {
          session()->put('name', $user->name);
          session()->put('user_id', $user->id);
          session()->put('user', $user);
          session()->flash('success', 'Access Granted; Session Begin...');
           return redirect()->route("auths.dashboard");
      }
	 else{
        return redirect()->back()->withErrors(['errors' => 'Incorrect Password, Try again.']);
      }
    }
    else{
        return redirect()->back()->withErrors(['errors' => 'Email does not exist.']);
    }
  
  }


// user registration
public function store(Request $request)
{
    $validatedInput = Validator::make($request->all(), [
        'name' => 'required|string|max:225',
        'email' => 'required|string|max:225|unique:users,email',
        'password' => 'required|string|max:10|confirmed',
    ], [
        'email.required' => 'Email is required',
        'password.required' => 'Password is required',
    ]);

    if ($validatedInput->fails()) {
        return redirect()->back()->withErrors($validatedInput)->withInput();
    }

    $input = $request->all();
    $input['password'] = Hash::make($input['password']);
    $user = User::create($input);

  session()->flash('success', 'Account Created Successfully.');
  return redirect()->back();
}


  public function logout(){
    if(Session::has('user')){
      Session::pull('user');
     return redirect()->route("auths.loginpage");
    }
  }
}