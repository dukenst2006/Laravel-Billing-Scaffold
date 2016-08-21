@extends('dashboard.layouts.dashboard')
@section('content')
	<div class="row">
		<div class="col-lg-12">
	        <h1 class="page-header">Company</h1>
	    </div>
	</div>

	<div class="row">    
	    <div class="col-lg-12">
		    <div class="panel panel-default">
		      	@if ( ! Auth::user()->company )
		      		<div class="panel-body">
	                	<div class="alert alert-warning">
	                        In order to add more people to you Outline you will need to add a company first. <a href="{{ route('company.create') }}" class="alert-link">Create a Company</a>.
	                    </div>
                    </div>
	        	@else
		            <div class="panel-heading">
		            	Company Information 
		            </div>
		            <div class="panel-body">
		            	<div class="row">
					        <div class="col-xs-12 col-sm-12 col-md-12">
					            <div class="well well-sm">
					                <div class="row">
					                	@if( $company->logo )
						                    <div class="col-sm-12 col-md-4">
						                        <img src="{{ isset($company->logo) ? url('images/company-logos/'.$company->logo) : 'https://placehold.co/300x300' }}" alt="" class="img-rounded img-responsive" />
						                    </div>
					                    @endif
					                    <div class="col-sm-12 col-md-8">
					                        <h4>{{ $company->name }}</h4>
					                        <small>
					                        	{{ $company->address }}<br>
					                        	@if( $company->address2 ) 
					                        		{{ $company->address2 }}<br>
					                        	@endif
						                        <cite title="{{$company->city}} {{$company->state}}, {{$company->zip}}">{{$company->city}} {{$company->state}}, {{$company->zip}} <i class="fa fa-map-marker">
						                        </i></cite>
					                        </small>
					                        <p>
					                            <i class="fa fa-phone-square"></i> {{ $company->main_phone }}
					                            <br />
					                            <i class="fa fa-globe"></i> <a href="{{ $company->url }}">{{$company->url}}</a>
					                            <br />
					                         
					                        <!-- Split button -->
					                        <div class="btn-group">
					                            <button type="button" class="btn btn-primary btn-sm">
					                                Actions</button>
					                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
					                                <span class="caret"></span><span class="sr-only">Social</span>
					                            </button>
					                            <ul class="dropdown-menu" role="menu" data-form="deleteForm">
					                                <li><a href="#">Add Users</a></li>
					                                <li><a href="{{ route('company.edit', ['id' => $company->id]) }}">Edit Company</a></li>
						                            <li><a href="{{ route('company.destroy', $company->id) }}" class="form-delete" data-method="delete" name="delete_item" data-token="{{ csrf_token() }}">Delete Company</a>
						                            </li>
					                                <li class="divider"></li>
					                                <li><a href="{{ url('logout') }}">Sign Out</a></li>
					                            </ul>
					                        </div>
					                    </div>
					                </div>
					            </div>
					        </div>
					    </div>
		            </div>
	            @endif 
            </div>
        </div>
    </div>    
@endsection
@section('modal')
    @include('dashboard.company._partials.deleteModal')
@endsection

@section('scripts')

<script>

	$('[data-method]').append(function(){
	    return "\n"+
	    "<form action='"+$(this).attr('href')+"' method='POST' name='delete_item' style='display:none'>\n"+
	    "   <input type='hidden' name='_method' value='"+$(this).attr('data-method')+"'>\n"+
	    "   <input type='hidden' name='_token' value='"+$(this).attr('data-token')+"'>\n"+
	    "</form>\n"
	})
    .removeAttr('href')
    .attr('style','cursor:pointer;');
    
    $('ul[data-form="deleteForm"]').on('click', '.form-delete', function(e){
    	e.preventDefault();
    	var $form=$('form[name=delete_item]');
    	$('#confirm').modal({ backdrop: 'static', keyboard: false })
       	.on('click', '#delete-btn', function(){
           	$form.submit();
       	});
	});

</script>	
@endsection