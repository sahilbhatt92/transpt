<div class="row">
	<div class="col-lg-6">
		{!! Form::label('name','Branch Name :') !!}
		<div class="@if($errors->has('name')) form-group has-error @else form-group @endif">
			{!! Form::text('name',null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('cperson','Contact Person :') !!}
		<div class="form-group">
			{!! Form::text('cperson',null,['class'=>'form-control']) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		{!! Form::label('code','Branch Code :') !!}
		<div class="form-group">
			{!! Form::text('code',null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('type','Booking Type :') !!}
		<div class="form-group">
			{!! Form::select('type',['booking'=>'Booking','delivery'=>'Delivery','both'=>'Both'],null,['class'=>'form-control']) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		{!! Form::label('address','Address :') !!}
		<div class="form-group">
			{!! Form::text('address',null,['class'=>'form-control']) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		{!! Form::label('state_id','State :') !!}
		<div class="form-group">
			{!! Form::select('state_id',$state,null,['class'=>'form-control','id'=>'state']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('district_id','District :') !!}
		<div class="form-group">
			{!! Form::select('district_id',[],null,['class'=>'form-control','id'=>'district']) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		{!! Form::label('telephone','Telephone :') !!}
		<div class="@if($errors->has('telephone')) form-group has-error @else form-group @endif">
			{!! Form::text('telephone',null,['class'=>'form-control','maxlength'=>'11']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('mobile','Mobile :') !!}
		<div class="@if($errors->has('mobile')) input-group has-error @else input-group @endif">
			<span class="input-group-addon" id="basic-addon1">+91</span>
			{!! Form::text('mobile',null,['class'=>'form-control','maxlength'=>'10']) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		{!! Form::label('cst','Cst No. :') !!}
		<div class="form-group">
			{!! Form::text('cst',null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('tin','TIN No. :') !!}
		<div class="form-group">
			{!! Form::text('tin',null,['class'=>'form-control']) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		{!! Form::label('pan','PAN No. :') !!}
		<div class="form-group">
			{!! Form::text('pan',null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('pin','PIN No. :') !!}
		<div class="form-group">
			{!! Form::text('pin',null,['class'=>'form-control']) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		{!! Form::label('email','Email :') !!}
		<div class="form-group">
			{!! Form::email('email',null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('','Agency :') !!}
		<div class="form-group">
			{!! Form::radio('agency', 'yes') !!} Yes
			{!! Form::radio('agency', 'no') !!} No
		</div>
	</div>
</div>