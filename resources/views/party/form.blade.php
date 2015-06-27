<div class="row">
	<div class="col-lg-6">
		{!! Form::label('general_head_id','General Head :') !!}
		<div class="@if($errors->has('general_head_id')) form-group has-error @else form-group @endif">
			{!! Form::select('general_head_id',$generalhead,null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('name','Party Name :') !!}
		<div class="@if($errors->has('name')) form-group has-error @else form-group @endif">
			{!! Form::text('name',null,['class'=>'form-control']) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		{!! Form::label('code','Party Code :') !!}
		<div class="form-group">
			{!! Form::text('code',null,['class'=>'form-control']) !!}
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
		{!! Form::label('type','Party Type :') !!}
		<div class="form-group">
			{!! Form::select('type',['consignee'=>'Consignee','consignor'=>'Consignor'],null,['class'=>'form-control']) !!}
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
		{!! Form::label('tin','TIN No. :') !!}
		<div class="form-group">
			{!! Form::text('tin',null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('pan','PAN No. :') !!}
		<div class="form-group">
			{!! Form::text('pan',null,['class'=>'form-control']) !!}
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
		{!! Form::label('addToAcc','Do You Want this party in Accounts ?') !!}
		{!! Form::hidden('addToAcc',1)!!}
		<div class="form-group">
			Yes
		</div>
	</div>
</div>
	
<div id="acSec" class="row" style="display:none;">
	<div class="col-lg-6">
		{!! Form::label('group_name','Account head :') !!}
		<div class="form-group">
			{!! Form::select('group_name', ['Sudry Debtors' => 'Sudry Debtors', 'Sudry Creditors' => 'Sudry Creditors'],null,['class'=>'form-control']); !!}
		</div>
	</div>

	<div class="col-lg-6">
		<div class="row">
			<div class="col-lg-6">
				{!! Form::label('cr_amt','Opening Bal. (Cr.) :') !!}
				<div class="input-group">
				<span class="input-group-addon" id="basic-addon1"><i class="fa fa-inr"></i></span>
					{!! Form::text('cr_amt',null,['class'=>'form-control']) !!}
				</div>
			</div>
			<div class="col-lg-6">
				{!! Form::label('dr_amt','Opening Bal. (Dr.) :') !!}
				<div class="input-group">
				<span class="input-group-addon" id="basic-addon1"><i class="fa fa-inr"></i></span>
					{!! Form::text('dr_amt',null,['class'=>'form-control']) !!}
				</div>
			</div>
		</div>
	</div>
</div>

