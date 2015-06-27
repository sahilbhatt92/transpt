<div class="row">
	<div class="col-lg-6">
		{!! Form::label('name','Product Name :') !!}
		<div class="@if($errors->has('name')) form-group has-error @else form-group @endif">
			{!! Form::text('name',null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('type','Product Type :') !!}
		<div class="form-group">
			{!! Form::text('type',null,['class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-6">
		{!! Form::label('method','Method of Packaging :') !!}
		<div class="form-group">
			{!! Form::text('method',null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('mode','Mode of Packaging :') !!}
		<div class="form-group">
			{!! Form::text('mode',null,['class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-6">
		{!! Form::label('descp','Description :') !!}
		<div class="form-group">
			{!! Form::text('descp',null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('stored_pkgs','Stored Packages :') !!}
		<div class="form-group">
			{!! Form::text('stored_pkgs',null,['class'=>'form-control']) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		{!! Form::label('rate','Rate :') !!}
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1"><i class="fa fa-inr"></i></span>
			{!! Form::text('rate',null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('weight','Weight :') !!}
		<div class="form-group">
			{!! Form::text('weight',null,['class'=>'form-control']) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-3">
		{!! Form::label('length','Length') !!}
		<div class="form-group">
				{!! Form::text('length',null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-3" align="center">
		{!! Form::label('width','Width') !!}
		<div class="row">
			<div class="form-group col-lg-3">
				<p class="form-control-static">X</p>
			</div>
			<div class="form-group col-lg-9">
				{!! Form::text('width',null,['class'=>'form-control']) !!}
			</div>
		</div>
	</div>
	<div class="col-lg-3" align="center">
		{!! Form::label('height','Height') !!}
		<div class="row">
			<div class="form-group col-lg-3">
				<p class="form-control-static">X</p>
			</div>
			<div class="form-group col-lg-9">
				{!! Form::text('height',null,['class'=>'form-control']) !!}
			</div>
		</div>
	</div>
	<div class="col-lg-3" align="right">
		{!! Form::label('cft','CFT') !!}
		<div class="row">
			<div class="form-group col-lg-3">
				<p class="form-control-static">=</p>
			</div>
			<div class="form-group col-lg-9">
				{!! Form::text('cft',null,['class'=>'form-control']) !!}
			</div>
	</div>
</div>
