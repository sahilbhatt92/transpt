@extends('app')
@section('title')
	Product Details | Transport Management Software
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
					<h4 class="">Product Details</h4>
				</div>
				<div class="col-lg-2">
					<a href="{{route('productdetail.create')}}" class="btn btn-primary pull-right" {{ (Auth::user()->hasRole('admin') || Auth::user()->hasRole('master-add'))? '':'disabled' }}><i class="glyphicon glyphicon-plus"></i> Add</a>					</div>
			</div>
	    </div>
	    <!-- /.panel-heading -->
	    <div class="panel-body">
		<table class="table table-striped table-bordered table-hover" id="mainTable">
			<thead>
                <tr>
                    <th>Product Name</th>
                    <th>Brand Name</th>
                    <th>Product Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($productdetails as $productdetail)
                <tr>
                    <td>{{$productdetail->name}}</td>
                    <td>{{($productdetail->brand_id == 0)? '' : $productdetail->brand->name}}</td>
                    <td>{{($productdetail->product_id == 0)? '' : $productdetail->product->name}}</td>
                    <td class="center">
                    {!!Form::open(['route'=>['productdetail.destroy',$productdetail->id],'method'=>'DELETE'])!!}
                    <a href="{{route('productdetail.show',[$productdetail->id])}}" class="btn btn-small btn-default" {{ (Auth::user()->hasRole('admin') || Auth::user()->hasRole('master-view'))? '':'disabled' }}><i class="glyphicon glyphicon-search"></i> View</a>
                    <a href="{{route('productdetail.edit',[$productdetail->id])}}" class="btn btn-small btn-default" {{ (Auth::user()->hasRole('admin') || Auth::user()->hasRole('master-edit'))? '':'disabled' }}><i class="glyphicon glyphicon-pencil"></i> Edit</a>
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