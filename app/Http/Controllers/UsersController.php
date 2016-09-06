<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Auth::user()->company->users;
        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {    
        $user = User::register([
            'first_name' => $request->first_name, 
            'last_name' => $request->last_name, 
            'email' => $request->email, 
            'password' => bcrypt(str_random(20)),
            'address' => $request->address,
            'address2' => $request->address2,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'image' => $request->file('image')->store('avatars'),
            'phone' => $request->phone,
            'phone2' => $request->phone2,
            'url' => $request->url,
            'activate_token' => strtolower(str_random(64)),
        ]);

        Auth::user()->subscription('main')->incrementQuantity();
        
        flash('You added a user! Your new user was sent an email with their email and password. Your billing will now be updated.','success');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Auth::user()->company;
        $user = User::findOrFail($id);
        if ( $user->company->id != $company->id ) {
            flash('Sorry, you can\'t access that user.', 'danger');
            return redirect()->route('users.index');
        }

        return view('dashboard.users.show', compact('user'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->first_name = $request->first_name; 
        $user->last_name = $request->last_name; 
        $user->email = $request->email; 
        $user->address = $request->address;
        $user->address2 = $request->address2;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->zip = $request->zip;
        if ( $request->file('image') ) { 
            $user->image = $request->file('image')->store('avatars');
        } else {
            $user->image = $user->image;
        }
        $user->phone = $request->phone;
        $user->phone2 = $request->phone2;
        $user->url = $request->url;
        $user->save();
        
        flash('You updated the user!','success');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->company()->dissociate()->save();
        $user->delete();
        
        Auth::user()->subscription('main')->decrementQuantity();

       flash('You have deleted the user. We have updated your billing to reflect the change.', 'success');
       return redirect()->route('users.index');
    }
}
