@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" id="subscription-form" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="col-md-4 control-label">First Name</label>
                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" autofocus> 
                                
                                @if ($errors->has('first_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span> 
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="col-md-4 control-label">Last Name</label>
                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" autofocus> 
                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"> 
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password"> 
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"> 
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="col-md-offset-4 col-md-8">
                                <h3>Payment Information</h3>
                                <p><small>Please fill out your payment information. You will be charged $49.99 per user every month. Don't worry you can always change this information later.</small></p>
                                <p><i><small>Accepted Payment Methods</small></i></p>
                                <p><i class="fa  fa-cc-visa" aria-hidden="true"></i> <i class="fa  fa-cc-mastercard" aria-hidden="true"></i> <i class="fa  fa-cc-amex" aria-hidden="true"></i> <i class="fa  fa-cc-jcb" aria-hidden="true"></i> <i class="fa  fa-cc-discover" aria-hidden="true"></i> <i class="fa  fa-cc-diners-club" aria-hidden="true"></i></p>
                            </div>
                        </div>
                        <span class="payment-errors"></span>
                        <div class="form-group{{ $errors->has('card_number') ? ' has-error' : '' }}">
                            <label for="card_number" class="col-md-4 control-label">Credit Card Number</label>
                            <div class="col-md-6">
                                <input id="card_number" type="text" class="form-control" name="card_number" value="{{ old('card_number') }}" data-stripe="number"> 
                                @if ($errors->has('card_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('card_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('exp_month') ? ' has-error' : '' }}">
                            <label for="exp_month" class="col-md-4 control-label">Exp Month</label>
                            <div class="col-md-6">
                                <input id="exp_month" type="text" class="form-control" name="exp_month" value="{{ old('exp_month') }}" data-stripe="exp_month"> 
                                @if ($errors->has('exp_month'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('exp_month') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('exp_year') ? ' has-error' : '' }}">
                            <label for="exp_year" class="col-md-4 control-label">Exp Year</label>
                            <div class="col-md-6">
                                <input id="exp_year" type="text" class="form-control" name="exp_year" value="{{ old('exp_year') }}" data-stripe="exp_year"> 
                                @if ($errors->has('exp_year'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('exp_year') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('cvc') ? ' has-error' : '' }}">
                            <label for="cvc" class="col-md-4 control-label">CVC</label>
                            <div class="col-md-6">
                                <input id="cvc" type="text" class="form-control" name="cvc" value="{{ old('cvc') }}" data-stripe="cvc"> 
                                @if ($errors->has('cvc'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cvc') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('billing_zip') ? ' has-error' : '' }}">
                            <label for="billing_zip" class="col-md-4 control-label">Billing Zip Code</label>
                            <div class="col-md-6">
                                <input id="billing_zip" type="text" class="form-control" name="billing_zip" value="{{ old('billing_zip') }}" data-stripe="address_zip"> 
                                @if ($errors->has('billing_zip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('billing_zip') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Start Your Free Trial
                                </button>
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
