@extends('dashboard.layouts.dashboard')
@section('content')
	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">Edit User</h1>
	    </div>
	    <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $user->first_name .' '. $user->last_name }} Information</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('users.update', ['id' => $user->id]) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
  						@include('dashboard.users._partials.user-form',  ['submitButton' => 'Update the User'])
                    </form>
                </div>
            </div>
        </div>
	</div>
@endsection