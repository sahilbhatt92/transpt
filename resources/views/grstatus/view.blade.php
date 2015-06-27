@extends('app')
@section('title')
	View GR Status | Transport Management Software
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
					<h4 class="">View GR Status</h4>
				</div>
				<div class="col-lg-4" align="right">
                    <a href="{{route('grstatus.edit',[$grstatus->id])}}" class="btn btn-small btn-default" {{ (Auth::user()->hasRole('admin') || Auth::user()->hasRole('master-edit'))? '':'disabled' }}><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                    <a href="{{route('grstatus.index')}}" class="btn btn-default"><i class="glyphicon glyphicon-home"></i> Home</a>	
				</div>
			</div>
	    </div>
	    <!-- /.panel-heading -->
	    <div class="panel-body">
			@include('_partials.errors')
		<div class="row">
			<div class="col-lg-6">
				{!! Form::label('gr_id','GR No.') !!}
				<div class="@if($errors->has('gr_id')) form-group has-error @else form-group @endif">
					<p class="form-control-static">{{($grstatus->gr_id == 0)? '' : $grstatus->gr->gr_no}}</p>
				</div>
			</div>
			<div class="col-lg-6">
				{!! Form::label('date','Date :') !!}
			    <div class="form-group">
					<p class="form-control-static">{{$grstatus->date->format('d-m-Y')}}</p>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				{!! Form::label('status','Status :') !!}
				<div class="form-group">
					<p class="form-control-static">{{$grstatus->status}}</p>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>
</div>
        <!-- /#page-wrapper -->
@stop
