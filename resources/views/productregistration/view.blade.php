@extends('app')
@section('title')
	View Product Registration | Transport Management Software
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
					<h4 class="">View Product Registration</h4>
				</div>
				<div class="col-lg-4" align="right">
                    <a href="{{route('productregistration.edit',[$productregistration->id])}}" class="btn btn-small btn-default" {{ (Auth::user()->hasRole('admin') || Auth::user()->hasRole('master-edit'))? '':'disabled' }}><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                    <a href="{{route('productregistration.index')}}" class="btn btn-default"><i class="glyphicon glyphicon-home"></i> Home</a>	
				</div>
			</div>
	    </div>
	    <!-- /.panel-heading -->
	    <div class="panel-body">
			@include('_partials.errors')

<div class="row">
	<div class="col-lg-6">
		{!! Form::label('name','Product Name :') !!}
		<p class="form-control-static">{{$productregistration->name}}</p>
	</div>
	<div class="col-lg-6">
		{!! Form::label('type','Product Type :') !!}
		<p class="form-control-static">{{$productregistration->type}}</p>
	</div>
</div>

<div class="row">
	<div class="col-lg-6">
		{!! Form::label('method','Method of Packaging :') !!}
		<p class="form-control-static">{{$productregistration->method}}</p>
	</div>
	<div class="col-lg-6">
		{!! Form::label('mode','Mode of Packaging :') !!}
		<p class="form-control-static">{{$productregistration->mode}}</p>
	</div>
</div>

<div class="row">
	<div class="col-lg-6">
		{!! Form::label('descp','Description :') !!}
		<p class="form-control-static">{{$productregistration->descp}}</p>
	</div>
	<div class="col-lg-6">
		{!! Form::label('stored_pkgs','Stored Packages :') !!}
		<p class="form-control-static">{{$productregistration->stored_pkgs}}</p>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		{!! Form::label('rate','Rate :') !!}
		<p class="form-control-static">{{$productregistration->rate}}</p>
	</div>
	<div class="col-lg-6">
		{!! Form::label('weight','Weight :') !!}
		<p class="form-control-static">{{$productregistration->weight}}</p>
	</div>
</div>
<div class="row">
	<div class="col-lg-3">
		{!! Form::label('length','Length') !!}
		<p class="form-control-static">{{$productregistration->length}}</p>
	</div>
	<div class="col-lg-3" align="center">
		{!! Form::label('width','Width') !!}
		<div class="row">
			<div class="form-group col-lg-3">
				<p class="form-control-static">X</p>
			</div>
			<div class="form-group col-lg-9">
				<p class="form-control-static">{{$productregistration->width}}</p>
			</div>
		</div>
	</div>
	<div class="col-lg-3" align="center">
		{!! Form::label('height','Height') !!}
		<div class="row">
			<div class="form-group col-lg-3">
				<p class="form-control-static">X</p>
			</div>
			<div class="form-group col-lg-9">
				<p class="form-control-static">{{$productregistration->height}}</p>
			</div>
		</div>
	</div>
	<div class="col-lg-3" align="right">
		{!! Form::label('cft','CFT') !!}
		<div class="row">
			<div class="form-group col-lg-3">
				<p class="form-control-static">=</p>
			</div>
			<div class="form-group col-lg-9">
				<p class="form-control-static">{{$productregistration->cft}}</p>
			</div>
	</div>
</div>



	</div>
	</div>
</div>
</div>
        <!-- /#page-wrapper -->
@stop
