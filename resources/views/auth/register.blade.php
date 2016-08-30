@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form" id="subscription-form" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
                        
                        <!-- Personal Information -->
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <h4>Your Information</h4>
                            </div>
                        </div>

                        <div class="row">   
                            <div class="col-md-6 form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <label for="first_name" class="control-label">First Name</label>
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" autofocus> 
                                @if ($errors->has('first_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span> 
                                @endif
                            </div>
                            <div class="col-md-6 form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <label for="last_name" class="control-label">Last Name</label>
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" autofocus> 
                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="control-label">E-Mail Address</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"> 
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="control-label">Password</label>
                                <input id="password" type="password" class="form-control" name="password"> 
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6 form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password-confirm" class="control-label">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"> 
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  

                        <hr>
                        <!-- Company Information -->
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <h4>Company Information</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="control-label">Company Name</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"> 
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group {{ $errors->has('main_phone') ? ' has-error' : '' }}">
                                <label for="main_phone" class="control-label">Company Phone Number</label>
                                <input id="main_phone" type="text" class="form-control" name="main_phone" value="{{ old('main_phone') }}"> 
                                @if ($errors->has('main_phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('main_phone') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address" class="control-label">Address</label>
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}"> 
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group {{ $errors->has('address2') ? ' has-error' : '' }}">
                                <label for="address2" class="control-label">Address Cont.</label>
                                <input id="address2" type="text" class="form-control" name="address2" value="{{ old('address2') }}"> 
                                @if ($errors->has('address2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address2') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 form-group {{ $errors->has('city') ? ' has-error' : '' }}">
                                <label for="city" class="control-label">City</label>
                                <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}"> 
                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span> 
                                @endif
                            </div>
                            <div class="col-md-4 form-group {{ $errors->has('state') ? ' has-error' : '' }}">
                                <label for="state" class="control-label">State</label>
                                <input id="state" type="text" class="form-control" name="state" value="{{ old('state') }}"> 
                                @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span> 
                                @endif
                            </div>
                            <div class="col-md-4 form-group {{ $errors->has('zip') ? ' has-error' : '' }}">
                                <label for="zip" class="control-label">Postal Code</label>
                                <input id="zip" type="text" class="form-control" name="zip" value="{{ old('zip') }}"> 
                                @if ($errors->has('zip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zip') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div>

                        <hr>
                         <!-- Payment Information -->
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <h4>Payment Information</h4>
                                <p><small>Please fill out your payment information. After your <strong>free trial (30 days)</strong>, you will be charged <strong>$49.99 per user per month.</strong> Don't worry you can always change this information later.</small></p>
                                <p><i><small>Accepted Payment Methods</small></i></p>
                                <p><i class="fa fa-cc-visa" aria-hidden="true"></i> <i class="fa fa-cc-mastercard" aria-hidden="true"></i> <i class="fa fa-cc-amex" aria-hidden="true"></i> <i class="fa fa-cc-jcb" aria-hidden="true"></i> <i class="fa fa-cc-discover" aria-hidden="true"></i> <i class="fa fa-cc-diners-club" aria-hidden="true"></i></p>
                            </div>
                            <span class="payment-errors"></span>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group{{ $errors->has('card_number') ? ' has-error' : '' }}">
                                <label for="card_number" class="control-label">Credit Card Number</label>
                                <input id="card_number" type="text" class="form-control" name="card_number" value="{{ old('card_number') }}" data-stripe="number"> 
                                @if ($errors->has('card_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('card_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="row">    
                            <div class="col-md-6 form-group{{ $errors->has('exp_month') ? ' has-error' : '' }}">
                                <label for="exp_month" class="control-label">Exp Month</label>
                                <input id="exp_month" type="text" class="form-control" name="exp_month" value="{{ old('exp_month') }}" data-stripe="exp_month"> 
                                @if ($errors->has('exp_month'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('exp_month') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6 form-group{{ $errors->has('exp_year') ? ' has-error' : '' }}">
                                <label for="exp_year" class="control-label">Exp Year</label>
                                <input id="exp_year" type="text" class="form-control" name="exp_year" value="{{ old('exp_year') }}" data-stripe="exp_year"> 
                                @if ($errors->has('exp_year'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('exp_year') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">    
                            <div class="col-md-6 form-group{{ $errors->has('cvc') ? ' has-error' : '' }}">
                                <label for="cvc" class="control-label">CVC</label>
                                <input id="cvc" type="text" class="form-control" name="cvc" value="{{ old('cvc') }}" data-stripe="cvc"> 
                                @if ($errors->has('cvc'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cvc') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6 form-group{{ $errors->has('billing_zip') ? ' has-error' : '' }}">
                                <label for="billing_zip" class="control-label">Billing Zip Code</label>
                                <input id="billing_zip" type="text" class="form-control" name="billing_zip" value="{{ old('billing_zip') }}" data-stripe="address_zip"> 
                                @if ($errors->has('billing_zip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('billing_zip') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">    
                            <div class="col-md-12 form-group">
                                <div class="col-md-8 col-md-offset-2">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        <i class="fa fa-btn fa-user"></i> Start Your Free Trial
                                    </button>
                                    <p class="text-center"><small>By signing up you agree to our <a href="#">Terms of Services</a>  and  <a href="#">Privacy Policy.</a></small></p>
                                </div>
                            </div>
                        </div>    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script>
    Stripe.setPublishableKey('{{ config('services.stripe.key') }}');
    jQuery(function($) {
        $('#subscription-form').submit(function(event) {
            var $form = $(this);
            $form.find('button').prop('disabled', true);
            Stripe.card.createToken($form, stripeResponseHandler);

            return false;
        });
    });

    var stripeResponseHandler = function(status, response) {
        var $form = $('#subscription-form');

        if (response.error) {
            $form.find('.payment-errors').text(response.error.message);
            $form.find('button').prop('disabled', false);
        } else {
            var token = response.id;
            $form.append($('<input type="hidden" name="stripeToken" />').val(token));
            $form.get(0).submit();
        }
    };
</script>
@endsection
