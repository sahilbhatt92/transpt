@extends('app')
@section('title')
	View General Head | Transport Management Software
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
					<h4 class="">View General Head</h4>
				</div>
				<div class="col-lg-4" align="right">
                    <a href="{{route('generalhead.edit',[$generalhead->id])}}" class="btn btn-small btn-default" {{ (Auth::user()->hasRole('admin') || Auth::user()->hasRole('master-edit'))? '':'disabled' }}><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                    <a href="{{route('generalhead.index')}}" class="btn btn-default"><i class="glyphicon glyphicon-home"></i> Home</a>	
				</div>
			</div>
	    </div>
	    <!-- /.panel-heading -->
	    <div class="panel-body">
			@include('_partials.errors')
			<div class="row">
				<div class="col-lg-12">
					{!! Form::label('name','General Head Name :') !!}
					<p class="form-control-static">{{$generalhead->name}}</p>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>
</div>
        <!-- /#page-wrapper -->
@stop
