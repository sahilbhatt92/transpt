@extends('app')
@section('title')
	View Issue Challan | Transport Management Software
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
					<h4 class="">View Issue Challan</h4>
				</div>
				<div class="col-lg-4" align="right">
                    <a href="{{route('issuechallan.edit',[$issuechallan->id])}}" class="btn btn-small btn-default"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
					<a href="{{route('issuechallan.index')}}" class="btn btn-default"><i class="glyphicon glyphicon-home"></i> Home</a>	
				</div>
			</div>
	    </div>
	    <!-- /.panel-heading -->
	    <div class="panel-body">
			@include('_partials.errors')
			<div class="row">
				<div class="col-lg-6">
					{!! Form::label('branch_id','Branch Code :') !!}
					<p class="form-control-static">{{(empty($issuechallan->branch_id))? '' : $branch->code}}</p>
				</div>
				<div class="col-lg-6">
					{!! Form::label('date','Date :') !!}
					<div class="form-group">
					<p class="form-control-static">{{\Carbon\Carbon::parse($issuechallan->issue_date)->format('d-m-Y')}}</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					{!! Form::label('issue_from','Issue From :') !!}
					<div class="form-group">
					<p class="form-control-static">{{$issuechallan->issue_from}}</p>
					</div>
				</div>
				<div class="col-lg-6">
					{!! Form::label('issue_to','Issue To :') !!}
					<div class="form-group">
					<p class="form-control-static">{{$issuechallan->issue_to}}</p>
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
