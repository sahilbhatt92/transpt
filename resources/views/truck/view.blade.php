@extends('app')
@section('title')
	View Truck | Transport Management Software
@stop

@section('content')
@include('_partials.header')
<div id="page-wrapper">
<div class="row">
	<div class="col-lg-12">&nbsp;</div>
</div>
<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
	<div class="panel panel-default">
	    <div class="panel-heading">
			<div class="row">
				<div class="col-lg-8">
					<h4 class="">View Truck</h4>
				</div>
				<div class="col-lg-4" align="right">
                    <a href="{{route('truck.edit',[$truck->id])}}" class="btn btn-small btn-default" {{ (Auth::user()->hasRole('admin') || Auth::user()->hasRole('master-edit'))? '':'disabled' }}><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                    <a href="{{route('truck.index')}}" class="btn btn-default"><i class="glyphicon glyphicon-home"></i> Home</a>	
				</div>
			</div>
	    </div>
	    <!-- /.panel-heading -->
	    <div class="panel-body">
			@include('_partials.errors')

		<div class="row">
			<div class="col-lg-6">
				{!! Form::label('truck_no','Truck No. :') !!}
				<div class="@if($errors->has('truck_no')) form-group has-error @else form-group @endif">
					{{$truck->truck_no}}
				</div>
			</div>
			<div class="col-lg-6">
				{!! Form::label('truck_type','Truck Type :') !!}
				<div class="form-group">
					{{$truck->truck_type}}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				{!! Form::label('state_list','State Permit :') !!}
				<div class="@if($errors->has('truck_no')) form-group has-error @else form-group @endif">
					@foreach($truck->state as $state)
						{{$state->name}}
					@endforeach
				</div>
			</div>
			<div class="col-lg-6">
				{!! Form::label('owner_name','Owner Name :') !!}
				<div class="form-group">
					{{$truck->owner_name}}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				{!! Form::label('driver_id','Driver Name :') !!}
				<div class="form-group">
					{{(empty($driver->name))? '' : $driver->name}}
				</div>
			</div>
			<div class="col-lg-6">
				{!! Form::label('maker_name','Maker Name :') !!}
				<div class="form-group">
					{{$truck->maker_name}}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				{!! Form::label('chasis_no','Chasis No. :') !!}
				<div class="form-group">
					{{$truck->chasis_no}}
				</div>
			</div>
			<div class="col-lg-6">
				{!! Form::label('engine_no','Engine No. :') !!}
				<div class="form-group">
					{{$truck->engine_no}}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				{!! Form::label('permit_no','Permit No :') !!}
				<div class="form-group">
					{{$truck->permit_no}}
				</div>
			</div>
			<div class="col-lg-6">
				{!! Form::label('permit_due_date_yr','Permit Due Date Yearly :') !!}
				<div class="form-group">
					{{($truck->permit_due_date_yr == "-0001-11-30")? '00-00-0000' : \Carbon\Carbon::parse($truck->permit_due_date_yr)->format('d-m-Y')}}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				{!! Form::label('permit_due_date_fyr','Permit Due Date Five Yearly :') !!}
				<div class="form-group">
					{{($truck->permit_due_date_fyr == "-0001-11-30")? '00-00-0000' : \Carbon\Carbon::parse($truck->permit_due_date_fyr)->format('d-m-Y')}}
				</div>
			</div>
			<div class="col-lg-6">
				{!! Form::label('purchase_date','Purchase Date :') !!}
				<div class="form-group">
					{{($truck->purchase_date == "-0001-11-30")? '00-00-0000' : \Carbon\Carbon::parse($truck->purchase_date)->format('d-m-Y')}}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				{!! Form::label('policy_no','Policy :') !!}
				<div class="form-group">
					{{$truck->policy_no}}
				</div>
			</div>
			<div class="col-lg-6">
				{!! Form::label('road_tax_date','Road Tax Date :') !!}
				<div class="form-group">
					{{($truck->road_tax_date == "-0001-11-30")? '00-00-0000' : \Carbon\Carbon::parse($truck->road_tax_date)->format('d-m-Y')}}
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-6">
				{!! Form::label('fitness_due_date','Fitness Due Date :') !!}
				<div class="form-group">
					{{($truck->fitness_due_date == "-0001-11-30")? '00-00-0000' : \Carbon\Carbon::parse($truck->fitness_due_date)->format('d-m-Y')}}
				</div>
			</div>
			<div class="col-lg-6">
				{!! Form::label('company_name','Company Name :') !!}
				<div class="form-group">
					{{$truck->company_name}}
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-6">
				{!! Form::label('city','City :') !!}
				<div class="form-group">
					{{$truck->city}}
				</div>
			</div>
			<div class="col-lg-6">
				{!! Form::label('address','Address :') !!}
				<div class="form-group">
					{{$truck->address}}
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-6">
				{!! Form::label('rc_copy','RC Copy :') !!}
				<div class="form-group">
					{{$truck->rc_copy}}
				</div>
			</div>
			<div class="col-lg-6">
				{!! Form::label('insurance','Insurance :') !!}
				<div class="form-group">
					{{$truck->insurance}}
				</div>				
			</div>
		</div>

		<div class="row">
			<div class="col-lg-6">
				{!! Form::label('rc_copy_photo','RC Copy Photo :') !!}
				<div class="@if($errors->has('rc_copy_photo')) form-group has-error @else form-group @endif">
				@if(!empty($truck->rc_copy_photo))
					<a href="{{asset('uploads/'.$truck->rc_copy_photo)}}" data-lightbox="roadtrip"><img src="{{asset('uploads/'.$truck->rc_copy_photo)}}" alt="" width="100"></a>
				@endif
				</div>
			</div>
			<div class="col-lg-6">
				{!! Form::label('insurance_photo','Insurance Photo :') !!}
				<div class="@if($errors->has('insurance_photo')) form-group has-error @else form-group @endif">
				@if(!empty($truck->insurance_photo))
					<a href="{{asset('uploads/'.$truck->insurance_photo)}}" data-lightbox="roadtrip"><img src="{{asset('uploads/'.$truck->insurance_photo)}}" alt="" width="100"></a>
				@endif
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-6">
				{!! Form::label('road_tax_photo','Road Tax Photo :') !!}
				<div class="@if($errors->has('road_tax_photo')) form-group has-error @else form-group @endif">
				@if(!empty($truck->road_tax_photo))
					<a href="{{asset('uploads/'.$truck->road_tax_photo)}}" data-lightbox="roadtrip"><img src="{{asset('uploads/'.$truck->road_tax_photo)}}" alt="" width="100"></a>
				@endif
				</div>
			</div>
			<div class="col-lg-6">
				{!! Form::label('fitness_photo','Fitness Photo :') !!}
				<div class="@if($errors->has('fitness_photo')) form-group has-error @else form-group @endif">
				@if(!empty($truck->fitness_photo))
					<a href="{{asset('uploads/'.$truck->fitness_photo)}}" data-lightbox="roadtrip"><img src="{{asset('uploads/'.$truck->fitness_photo)}}" alt="" width="100"></a>
				@endif
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-6">
				{!! Form::label('permit_fyr_photo','Permit Five Year Photo :') !!}
				<div class="@if($errors->has('permit_fyr_photo')) form-group has-error @else form-group @endif">
				@if(!empty($truck->permit_fyr_photo))
					<a href="{{asset('uploads/'.$truck->permit_fyr_photo)}}" data-lightbox="roadtrip"><img src="{{asset('uploads/'.$truck->permit_fyr_photo)}}" alt="" width="100"></a>
				@endif
				</div>
			</div>
			<div class="col-lg-6">
				{!! Form::label('permit_photo','Permit Photo :') !!}
				<div class="@if($errors->has('permit_photo')) form-group has-error @else form-group @endif">
				@if(!empty($truck->permit_photo))
					<a href="{{asset('uploads/'.$truck->permit_photo)}}" data-lightbox="roadtrip"><img src="{{asset('uploads/'.$truck->permit_photo)}}" alt="" width="100"></a>
				@endif
				</div>
			</div>
		</div>


		</div>
	</div>
	</div>
</div>
</div>
        <!-- /#page-wrapper -->
@stop
