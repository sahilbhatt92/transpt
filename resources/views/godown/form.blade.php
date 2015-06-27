<div class="row">
	<div class="col-lg-6">
		{!! Form::label('name','Godown Name :') !!}
		<div class="@if($errors->has('name')) form-group has-error @else form-group @endif">
			{!! Form::text('name',null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('branch_id','Branch :') !!}
		<div class="form-group">
			{!! Form::select('branch_id',$branch,null,['class'=>'form-control']) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		{!! Form::label('godown_type','Godown Type :') !!}
		<div class="form-group">
			{!! Form::select('godown_type',[1=>'Owned',2=>'Agency'],null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('owner_name','Owner Name :') !!}
		<div class="form-group">
			{!! Form::text('owner_name',null,['class'=>'form-control']) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		{!! Form::label('owner_addr','Owner Address :') !!}
		<div class="form-group">
			{!! Form::text('owner_addr',null,['class'=>'form-control']) !!}
		</div>
	</div>
</div>
<div class="row">
		<div class="col-lg-6">
			{!! Form::label('party_id','Party :') !!}
			<div class="form-group">
				{!! Form::select('party_id',$party,null,['class'=>'form-control']) !!}
			</div>
		</div>
		<div class="col-lg-6">
			{!! Form::label('type','Type :') !!}
			<div class="form-group">
				{!! Form::select('type',[1=>'Rent',2=>'Owned'],null,['class'=>'form-control','id'=>'rent_type']) !!}
			</div>
		</div>
</div>
<div class="row rent">
	<h4 align="center">Rent</h4>
	<div class="col-lg-4">
		{!! Form::label('rent','Rent :') !!}
		<div class="form-group">
			{!! Form::text('rent',null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-4">
		{!! Form::label('security','Security :') !!}
		<div class="form-group">
			{!! Form::text('security',null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-4">
		{!! Form::label('validity_date','Validity Date :') !!}
	    <div class="input-group date dates">
			{!! Form::text('validity_date',null,['class'=>'form-control']) !!}
	        <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
		</div>
	</div>
</div>
<div class="row insurance">
	<h4 align="center">Insurance</h4>
	<div class="col-lg-4">
		{!! Form::label('insurance_company','Insurance Company :') !!}
		<div class="form-group">
			{!! Form::text('insurance_company',null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-4">
		{!! Form::label('policy_no','Policy No :') !!}
		<div class="form-group">
			{!! Form::text('policy_no',null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-4">
		{!! Form::label('insurance_validity_date','Insurance Validity Date :') !!}
	    <div class="input-group date dates">
			{!! Form::text('insurance_validity_date',null,['class'=>'form-control']) !!}
	        <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
		</div>
	</div>
</div>
