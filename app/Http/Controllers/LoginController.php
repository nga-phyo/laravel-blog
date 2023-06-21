<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create(){

        return view('auth.login');
    }

    public function store(LoginRequest $request){

     $user = User::where('email',$request->email)->first();

        if(! $user){

            throw ValidationException::withMessages([
                'email' => 'The email is not registered',
            ]);

          return redirect('login');
        }

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

       if(! Auth::attempt($data) ){

        
       throw ValidationException::withMessages([
            'email' => 'The email or Password is incorrect',
        ]);

        return redirect('login');
       }
       
       return redirect('/posts');
      
    }

    public function destroy(){

        Auth::logout();

        return redirect('login');
    }

  


}
