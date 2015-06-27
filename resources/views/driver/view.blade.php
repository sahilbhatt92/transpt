@extends('app')
@section('title')
	View Driver | Transport Management Software
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
					<h4 class="">View Driver</h4>
				</div>
				<div class="col-lg-4" align="right">
                    <a href="{{route('driver.edit',[$driver->id])}}" class="btn btn-small btn-default" {{ (Auth::user()->hasRole('admin') || Auth::user()->hasRole('master-edit'))? '':'disabled' }}><i class="glyphicon glyphicon-pencil"></i> Edit</a>
					<a href="{{route('driver.index')}}" class="btn btn-default"><i class="glyphicon glyphicon-home"></i> Home</a>	
				</div>
			</div>
	    </div>
	    <!-- /.panel-heading -->
	    <div class="panel-body">
			@include('_partials.errors')
			<div class="row">
				<div class="col-lg-6">
					{!! Form::label('name','Driver Name :') !!}
					<p class="form-control-static">{{$driver->name}}</p>
				</div>
				<div class="col-lg-6">
					{!! Form::label('father_name','Father\'s Name :') !!}
					<p class="form-control-static">{{$driver->father_name}}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					{!! Form::label('license','License No. :') !!}
					<p class="form-control-static">{{$driver->license}}</p>
				</div>
				<div class="col-lg-6">
					{!! Form::label('license_photo','License Photo :') !!}
					<div class="form-group">
						@unless(empty($driver->license_photo))
							<a href="{{asset('uploads/'.$driver->license_photo)}}" data-lightbox="roadtrip"><img src="{{asset('uploads/'.$driver->license_photo)}}" alt="" width="100"></a>
						@endunless
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					{!! Form::label('photo','Driver Photo :') !!}
					<div class="form-group">
						@unless(empty($driver->photo))
							<a href="{{asset('uploads/'.$driver->photo)}}" data-lightbox="roadtrip"><img src="{{asset('uploads/'.$driver->photo)}}" alt="" width="100"></a>
						@endunless
					</div>
				</div>
				<div class="col-lg-6">
					{!! Form::label('license_date','License Valid Upto :') !!}
					<p class="form-control-static">{{\Carbon\Carbon::parse($driver->license_date)->format('d-m-Y')}}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					{!! Form::label('address','Address :') !!}
					<div class="form-group">
					<p class="form-control-static">{{$driver->address}}</p>
					</div>
				</div>
				<div class="col-lg-6">
					{!! Form::label('contact','Contact :') !!}
					<div class="form-group">
					<p class="form-control-static">{{$driver->contact}}</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					{!! Form::label('g_name','Guarantor Name :') !!}
					<p class="form-control-static">{{$driver->g_name}}</p>
				</div>
				<div class="col-lg-6">
					{!! Form::label('g_addr','Guarantor Address :') !!}
					<p class="form-control-static">{{$driver->g_addr}}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					{!! Form::label('g_phone','Guarantor Phone :') !!}
					<p class="form-control-static">{{$driver->g_phone}}</p>
				</div>
				<div class="col-lg-6">
					{!! Form::label('g_photo','Guarantor Photo :') !!}
					<div class="form-group">
						@unless(empty($driver->g_photo))
							<a href="{{asset('uploads/'.$driver->g_photo)}}" data-lightbox="roadtrip"><img src="{{asset('uploads/'.$driver->g_photo)}}" alt="" width="100"></a>
						@endunless
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
