@extends('app')
@section('title')
	Issue Voucher | Transport Management Software
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
					<h4 class="">Issue Voucher</h4>
				</div>
				<div class="col-lg-2">
					<a href="{{route('issuevoucher.create')}}" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i> Add</a>	
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
            @foreach($issuevouchers as $issuevoucher)
                <tr>
                    <td>{{($issuevoucher->branch_id == 0)? '' : $issuevoucher->branch->code}}</td>
                    <td>{{\Carbon\Carbon::parse($issuevoucher->issue_date)->format('d-m-Y')}}</td>
                    <td>{{$issuevoucher->issue_from}}</td>
                    <td>{{$issuevoucher->issue_to}}</td>
                    <td class="center">
                    {!!Form::open(['route'=>['issuevoucher.destroy',$issuevoucher->id],'method'=>'DELETE'])!!}
                    <a href="{{route('issuevoucher.show',[$issuevoucher->id])}}" class="btn btn-small btn-default"><i class="glyphicon glyphicon-search"></i> View</a>
                    <a href="{{route('issuevoucher.edit',[$issuevoucher->id])}}" class="btn btn-small btn-default"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
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