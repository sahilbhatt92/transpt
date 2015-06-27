@extends('app')
@section('title')
	View Branch | Transport Management Software
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
					<h4 class="">View Branch</h4>
				</div>
				<div class="col-lg-4" align="right">
                    <a href="{{route('branch.edit',[$branch->id])}}" class="btn btn-small btn-default" {{ (Auth::user()->hasRole('admin') || Auth::user()->hasRole('master-edit'))? '':'disabled' }}><i class="glyphicon glyphicon-pencil"></i> Edit</a>
					<a href="{{route('branch.index')}}" class="btn btn-default"><i class="glyphicon glyphicon-home"></i> Home</a>	
				</div>
			</div>
	    </div>
	    <!-- /.panel-heading -->
	    <div class="panel-body">
			@include('_partials.errors')
			<div class="row">
				<div class="col-lg-6">
					{!! Form::label('name','Branch Name :') !!}
					<p class="form-control-static">{{$branch->name}}</p>
				</div>
				<div class="col-lg-6">
					{!! Form::label('cperson','Contact Person :') !!}
					<div class="form-group">
					<p class="form-control-static">{{$branch->cperson}}</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					{!! Form::label('code','Branch Code :') !!}
					<div class="form-group">
					<p class="form-control-static">{{$branch->code}}</p>
					</div>
				</div>
				<div class="col-lg-6">
					{!! Form::label('type','Booking Type :') !!}
					<div class="form-group">
					<p class="form-control-static">{{$branch->type}}</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					{!! Form::label('address','Address :') !!}
					<div class="form-group">
					<p class="form-control-static">{{$branch->address}}</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					{!! Form::label('district','District :') !!}
					<div class="form-group">
					<p class="form-control-static">{{($branch->district_id == 0)? '' : $branch->district->name}}</p>
					</div>
				</div>
				<div class="col-lg-6">
					{!! Form::label('state','State :') !!}
					<div class="form-group">
					<p class="form-control-static">{{($branch->state_id == 0)? '' : $branch->state->name}}</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					{!! Form::label('telephone','Telephone :') !!}
					<div class="form-group">
					<p class="form-control-static">{{$branch->telephone}}</p>
					</div>
				</div>
				<div class="col-lg-6">
					{!! Form::label('mobile','Mobile :') !!}
					<div class="form-group">
					<p class="form-control-static">{{$branch->mobile}}</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					{!! Form::label('tin','TIN No. :') !!}
					<div class="form-group">
					<p class="form-control-static">{{$branch->tin}}</p>
					</div>
				</div>
				<div class="col-lg-6">
					{!! Form::label('pan','PAN No. :') !!}
					<div class="form-group">
					<p class="form-control-static">{{$branch->pan}}</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					{!! Form::label('cst','Cst No. :') !!}
					<div class="form-group">
					<p class="form-control-static">{{$branch->cst}}</p>
					</div>
				</div>
				<div class="col-lg-6">
					{!! Form::label('pin','PIN No. :') !!}
					<div class="form-group">
					<p class="form-control-static">{{$branch->pin}}</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					{!! Form::label('email','Email :') !!}
					<div class="form-group">
					<p class="form-control-static">{{$branch->email}}</p>
					</div>
				</div>
				<div class="col-lg-6">
					{!! Form::label('','Agency :') !!}
					<div class="form-group">
					<p class="form-control-static">{{$branch->agency}}</p>
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
