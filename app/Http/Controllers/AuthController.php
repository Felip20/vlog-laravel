<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class AuthController extends Controller
{
    public function create()
    {   
        return view('auth.register');
    }
    public function store()
    {   
        $form=request()->validate([
            'name'=>['required','max:255','min:3'],
            'email'=>['required','email',Rule::unique('users','email')],
            'username'=>['required','min:3','max:255',Rule::unique('users','username')],
            'password'=>['required','min:8']
        ]);
        
        $user=User::create($form);

        auth()->login($user);

        return redirect('/')->with('help','Welcome,'.$user->name);
    }

    public function login(){
        return view('auth.login');
    
    }
    public function post_login(){
        $form=request()->validate([
            'email'=>['required','email',Rule::exists('users','email')],
            'password'=>['required','min:8']

        ],[
            'email.required'=>'We need your email.',
            'password.min'=>'Password need to be aleast 8 characters'
        ]);
        if (auth()->attempt($form)) {
            if (auth()->user()->is_admin) {
                return redirect('/admin/posts');
            }
            else {
                return redirect('/')->with('help','Welcome back.'); 
            }
        }
        else {
            return redirect()->back()->withErrors([
                'email'=>'Wrongs email'
            ]);
        }
        
    }

    public function logout(){
        auth()->logout();
        return redirect('/')->with('help','Goodbye');
    }
}
