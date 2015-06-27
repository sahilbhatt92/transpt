<div class="row">
	<div class="col-lg-6">
		{!! Form::label('name','Product Name :') !!}
		<div class="@if($errors->has('name')) form-group has-error @else form-group @endif">
			{!! Form::text('name',null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('size','Size :') !!}
		<div class="form-group">
			{!! Form::text('size',null,['class'=>'form-control']) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		{!! Form::label('weight','Weight :') !!}
		<div class="form-group">
			{!! Form::text('weight',null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('price','Price :') !!}
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1"><i class="fa fa-inr"></i></span>
			{!! Form::text('price',null,['class'=>'form-control']) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		{!! Form::label('sno','S No. :') !!}
		<div class="form-group">
			{!! Form::text('sno',null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('remarks','Remarks :') !!}
		<div class="form-group">
			{!! Form::text('remarks',null,['class'=>'form-control']) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		{!! Form::label('brand_id','Brand') !!}
		<div class="form-group">
			{!! Form::select('brand_id',$brand,null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('product_id','Product Category') !!}
		<div class="form-group">
			{!! Form::select('product_id',$product,null,['class'=>'form-control']) !!}
		</div>
	</div>
</div>
