@extends('app')
@section('title')
	View Freight Price | Transport Management Software
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
					<h4 class="">View Freight Price</h4>
				</div>
				<div class="col-lg-4" align="right">
                    <a href="{{route('freightprice.edit',[$freightprice->id])}}" class="btn btn-small btn-default" {{ (Auth::user()->hasRole('admin') || Auth::user()->hasRole('master-edit'))? '':'disabled' }}><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                    <a href="{{route('freightprice.index')}}" class="btn btn-default"><i class="glyphicon glyphicon-home"></i> Home</a>	
				</div>
			</div>
	    </div>
	    <!-- /.panel-heading -->
	    <div class="panel-body">
			@include('_partials.errors')
		<div class="row">
			<div class="col-lg-6">
				{!! Form::label('party_id','Party Name') !!}
				<div class="@if($errors->has('party_id')) form-group has-error @else form-group @endif">
					<p class="form-control-static">{{($freightprice->party_id == 0)? '' : $freightprice->party->name}}</p>
				</div>
			</div>
			<div class="col-lg-6">
				{!! Form::label('truck_id','Truck No.') !!}
				<div class="@if($errors->has('truck_id')) form-group has-error @else form-group @endif">
					<p class="form-control-static">{{($freightprice->truck_id == 0)? '' : $freightprice->truck->truck_no}}</p>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-6">
				{!! Form::label('from','From :') !!}
				<div class="form-group">
					<p class="form-control-static">{{\App\Station::find($freightprice->from)->first()->name}}</p>
				</div>
			</div>
			<div class="col-lg-6">
				{!! Form::label('to','To :') !!}
				<div class="form-group">
					<p class="form-control-static">{{\App\Station::find($freightprice->to)->first()->name}}</p>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-6">
				{!! Form::label('rate','Rate :') !!}
				<div class="form-group">
					<p class="form-control-static">{{$freightprice->rate}}</p>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>
</div>
        <!-- /#page-wrapper -->
@stop
