{{ csrf_field() }}  
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">Company Name</label>
    <div class="col-md-6">
        <input id="name" type="text" class="form-control" name="name" value="{{ $company->name or old('name') }}">
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
    <label for="address" class="col-md-4 control-label">Address</label>

    <div class="col-md-6">
        <input id="address" type="text" class="form-control" name="address" value="{{ $company->address or old('address') }}">

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
        <input id="address2" type="text" class="form-control" name="address2" value="{{ $company->address2 or old('address2') }}">

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
        <input id="city" type="city" class="form-control" name="city" value="{{ $company->city or old('city') }}">

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
        <input id="state" type="state" class="form-control" name="state" value="{{ $company->state or old('state') }}">

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
        <input id="zip" type="zip" class="form-control" name="zip" value="{{ $company->zip or old('zip') }}">

        @if ($errors->has('zip'))
            <span class="help-block">
                <strong>{{ $errors->first('zip') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
    <label for="logo" class="col-md-4 control-label">Logo</label>
    <div class="col-md-6">
        <image-input image-name="logo" image-src="{{ isset($company->logo) ? url('images/company-logos/'.$company->logo) : 'https://placehold.co/300x300' }}"></image-input>
    </div>
</div>

<div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
    <label for="url" class="col-md-4 control-label">Company Website</label>

    <div class="col-md-6">
        <input id="url" type="text" class="form-control" name="url" value="{{ $company->url or old('url') }}" placeholder="http://www.yoursite.com">

        @if ($errors->has('url'))
            <span class="help-block">
                <strong>{{ $errors->first('url') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('main_phone') ? ' has-error' : '' }}">
    <label for="main_phone" class="col-md-4 control-label">Main Phone Number</label>

    <div class="col-md-6">
        <input id="main_phone" type="text" class="form-control" name="main_phone" value="{{ $company->main_phone or old('main_phone') }}">

        @if ($errors->has('main_phone'))
            <span class="help-block">
                <strong>{{ $errors->first('main_phone') }}</strong>
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
