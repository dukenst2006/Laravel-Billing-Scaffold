@extends('dashboard.layouts.dashboard')
@section('content')
	<div class="row">
		<div class="col-lg-12">
	        <h1 class="page-header">Users</h1>
	    </div>
	</div>

	<div class="row">    
	    <div class="col-lg-12">
		    <div class="panel panel-default">
	            <div class="panel-heading">
	            	All Company Users
	            	<div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                Actions
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="{{route('users.create')}}">Add User</a></li>
                                <li><a href="#">Edit User</a></li>
                                <li><a href="#">Remove User</a></li>
                            </ul>
                        </div>
                    </div>
	            </div>
	            <div class="panel-body">
	            	<div class="row">
				        <div class="col-xs-12 col-sm-12 col-md-12">
							@if( isset($users) )
							<div class="table-responsive">
							    <table class="table table-striped table-bordered table-hover">
							        <thead>
							            <tr>
							                <th>#</th>
							                <th>First Name</th>
							                <th>Last Name</th>
							                <th>Email</th>
							                <th>Role</th>
							            </tr>
							        </thead>
							        <tbody>
							            @foreach ($users as $user)
							            <tr>
							                <td>{{ $user->id }}</td>
							                <td>{{ $user->first_name }}</td>
							                <td>{{ $user->last_name }}</td>
							                <td>{{ $user->email }}</td>
							                <td>
							                	@foreach($user->roles as $role)
							                		{{ $role->display_name }} 
							                	@endforeach
							                </td>
							            </tr>
							            @endforeach
							        </tbody>
							    </table>
							</div>
							@endif
				        </div>
				    </div>
	            </div>
            </div>
        </div>
    </div>    
@endsection