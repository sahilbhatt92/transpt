@extends('app')
@section('title')
	Districts | Transport Management Software
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
					<h4 class="">Districts</h4>
				</div>
				<div class="col-lg-2">
					<a href="{{route('district.create')}}" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i> Add</a>	
				</div>
			</div>
	    </div>
	    <!-- /.panel-heading -->
	    <div class="panel-body">
		<table class="table table-striped table-bordered table-hover" id="mainTable">
			<thead>
                <tr>
                    <th>District Name</th>
                    <th>State Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($districts as $district)
                <tr>
                    <td>{{$district->name}}</td>
                    <td>{{($district->state_id == 0)? '' : $district->state->name}}</td>
                    <td class="center">
                    {!!Form::open(['route'=>['district.destroy',$district->id],'method'=>'DELETE'])!!}
                    <a href="{{route('district.show',[$district->id])}}" class="btn btn-small btn-default"><i class="glyphicon glyphicon-search"></i> View</a>
                    <a href="{{route('district.edit',[$district->id])}}" class="btn btn-small btn-default"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
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