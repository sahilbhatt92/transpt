@extends('app')
@section('title')
	View Station | Transport Management Software
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
					<h4 class="">View Station</h4>
				</div>
				<div class="col-lg-4" align="right">
                    <a href="{{route('station.edit',[$station->id])}}" class="btn btn-small btn-default"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
					<a href="{{route('station.index')}}" class="btn btn-default"><i class="glyphicon glyphicon-home"></i> Home</a>	
				</div>
			</div>
	    </div>
	    <!-- /.panel-heading -->
	    <div class="panel-body">
			@include('_partials.errors')
			<div class="row">
				<div class="col-lg-12">
					{!! Form::label('name','Station Name :') !!}
					<p class="form-control-static">{{$station->name}}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					{!! Form::label('name','District Name :') !!}
					<p class="form-control-static">{{$station->district->name}}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					{!! Form::label('state','State Name :') !!}
					<p class="form-control-static">{{$station->state->name}}</p>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>
</div>
        <!-- /#page-wrapper -->
@stop
