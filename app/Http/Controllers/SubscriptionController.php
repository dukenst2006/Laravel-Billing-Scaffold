<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SubscriptionController extends Controller
{
    public function index()
    {
      # code...
    }

    public function update($id)
    {
      $user = Auth::user();
      $user->subscription('main')->resume();

      flash('You\'ve resumed your subscription.', 'success');
      return redirect()->back();
    }

    public function updateCC(Request $request)
    {
      $user = Auth::user();
      $user->updateCard($request->stripeToken);

      flash('You\'ve updated your payment information.', 'success');
      return redirect('user-profile#subscription');
    }


    public function destroy($id)
    {
      $user = Auth::user();
      $user->subscription('main')->cancel();
      flash('You\'ve cancelled your subscription.', 'success');
      return redirect('user-profile');
    }

    
}
