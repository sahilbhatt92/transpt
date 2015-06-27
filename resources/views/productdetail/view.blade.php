@extends('app')
@section('title')
	View Product Detail | Transport Management Software
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
					<h4 class="">View Product Detail</h4>
				</div>
				<div class="col-lg-4" align="right">
                    <a href="{{route('productdetail.edit',[$productdetail->id])}}" class="btn btn-small btn-default" {{ (Auth::user()->hasRole('admin') || Auth::user()->hasRole('master-edit'))? '':'disabled' }}><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                    <a href="{{route('productdetail.index')}}" class="btn btn-default"><i class="glyphicon glyphicon-home"></i> Home</a>	
				</div>
			</div>
	    </div>
	    <!-- /.panel-heading -->
	    <div class="panel-body">
			@include('_partials.errors')

<div class="row">
	<div class="col-lg-6">
		{!! Form::label('name','Product Name :') !!}
		<div class="form-group">
			<p class="form-control-static">{{$productdetail->name}}</p>
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('size','Size :') !!}
		<div class="form-group">
			<p class="form-control-static">{{$productdetail->size}}</p>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		{!! Form::label('weight','Weight :') !!}
		<div class="form-group">
			<p class="form-control-static">{{$productdetail->weight}}</p>
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('price','Price :') !!}
		<div class="input-group">
			<p class="form-control-static">{{$productdetail->price}}</p>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		{!! Form::label('sno','S No. :') !!}
		<div class="form-group">
			<p class="form-control-static">{{$productdetail->sno}}</p>
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('remarks','Remarks :') !!}
		<div class="form-group">
			<p class="form-control-static">{{$productdetail->remarks}}</p>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		{!! Form::label('brand_id','Brand') !!}
		<div class="form-group">
			<p class="form-control-static">{{($productdetail->brand_id == 0)? '' : $productdetail->brand->name}}</p>
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('product_id','Product Category') !!}
		<div class="form-group">
			<p class="form-control-static">{{($productdetail->product_id == 0)? '' : $productdetail->product->name}}</p>
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
