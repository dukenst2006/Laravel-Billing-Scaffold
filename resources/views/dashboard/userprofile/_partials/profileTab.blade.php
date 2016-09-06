<div class="row">
    <div class="col-md-12 personal-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Person Information
            </div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('user-profile.update', ['id' => $user->id]) }}" enctype="multipart/form-data">
                		    <input name="_method" type="hidden" value="PUT">
                		    {{ csrf_field() }}
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="text-center">
                            <image-input image-name="image" image-src="{{ isset($user->image) ? url('images/'.$user->image) : 'https://placehold.co/300x300' }}"></image-input>
                        </div>
                    </div>
                    <!-- edit form column -->
                    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="col-lg-3 control-label">First name:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" name="first_name" value="{{ $user->first_name }}" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Last name:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" name="last_name" value="{{ $user->last_name }}" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Company:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" name="company" value="{{ $user->company->name }}" type="text" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Email:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" name="email" value="{{ $user->email }}" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Phone Number:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" name="phone" value="{{ $user->phone }}" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Alt Number:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" name="phone2" value="{{ $user->phone2 }}" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Personal Website</label>
                                <div class="col-lg-8">
                                    <input class="form-control" name="url" value="{{ $user->url }}" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-8">
                                    <input class="btn btn-primary" value="Save Changes" type="submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </form>
            </div>
        </div>    
    </div>
</div>    