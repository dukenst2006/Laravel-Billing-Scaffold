@extends('dashboard.layouts.dashboard')
@section('content')
	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">Add a Company</h1>
	    </div>
	    <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Company Information</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('company.store') }}" enctype="multipart/form-data">
  						@include('dashboard.company._partials.form',  ['submitButton' => 'Create Your Company'])
                    </form>
                </div>
            </div>
        </div>
	</div>
@endsection