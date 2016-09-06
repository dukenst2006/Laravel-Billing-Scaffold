<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\UserProfileRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class UserProfileController extends Controller
{

	public function index()
	{
		$user = Auth::user();    
        if ( $user->hasRole('super_admin') ) {
		  $invoices = $user->invoices();
        } else {
            $invoices = '';
        }
        $users = Auth::user()->company->users;
        return view('dashboard.userprofile.index', compact('user', 'invoices', 'users'));
	}

    public function update(UserProfileRequest $request, $id)
    {
    	$current_time = Carbon::now()->toDateString();
    	$user = Auth::user();

    	$user->first_name = $request->first_name;
    	$user->last_name = $request->last_name;
    	$user->email = $request->email;
    	$user->image = $request->file('image')->store('avatars');
    	$user->phone = $request->phone;
    	$user->phone2 = $request->phone2;
    	$user->url = $request->url;
    	$user->save();

    	flash('You\'ve updated your profile.', 'success');
    	return redirect()->back();
    }

}
