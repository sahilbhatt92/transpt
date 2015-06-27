<div class="row">
	<div class="col-lg-12">
		{!! Form::label('state_id','State :') !!}
		<div class="@if($errors->has('state')) form-group has-error @else form-group @endif">
			{!! Form::select('state_id',$state,null,['class'=>'form-control','id'=>'state']) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		{!! Form::label('district_id','District :') !!}
		<div class="@if($errors->has('district')) form-group has-error @else form-group @endif">
			{!! Form::select('district_id',[],null,['class'=>'form-control','id'=>'district']) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		{!! Form::label('name','Station Name :') !!}
		<div class="@if($errors->has('name')) form-group has-error @else form-group @endif">
			{!! Form::text('name',null,['class'=>'form-control']) !!}
		</div>
	</div>
</div>
