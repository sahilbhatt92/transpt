@extends('app')
@section('title')
	Issue G.R. | Transport Management Software
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
					<h4 class="">Issue G.R.</h4>
				</div>
				<div class="col-lg-2">
					<a href="{{route('issuegr.create')}}" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i> Add</a>	
				</div>
			</div>
	    </div>
	    <!-- /.panel-heading -->
	    <div class="panel-body">
		<table class="table table-striped table-bordered table-hover" id="mainTable">
			<thead>
                <tr>
                    <th>Branch Code</th>
                    <th>Issue Date</th>
                    <th>Issue From</th>
                    <th>Issue To</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($issuegrs as $issuegr)
                <tr>
                    <td>{{($issuegr->branch_id == 0)? '' : $issuegr->branch->code}}</td>
                    <td>{{\Carbon\Carbon::parse($issuegr->issue_date)->format('d-m-Y')}}</td>
                    <td>{{$issuegr->issue_from}}</td>
                    <td>{{$issuegr->issue_to}}</td>
                    <td class="center">
                    {!!Form::open(['route'=>['issuegr.destroy',$issuegr->id],'method'=>'DELETE'])!!}
                    <a href="{{route('issuegr.show',[$issuegr->id])}}" class="btn btn-small btn-default"><i class="glyphicon glyphicon-search"></i> View</a>
                    <a href="{{route('issuegr.edit',[$issuegr->id])}}" class="btn btn-small btn-default"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
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