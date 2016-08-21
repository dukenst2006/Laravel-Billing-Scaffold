@extends('dashboard.layouts.dashboard') @section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">User Information</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bell fa-fw"></i> User Profile
            </div>
            <div class="panel-body">
                <div class="row">
                    <ul class="nav nav-tabs" role="navigation">
                        <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
                        <li><a href="#password" data-toggle="tab">Change Password</a></li>
                        <li><a href="#subscription" data-toggle="tab">Subscriptions</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="profile">
                            @include('dashboard.userprofile._partials.profileTab')
                        </div>
                        <div class="tab-pane fade" id="password">
                            @include('dashboard.userprofile._partials.passwordTab')
                        </div>
                        <div class="tab-pane fade" id="subscription">
                            @include('dashboard.userprofile._partials.subscriptionsTab')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
    @include('dashboard.userprofile._partials.cancelSubscriptionModal')
@endsection

@section('scripts')
<script>
	var url = document.location.toString();
	if (url.match('#')) {
	    $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
	} 

	// Change hash for page-reload
	$('.nav-tabs a').on('shown.bs.tab', function (e) {
	    window.location.hash = e.target.hash;
	});

    $('[data-method]').append(function(){
        return "\n"+
        "<form action='"+$(this).attr('href')+"' method='POST' name='delete_item' style='display:none'>\n"+
        "   <input type='hidden' name='_method' value='"+$(this).attr('data-method')+"'>\n"+
        "   <input type='hidden' name='_token' value='"+$(this).attr('data-token')+"'>\n"+
        "</form>\n"
    })
    .removeAttr('href')
    .attr('style','cursor:pointer;');
    
    $('div[data-form="deleteForm"]').on('click', '.form-delete', function(e){
        e.preventDefault();
        var $form=$('form[name=delete_item]');
        $('#confirm').modal({ backdrop: 'static', keyboard: false })
        .on('click', '#delete-btn', function(){
            $form.submit();
        });
    });

</script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script>
    Stripe.setPublishableKey('{{ config('services.stripe.key') }}');
    jQuery(function($) {
        $('#subscription-form').submit(function(event) {
            var $form = $(this);
            $form.find('button').prop('disabled', true);
            Stripe.card.createToken($form, stripeResponseHandler);

            return false;
        });
    });

    var stripeResponseHandler = function(status, response) {
        var $form = $('#subscription-form');

        if (response.error) {
            $form.find('.payment-errors').text(response.error.message);
            $form.find('button').prop('disabled', false);
        } else {
            var token = response.id;
            $form.append($('<input type="hidden" name="stripeToken" />').val(token));
            $form.get(0).submit();
        }
    };
</script>
@endsection

