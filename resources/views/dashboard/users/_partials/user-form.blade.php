{{ csrf_field() }}  
<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
    <label for="first_name" class="col-md-4 control-label">First Name</label>
    <div class="col-md-6">
        <input id="first_name" type="text" class="form-control" name="first_name" value="{{ $user->first_name or old('first_name') }}">
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
        <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $user->last_name or old('last_name') }}">
        @if ($errors->has('last_name'))
            <span class="help-block">
                <strong>{{ $errors->first('last_name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="col-md-4 control-label">Email Address</label>
    <div class="col-md-6">
        <input id="email" type="text" class="form-control" name="email" value="{{ $user->email or old('email') }}">
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>

<hr>

<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
    <label for="phone" class="col-md-4 control-label">Phone Number</label>

    <div class="col-md-6">
        <input id="phone" type="text" class="form-control" name="phone" value="{{ $user->phone or old('phone') }}">

        @if ($errors->has('phone'))
            <span class="help-block">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('phone2') ? ' has-error' : '' }}">
    <label for="phone2" class="col-md-4 control-label">Alt Number</label>

    <div class="col-md-6">
        <input id="phone2" type="text" class="form-control" name="phone2" value="{{ $user->phone2 or old('phone2') }}">

        @if ($errors->has('phone2'))
            <span class="help-block">
                <strong>{{ $errors->first('phone2') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
    <label for="address" class="col-md-4 control-label">Address</label>

    <div class="col-md-6">
        <input id="address" type="text" class="form-control" name="address" value="{{ $user->address or old('address') }}">

        @if ($errors->has('address'))
            <span class="help-block">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('address2') ? ' has-error' : '' }}">
    <label for="address2" class="col-md-4 control-label">Address Cont.</label>

    <div class="col-md-6">
        <input id="address2" type="text" class="form-control" name="address2" value="{{ $user->address2 or old('address2') }}">

        @if ($errors->has('address2'))
            <span class="help-block">
                <strong>{{ $errors->first('address2') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
    <label for="city" class="col-md-4 control-label">City</label>

    <div class="col-md-6">
        <input id="city" type="city" class="form-control" name="city" value="{{ $user->city or old('city') }}">

        @if ($errors->has('city'))
            <span class="help-block">
                <strong>{{ $errors->first('city') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
    <label for="state" class="col-md-4 control-label">State</label>

    <div class="col-md-6">
        <input id="state" type="state" class="form-control" name="state" value="{{ $user->state or old('state') }}">

        @if ($errors->has('state'))
            <span class="help-block">
                <strong>{{ $errors->first('state') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('zip') ? ' has-error' : '' }}">
    <label for="zip" class="col-md-4 control-label">Zip</label>

    <div class="col-md-6">
        <input id="zip" type="zip" class="form-control" name="zip" value="{{ $user->zip or old('zip') }}">

        @if ($errors->has('zip'))
            <span class="help-block">
                <strong>{{ $errors->first('zip') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
    <label for="image" class="col-md-4 control-label">Picture</label>
    <div class="col-md-6">
        <image-input image-name="image" image-src="{{ isset($user->image) ? url('images/'.$user->image) : 'https://placehold.co/300x300' }}"></image-input>
    </div>
</div>

<div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
    <label for="url" class="col-md-4 control-label">Your Website</label>
    <div class="col-md-6">
        <input id="url" type="text" class="form-control" name="url" value="{{ $user->url or old('url') }}" placeholder="http://www.yoursite.com">
        @if ($errors->has('url'))
            <span class="help-block">
                <strong>{{ $errors->first('url') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-btn fa-user"></i> {{ $submitButton }}
        </button>
    </div>
</div>
