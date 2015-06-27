@extends('app')
@section('title')
	View Godown Detail | Transport Management Software
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
					<h4 class="">View Godown Detail</h4>
				</div>
				<div class="col-lg-4" align="right">
                    <a href="{{route('godown.edit',[$godown->id])}}" class="btn btn-small btn-default" {{ (Auth::user()->hasRole('admin') || Auth::user()->hasRole('master-edit'))? '':'disabled' }}><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                    <a href="{{route('godown.index')}}" class="btn btn-default"><i class="glyphicon glyphicon-home"></i> Home</a>	
				</div>
			</div>
	    </div>
	    <!-- /.panel-heading -->
	    <div class="panel-body">
			@include('_partials.errors')

			<div class="row">
				<div class="col-lg-6">
					{!! Form::label('name','Godown Name :') !!}
					<p class="form-control-static">{{$godown->name}}</p>
				</div>
				<div class="col-lg-6">
					{!! Form::label('branch_id','Branch :') !!}
					<p class="form-control-static">{{($godown->branch_id == 0)? '' : $godown->branch->name}}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					{!! Form::label('godown_type','Godown Type :') !!}
					<div class="form-group">
					<p class="form-control-static">{{$godown->godown_type}}</p>
					</div>
				</div>
				<div class="col-lg-6">
					{!! Form::label('owner_name','Owner Name :') !!}
					<p class="form-control-static">{{$godown->owner_name}}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					{!! Form::label('owner_addr','Owner Address :') !!}
					<p class="form-control-static">{{$godown->owner_addr}}</p>
				</div>
			</div>
			<div class="row">
					<div class="col-lg-6">
						{!! Form::label('party_id','Party :') !!}
						<p class="form-control-static">{{$godown->party->name}}</p>
					</div>
					<div class="col-lg-6">
						{!! Form::label('type','Type :') !!}
						<p class="form-control-static">{{$godown->type}}</p>
					</div>
			</div>
@if(($godown->type) == 1)
			<div class="row">
				<h4 align="center">Rent</h4>
				<div class="col-lg-4">
					{!! Form::label('rent','Rent :') !!}
					<p class="form-control-static">{{$godown->rent}}</p>
				</div>
				<div class="col-lg-4">
					{!! Form::label('security','Security :') !!}
					<p class="form-control-static">{{$godown->security}}</p>
				</div>
				<div class="col-lg-4">
					{!! Form::label('validity_date','Validity Date :') !!}
					<p class="form-control-static">{{$godown->validity_date}}</p>
				</div>
			</div>
@endif
			<div class="row">
				<h4 align="center">Insurance</h4>
				<div class="col-lg-4">
					{!! Form::label('insurance_company','Insurance Company :') !!}
					<p class="form-control-static">{{$godown->insurance_company}}</p>
				</div>
				<div class="col-lg-4">
					{!! Form::label('policy_no','Policy No :') !!}
					<p class="form-control-static">{{$godown->policy_no}}</p>
				</div>
				<div class="col-lg-4">
					{!! Form::label('insurance_validity_date','Insurance Validity Date :') !!}
					<p class="form-control-static">{{$godown->insurance_validity_date}}</p>
				</div>
			</div>


		</div>
	</div>
	</div>
</div>
</div>
        <!-- /#page-wrapper -->
@stop
