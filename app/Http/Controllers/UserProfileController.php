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
		$invoices = $user->invoices();

	   	return view('dashboard.userprofile.index', compact('user', 'invoices'));
	}

    public function update(UserProfileRequest $request, $id)
    {
    	$current_time = Carbon::now()->toDateString();
    	$user = Auth::user();

    	$user->first_name = $request->first_name;
    	$user->last_name = $request->last_name;
    	$user->email = $request->email;
    	if ( $request->image ) {
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            Storage::disk('local')->put(
                    'person-images/'.$user->first_name.$user->last_name.'-avatar'.$current_time.'.'.$extension,
                    file_get_contents($request->file('image')->getRealPath())
            );
            $user->image = $user->first_name.$user->last_name.'-avatar'.$current_time.'.'.$extension;
        } else {
            $user->image = $user->image;
        }
    	$user->phone = $request->phone;
    	$user->phone2 = $request->phone2;
    	$user->url = $request->url;
    	$user->save();

    	flash('You\'ve updated your profile.', 'success');
    	return redirect()->back();
    }

}
