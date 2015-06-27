@extends('app')
@section('title')
	View Party | Transport Management Software
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
					<h4 class="">View Party</h4>
				</div>
				<div class="col-lg-4" align="right">
                    <a href="{{route('party.edit',[$party->id])}}" class="btn btn-small btn-default" {{ (Auth::user()->hasRole('admin') || Auth::user()->hasRole('master-edit'))? '':'disabled' }}><i class="glyphicon glyphicon-pencil"></i> Edit</a>
					<a href="{{route('party.index')}}" class="btn btn-default"><i class="glyphicon glyphicon-home"></i> Home</a>	
				</div>
			</div>
	    </div>
	    <!-- /.panel-heading -->
	    <div class="panel-body">
			@include('_partials.errors')
			<div class="row">
				<div class="col-lg-6">
					{!! Form::label('general_head_id','General Head :') !!}
					<p class="form-control-static">{{\App\GeneralHead::find($party->id)->name}}</p>
				</div>
				<div class="col-lg-6">
					{!! Form::label('name','Party Name :') !!}
					<p class="form-control-static">{{$party->name}}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					{!! Form::label('code','Party Code :') !!}
					<div class="form-group">
					<p class="form-control-static">{{$party->code}}</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					{!! Form::label('cperson','Contact Person :') !!}
					<div class="form-group">
					<p class="form-control-static">{{$party->cperson}}</p>
					</div>
				</div>
				<div class="col-lg-6">
					{!! Form::label('type','Booking Type :') !!}
					<div class="form-group">
					<p class="form-control-static">{{$party->type}}</p>
					</div>
				</div>
				<div class="col-lg-5">
					{!! Form::label('address','Address :') !!}
					<div class="form-group">
					<p class="form-control-static">{{$party->address}}</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					{!! Form::label('district','District :') !!}
					<div class="form-group">
					<p class="form-control-static">{{($party->district_id == 0)? '' : $party->district->name}}</p>
					</div>
				</div>
				<div class="col-lg-6">
					{!! Form::label('state','State :') !!}
					<div class="form-group">
					<p class="form-control-static">{{($party->state_id == 0)? '' : $party->state->name}}</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					{!! Form::label('telephone','Telephone :') !!}
					<div class="form-group">
					<p class="form-control-static">{{$party->telephone}}</p>
					</div>
				</div>
				<div class="col-lg-6">
					{!! Form::label('mobile','Mobile :') !!}
					<div class="form-group">
					<p class="form-control-static">{{$party->mobile}}</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					{!! Form::label('tin','TIN No. :') !!}
					<div class="form-group">
					<p class="form-control-static">{{$party->tin}}</p>
					</div>
				</div>
				<div class="col-lg-6">
					{!! Form::label('pan','PAN No. :') !!}
					<div class="form-group">
					<p class="form-control-static">{{$party->pan}}</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					{!! Form::label('email','Email :') !!}
					<div class="form-group">
					<p class="form-control-static">{{$party->email}}</p>
					</div>
				</div>
				<div class="col-lg-6">
					{!! Form::label('addToAcc','Do You Want this party in Accounts ?') !!}
					<div class="form-group">
						Yes
					</div>
				</div>
			</div>


			@if($party->addToAcc == 1)

<div class="row">
	<div class="col-lg-6">
		{!! Form::label('group_name','Account head :') !!}
		<div class="form-group">
			{{$party->group_name}}
		</div>
	</div>

	<div class="col-lg-6">
		<div class="row">
			<div class="col-lg-6">
				{!! Form::label('cr_amt','Opening Bal. (Cr.) :') !!}
				<div class="form-group">
					{{$party->cr_amt}}
				</div>
			</div>
			<div class="col-lg-6">
				{!! Form::label('dr_amt','Opening Bal. (Dr.) :') !!}
				<div class="form-group">
					{{$party->dr_amt}}
				</div>
			</div>
		</div>
	</div>
</div>


			@endif
		</div>
	</div>
	</div>
</div>
</div>
        <!-- /#page-wrapper -->
@stop
