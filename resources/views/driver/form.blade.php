<div class="row">
	<div class="col-lg-6">
		{!! Form::label('name','Driver Name :') !!}
		<div class="@if($errors->has('name')) form-group has-error @else form-group @endif">
			{!! Form::text('name',null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('father_name','Father\'s Name :') !!}
		<div class="form-group">
			{!! Form::text('father_name',null,['class'=>'form-control']) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		{!! Form::label('license','License No. :') !!}
		<div class="form-group">
			{!! Form::text('license',null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('license_photo','License Photo :') !!}
		<div class="form-group">
			{!! Form::file('license_photo',['class'=>'form-control']) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		{!! Form::label('photo','Driver Photo :') !!}
		<div class="form-group">
			{!! Form::file('photo',['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('license_date','License Valid Upto :') !!}
	    <div class="input-group date dates">
			{!! Form::text('license_date',null,['class'=>'form-control']) !!}
	        <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		{!! Form::label('address','Address :') !!}
		<div class="form-group">
			{!! Form::text('address',null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('contact','Contact :') !!}
		<div class="@if($errors->has('contact')) input-group has-error @else input-group @endif">
			<span class="input-group-addon" id="basic-addon1">+91</span>
			{!! Form::text('contact',null,['class'=>'form-control','maxlength'=>'10']) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		{!! Form::label('g_name','Guarantor Name :') !!}
		<div class="form-group">
			{!! Form::text('g_name',null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('g_addr','Guarantor Address :') !!}
		<div class="form-group">
			{!! Form::text('g_addr',null,['class'=>'form-control']) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		{!! Form::label('g_phone','Guarantor Phone :') !!}
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">+91</span>
			{!! Form::text('g_phone',null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('g_photo','Contact :') !!}
		<div class="form-group">
			{!! Form::file('g_photo',['class'=>'form-control','maxlength'=>'10']) !!}
		</div>
	</div>
</div>