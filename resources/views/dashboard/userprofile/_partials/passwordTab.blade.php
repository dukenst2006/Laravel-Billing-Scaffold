<div class="col-md-4 col-sm-6 col-xs-12">
    <h4>Change Your Password</h4>
</div>
<div class="row">
    <div class="col-md-8">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('password.update', ['id' => Auth::user()->id]) }}">
                <input name="_method" type="hidden" value="PUT">
		    	{{ csrf_field() }}

                <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                    <label for="current_password" class="col-md-4 control-label">Current Password</label>

                    <div class="col-md-6">
                        <input id="current_password" type="password" class="form-control" name="current_password">
                        @if ($errors->has('current_password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('current_password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">New Password</label>

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
                    <label for="password_confirmation" class="col-md-4 control-label">Confirm Password</label>

                    <div class="col-md-6">
                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Update Button -->
                <div class="form-group">
                    <div class="col-md-offset-4 col-md-6">
                        <button type="submit" class="btn btn-primary">
                            Update Password
                        </button>
                    </div>
                </div>
            </form>
    </div>
</div>
