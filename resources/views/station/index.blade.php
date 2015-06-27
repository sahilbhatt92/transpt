@extends('app')
@section('title')
	Stations | Transport Management Software
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
					<h4 class="">Stations</h4>
				</div>
				<div class="col-lg-2">
					<a href="{{route('station.create')}}" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i> Add</a>	
				</div>
			</div>
	    </div>
	    <!-- /.panel-heading -->
	    <div class="panel-body">
		<table class="table table-striped table-bordered table-hover" id="mainTable">
			<thead>
                <tr>
                    <th>Station Name</th>
                    <th>District Name</th>
                    <th>State Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($stations as $station)
                <tr>
                    <td>{{$station->name}}</td>
                    <td>{{($station->state_id == 0)? '' : $station->district->name}}</td>
                    <td>{{($station->state_id == 0)? '' : $station->state->name}}</td>
                    <td class="center">
                    {!!Form::open(['route'=>['station.destroy',$station->id],'method'=>'DELETE'])!!}
                    <a href="{{route('station.show',[$station->id])}}" class="btn btn-small btn-default"><i class="glyphicon glyphicon-search"></i> View</a>
                    <a href="{{route('station.edit',[$station->id])}}" class="btn btn-small btn-default"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
					@if(Auth::user()->hasRole('admin'))
					<button type="submit" class="btn btn-small btn-danger" onclick=" return (confirm('Are you sure ?'))? true : false;"><i class="glyphicon glyphicon-trash"></i> Delete</button>
					@endif
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