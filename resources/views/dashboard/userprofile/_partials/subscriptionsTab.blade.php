<div class="row">
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Users
            </div>
            <div class="panel-body">
                Here are all the users.
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Invoices
            </div>
            <div class="panel-body">
                <table>
                    @foreach ($invoices as $invoice)
                    <tr>
                        <td>{{ $invoice->date()->toFormattedDateString() }}</td>
                        <td>{{ $invoice->total() }}</td>
                        <td><a href="/user/invoice/{{ $invoice->id }}">Download</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Change Payment Info
            </div>
            <div class="panel-body">
                <form class="form-horizontal" id="subscription-form" role="form" method="POST" action="{{ route('subscription.updateCC') }}">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PUT">
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
                                <i class="fa fa-btn fa-credit-card"></i> Update Payment Info
                            </button>
                        </div>
                    </div>
                </form>
            </div>    
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Cancel Subscription @if( Auth::user()->subscription('main')->onGracePeriod() ) @endif
            </div>
            @if( Auth::user()->subscription('main')->onGracePeriod() )
            <div class="panel-body" data-form="resumeForm">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('subscription.update', $user->id) }}">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PUT">
                    <button class="btn btn-success" name="resume_item" type="submit">Restart Subscription</button>
            </div>
            @else
            <div class="panel-body" data-form="deleteForm">
                <button href="{{ route('subscription.destroy', $user->id) }}" class="btn btn-danger form-delete" data-method="delete" name="delete_item" data-token="{{ csrf_token() }}">Cancel Subscription</button>
            </div>
            @endif
        </div>
    </div>
</div>
