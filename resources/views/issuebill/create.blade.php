@extends('app')
@section('title')
	Issue New Bill | Transport Management Software
@stop

@section('content')
@include('_partials.header')
<div id="page-wrapper">
<div class="row">
	<div class="col-lg-12">&nbsp;</div>
</div>
<div class="row">
			{!! Form::open(['route'=>'issuebill.store']) !!}
	<div class="col-lg-8 col-lg-offset-2">
	<div class="panel panel-default">
	    <div class="panel-heading">
			<div class="row">
				<div class="col-lg-8">
					<h4 class="">Issue New Bill</h4>
				</div>
				<div class="col-lg-4">
					<a href="{{route('issuebill.index')}}" class="btn btn-danger pull-right"><i class="glyphicon glyphicon-ban-circle"></i> Cancel</a>	
					<button type="submit" class="btn btn-small btn-success"><i class="glyphicon glyphicon-ok"></i> Create</button>
				</div>
			</div>
	    </div>
	    <!-- /.panel-heading -->
	    <div class="panel-body">
			@include('_partials.errors')
			@include('issuebill.form',['disabled'=>0])
		</div>
	</div>
	</div>
			{!! Form::close() !!}
</div>
</div>
        <!-- /#page-wrapper -->
@stop
