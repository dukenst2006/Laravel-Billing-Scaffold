<?php

namespace App;
use App\Company;
use Carbon\Carbon;
use Laravel\Cashier\Billable;
use App\Events\UserRegistered;
use App\Events\AdminRegistered;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    
    use Notifiable;
    use Billable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 
        'last_name', 
        'email', 
        'password',
        'address',
        'address2',
        'city',
        'state',
        'zip',
        'image',
        'phone',
        'phone2',
        'url',
        'activate_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // An Admin Adds a User
     public static function register($attributes)
    {
        $user = static::create($attributes);
        
        $user->company()->associate(Auth::user()->company)->save();
        $user->roles()->attach(3);

        DB::table('password_resets')->insert([
            'email' => $user->email,
            'token' => $user->activate_token,
            'created_at' => Carbon::now(),
        ]);

        event(new UserRegistered($user));
        return $user;
    }

    public static function adminRegister($attributes) {
        $user = static::create([
            'first_name' => $attributes['first_name'],
            'last_name' => $attributes['last_name'],
            'email' => $attributes['email'],
            'password' => bcrypt($attributes['password']),
        ]);
        
        $company = Company::create([
            'name' => $attributes['name'],
            'address' => $attributes['address'],
            'address2' => $attributes['address2'],
            'city' => $attributes['city'],
            'state' => $attributes['state'],
            'zip' => $attributes['zip'],
            'main_phone' => $attributes['main_phone'],
        ]); 

        $user->newSubscription('main', 'roofing_monthly')->trialDays(30)->create($attributes['stripeToken'], [
            'email' => $user->email, 
            'description' => 'Customer from Outline Roofing',
            'metadata' => [
                'Client Name' => $user->first_name .' '. $user->last_name,
            ]
        ]);

        $user->roles()->attach(1);
        $user->company()->associate($company)->save();
        event(new AdminRegistered($user));
        return $user;
    }

    // Relationships
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

}
