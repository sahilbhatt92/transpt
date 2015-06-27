@extends('app')
@section('title')
	Update Freight Price | Transport Management Software
@stop

@section('content')
@include('_partials.header')
<div id="page-wrapper">
<div class="row">
	<div class="col-lg-12">&nbsp;</div>
</div>
<div class="row">
			{!! Form::model($freightprice,['route'=>['freightprice.update',$freightprice->id],'method'=>'PATCH']) !!}
	<div class="col-lg-8 col-lg-offset-2">
	<div class="panel panel-default">
	    <div class="panel-heading">
			<div class="row">
				<div class="col-lg-8">
					<h4 class="">Update Freight Price</h4>
				</div>
				<div class="col-lg-4">
					<a href="{{route('freightprice.index')}}" class="btn btn-danger pull-right"><i class="glyphicon glyphicon-ban-circle"></i> Cancel</a>	
					<button type="submit" class="btn btn-small btn-success"><i class="glyphicon glyphicon-ok"></i> Update</button>
				</div>
			</div>
	    </div>
	    <!-- /.panel-heading -->
	    <div class="panel-body">
			@include('_partials.errors')
			@include('freightprice.form')
		</div>
	</div>
	</div>
			{!! Form::close() !!}
</div>
</div>
        <!-- /#page-wrapper -->
@stop
