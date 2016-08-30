@extends('dashboard.layouts.dashboard')
@section('content')
	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">Add a User</h1>
	    </div>
	    <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">User Information</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
  						@include('dashboard.users._partials.user-form',  ['submitButton' => 'Create the User'])
                    </form>
                </div>
            </div>
        </div>
	</div>
@endsection