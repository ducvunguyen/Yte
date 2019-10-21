<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
	public function showlogin()
	{
		return view('admin.login.showlogin');
	}

	public function login(Request $request)
	{
		$email = $request->email;
		$password = $request->password;
		if (Auth::attempt(['email' => $email, 'password' => $password ])) {
    		return redirect()->route('admin.dashboard')->with('success', 'Dang nhap thanh cong');
		}
		else
		{
			return redirect()->route('login.showlogin')->with('fail', 'Dang nhap that bai');
		}
	}

	 public function logout(){

        Auth::logout();
        return redirect(route('login.showlogin'));
    }
}
