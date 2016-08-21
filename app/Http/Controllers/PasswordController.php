<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PasswordController extends Controller
{
    public function update(Request $request, $id)
    {
    	$validator = Validator::make($request->all(), [
            'current_password'  => 'required|min:8|passwordMatch',
            'password' => 'required|min:8|confirmed|different:current_password'
        ]);

        if ($validator->fails()) {
            return redirect('/user-profile#password')
                        ->withErrors($validator)
                        ->withInput();
        }

        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();

        flash('You\'ve updated your password.', 'success');
        return redirect('/user-profile#password');
    }
}
