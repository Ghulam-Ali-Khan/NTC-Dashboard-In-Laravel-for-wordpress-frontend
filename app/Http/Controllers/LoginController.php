<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
  public function loginPost(Request $request)
  {
    $request->validate([
        'email' => 'required',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        return redirect('/home')->withSuccess('You have Successfully loggedin');
    }

    return redirect("/")->withSuccess('Oppes! You have entered invalid credentials');
  }
}
