<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create()

    {
        return view('users.login');
    }

    public function store(LoginRequest $request)
    {
    


    $user = User::where('email', $request->email)->first();

    if(! $user) {

     throw ValidationException::withMessages([
        'email'=>'the email is not registered'
      ]);

        return redirect('login');
    }


    $credentials = [
        'email' => $user->email,
        'password' => $request->password,
    ];

    if(! Auth::attempt($credentials)) {

       

       throw ValidationException::withMessages([
            'email'=>'email or password is not incorrect'
        ]);
            
        

        return redirect('login');
    }

    return redirect('posts');

      
    }


    public function destroy()
    {
        Auth::logout();

        return redirect('login');
    }
}
