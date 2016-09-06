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
                            <a type="button" class="btn btn-primary btn-xs" href="{{ route('users.create') }}">
                                Add User
                            </a>
                        </div>
                    </div>
	            </div>
	            <div class="panel-body">
	            	<div class="row">
				        <div class="col-xs-12 col-sm-12 col-md-12">
							@if( isset($users) )
							<div class="table-responsive">
							    <table class="table table-bordered table-striped table-hover category-table" data-toggle="dataTable" data-form="deleteForm">
							        <thead>
							            <tr>
							                <th>User Name</th>
							                <th>Email</th>
							                <th>Role</th>
							                <th>Actions</th>
							            </tr>
							        </thead>
							        <tbody>
							            @foreach ($users as $user)
							            <tr>
							                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
							                <td>{{ $user->email }}</td>
							                <td>
							                	@foreach($user->roles as $role)
							                		{{ $role->display_name }} 
							                	@endforeach
							                </td>
							                <td>
							                    <a href="{{ route('users.update', $user->id) }}" class="btn btn-info btn-xs">Edit User</a>
							                    @if ( ! $user->hasRole('super_admin'))
								                    {!! Form::model($user, ['method' => 'delete', 'route' => ['users.destroy', $user->id], 'class' =>'form-inline form-delete']) !!}
								                    {!! Form::hidden('id', $user->id) !!}
								                    {!! Form::submit('Delete', ['class' => 'btn btn-xs btn-danger delete', 'name' => 'delete_modal']) !!}
								                    {!! Form::close() !!}
							                	@endif
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

@section('modal')
    @include('dashboard.users._partials.deleteUserModal')
@endsection

@section('scripts')

<script>
	$('table[data-form="deleteForm"]').on('click', '.form-delete', function(e){
    e.preventDefault();
    var $form=$(this);
    $('#confirm').modal({ backdrop: 'static', keyboard: false })
        .on('click', '#delete-btn', function(){
            $form.submit();
        });
	});
</script>	
@endsection