@extends('dashboard.layouts.dashboard')
@section('content')
	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">Edit Your Company</h1>
	    </div>
	    <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">{{$company->name}}'s Information</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('company.update', ['id' => $company->id]) }}" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PUT">
  						@include('dashboard.company._partials.form',  ['submitButton' => 'Edit Your Company'])
                    </form>
                </div>
            </div>
        </div>
	</div>
@endsection