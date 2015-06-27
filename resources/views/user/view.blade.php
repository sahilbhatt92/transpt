@extends('app')
@section('title')
	View User | Transport Management Software
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
					<h4 class="">View User</h4>
				</div>
                    @if(Auth::user()->hasRole('admin'))
					<div class="col-lg-4" align="right">
	                    <a href="{{route('user.edit',[$user->id])}}" class="btn btn-small btn-default"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
						<a href="{{route('user.index')}}" class="btn btn-default"><i class="glyphicon glyphicon-home"></i> Home</a>	
					</div>
					@endif
			</div>
	    </div>
	    <!-- /.panel-heading -->
	    <div class="panel-body">
			@include('_partials.errors')
			<div class="row">
				<div class="col-lg-12">
					{!! Form::label('name','User Name :') !!}
					<div class="@if($errors->has('name')) form-group has-error @else form-group @endif">
						{{ $user->name }}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					{!! Form::label('email','Email :') !!}
					<div class="form-group">
						{{ $user->email }}
					</div>
				</div>
			</div>

<div class="row">
	<div class="col-lg-3">
		{!! Form::label('role','Role :') !!}
	</div>
	<div class="col-lg-9">
		{!! Form::label('perms','Permission :') !!}
	</div>
</div>

<div class="row clear-style">
<?php $i = 1; ?>
@foreach($user->roles()->where('name', 'LIKE', '%master%')->get() as $role)
<?php $class = ($i==1)?'col-lg-3':'col-lg-2'; ?>
	<div class="{{$class}}">
		<span class="label label-success">{{$role->display_name}}</span>
	</div>
<?php $i++; ?>
@endforeach
</div>
<div class="row clear-style">
<?php $i = 1; ?>
@foreach($user->roles()->where('name', 'LIKE', '%transaction%')->get() as $role)
<?php $class = ($i==1)?'col-lg-3':'col-lg-2'; ?>
	<div class="{{$class}}">
		<span class="label label-success">{{$role->display_name}}</span>
	</div>
<?php $i++; ?>
@endforeach
</div>
<div class="row clear-style">
<?php $i = 1; ?>
@foreach($user->roles()->where('name', 'LIKE', '%bill%')->get() as $role)
<?php $class = ($i==1)?'col-lg-3':'col-lg-2'; ?>
	<div class="{{$class}}">
		<span class="label label-success">{{$role->display_name}}</span>
	</div>
<?php $i++; ?>
@endforeach
</div>
<div class="row clear-style">
<?php $i = 1; ?>
@foreach($user->roles()->where('name', 'LIKE', '%fleet%')->get() as $role)
<?php $class = ($i==1)?'col-lg-3':'col-lg-2'; ?>
	<div class="{{$class}}">
		<span class="label label-success">{{$role->display_name}}</span>
	</div>
<?php $i++; ?>
@endforeach
</div>
<div class="row clear-style">
<?php $i = 1; ?>
@foreach($user->roles()->where('name', 'LIKE', '%accounts%')->get() as $role)
<?php $class = ($i==1)?'col-lg-3':'col-lg-2'; ?>
	<div class="{{$class}}">
		<span class="label label-success">{{$role->display_name}}</span>
	</div>
<?php $i++; ?>
@endforeach
</div>
<div class="row clear-style">
<?php $i = 1; ?>
@foreach($user->roles()->where('name', 'LIKE', '%reports%')->get() as $role)
<?php $class = ($i==1)?'col-lg-3':'col-lg-2'; ?>
	<div class="{{$class}}">
		<span class="label label-success">{{$role->display_name}}</span>
	</div>
<?php $i++; ?>
@endforeach
</div>


			
		</div>
	</div>
	</div>
</div>
</div>
        <!-- /#page-wrapper -->
@stop
