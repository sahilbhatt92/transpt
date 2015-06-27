<div class="row">
	<div class="col-lg-6">
		{!! Form::label('truck_no','Truck No. :') !!}
		<div class="@if($errors->has('truck_no')) form-group has-error @else form-group @endif">
			{!! Form::text('truck_no',null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('truck_type','Truck Type :') !!}
		<div class="form-group">
			{!! Form::select('truck_type',[12=>12,15=>15,20=>20],null,['class'=>'form-control']) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		{!! Form::label('state_list','State Permit :') !!}
		<div class="@if($errors->has('state_list')) form-group has-error @else form-group @endif">
			{!! Form::select('state_list[]',$state,null,['class'=>'form-control','multiple']) !!}
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
	<div class="col-lg-6">
		{!! Form::label('driver_id','Driver Name :') !!}
		<div class="form-group">
		{!! Form::select('driver_id', $driver,null,['class'=>'form-control']); !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('maker_name','Maker Name :') !!}
		<div class="form-group">
			{!! Form::text('maker_name',null,['class'=>'form-control']) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		{!! Form::label('chasis_no','Chasis No. :') !!}
		<div class="form-group">
			{!! Form::text('chasis_no',null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('engine_no','Engine No. :') !!}
		<div class="form-group">
			{!! Form::text('engine_no',null,['class'=>'form-control']) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		{!! Form::label('permit_no','Permit No :') !!}
		<div class="form-group">
			{!! Form::text('permit_no',null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('permit_due_date_yr','Permit Due Date Yearly :') !!}
	    <div class="input-group date dates">
			{!! Form::text('permit_due_date_yr',null,['class'=>'form-control']) !!}
	        <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
	    </div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		{!! Form::label('permit_due_date_fyr','Permit Due Date Five Yearly :') !!}
	    <div class="input-group date dates">
			{!! Form::text('permit_due_date_fyr',null,['class'=>'form-control']) !!}
	        <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
	    </div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('purchase_date','Purchase Date :') !!}
	    <div class="input-group date dates">
			{!! Form::text('purchase_date',null,['class'=>'form-control']) !!}
	        <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
	    </div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		{!! Form::label('policy_no','Policy :') !!}
		<div class="form-group">
			{!! Form::text('policy_no',null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('road_tax_date','Road Tax Date :') !!}
	    <div class="input-group date dates">
			{!! Form::text('road_tax_date',null,['class'=>'form-control']) !!}
	        <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
	    </div>
	</div>
</div>

<div class="row">
	<div class="col-lg-6">
		{!! Form::label('fitness_due_date','Fitness Due Date :') !!}
	    <div class="input-group date dates">
			{!! Form::text('fitness_due_date',null,['class'=>'form-control']) !!}
	        <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
	    </div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('company_name','Company Name :') !!}
		<div class="form-group">
			{!! Form::text('company_name',null,['class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-6">
		{!! Form::label('city','City :') !!}
		<div class="form-group">
			{!! Form::text('city',null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('address','Address :') !!}
		<div class="form-group">
			{!! Form::text('address',null,['class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-6">
		{!! Form::label('rc_copy','RC Copy :') !!}
		<div class="form-group">
			{!! Form::text('rc_copy',null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('insurance','Insurance :') !!}
		<div class="form-group">
			{!! Form::text('insurance',null,['class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-6">
		{!! Form::label('rc_copy_photo','RC Copy Photo :') !!}
		<div class="@if($errors->has('rc_copy_photo')) form-group has-error @else form-group @endif">
			{!! Form::file('rc_copy_photo',['class'=>'form-control','accept'=>'image/gif|image/jpeg|image/png']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('insurance_photo','Insurance Photo :') !!}
				<div class="@if($errors->has('insurance_photo')) form-group has-error @else form-group @endif">
			{!! Form::file('insurance_photo',['class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-6">
		{!! Form::label('road_tax_photo','Road Tax Photo :') !!}
		<div class="@if($errors->has('road_tax_photo')) form-group has-error @else form-group @endif">
			{!! Form::file('road_tax_photo',['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('fitness_photo','Fitness Photo :') !!}
		<div class="@if($errors->has('fitness_photo')) form-group has-error @else form-group @endif">
			{!! Form::file('fitness_photo',['class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-6">
		{!! Form::label('permit_fyr_photo','Permit Five Year Photo :') !!}
		<div class="@if($errors->has('permit_fyr_photo')) form-group has-error @else form-group @endif">
			{!! Form::file('permit_fyr_photo',['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('permit_photo','Permit Photo :') !!}
		<div class="@if($errors->has('permit_photo')) form-group has-error @else form-group @endif">
			{!! Form::file('permit_photo',['class'=>'form-control']) !!}
		</div>
	</div>
</div>
