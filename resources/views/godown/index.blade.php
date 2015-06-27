@extends('app')
@section('title')
	Godown Details | Transport Management Software
@stop

@section('content')
@include('_partials.header')
<div id="page-wrapper">
<div class="row">
	<div class="col-lg-12">&nbsp;</div>
</div>
<div class="row">
@include('_partials.flash')
	<div class="col-lg-12">
	<div class="panel panel-default">
	    <div class="panel-heading">
			<div class="row">
				<div class="col-lg-10">
					<h4 class="">Godown Details</h4>
				</div>
				<div class="col-lg-2">
					<a href="{{route('godown.create')}}" class="btn btn-primary pull-right" {{ (Auth::user()->hasRole('admin') || Auth::user()->hasRole('master-add'))? '':'disabled' }}><i class="glyphicon glyphicon-plus"></i> Add</a>					</div>
			</div>
	    </div>
	    <!-- /.panel-heading -->
	    <div class="panel-body">
		<table class="table table-striped table-bordered table-hover" id="mainTable">
			<thead>
                <tr>
                    <th>Godown Name</th>
                    <th>Owner Name</th>
                    <th>Owner Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($godowns as $godown)
                <tr>
                    <td>{{$godown->name}}</td>
                    <td>{{$godown->owner_name}}</td>
                    <td>{{$godown->owner_addr}}</td>
                    <td class="center">
                    {!!Form::open(['route'=>['godown.destroy',$godown->id],'method'=>'DELETE'])!!}
                    <a href="{{route('godown.show',[$godown->id])}}" class="btn btn-small btn-default" {{ (Auth::user()->hasRole('admin') || Auth::user()->hasRole('master-view'))? '':'disabled' }}><i class="glyphicon glyphicon-search"></i> View</a>
                    <a href="{{route('godown.edit',[$godown->id])}}" class="btn btn-small btn-default" {{ (Auth::user()->hasRole('admin') || Auth::user()->hasRole('master-edit'))? '':'disabled' }}><i class="glyphicon glyphicon-pencil"></i> Edit</a>
					<button type="submit" class="btn btn-small btn-danger" onclick=" return (confirm('Are you sure ?'))? true : false;" {{ (Auth::user()->hasRole('admin') || Auth::user()->hasRole('master-delete'))? '':'disabled' }}><i class="glyphicon glyphicon-trash"></i> Delete</button>
					{!!Form::close()!!}
                    </td>
                </tr>
			@endforeach
                </tbody>
		</table>
		</div>
	</div>
</div>
</div>
        <!-- /#page-wrapper -->
@stop