<div class="row">
	<div class="col-lg-12">
	{!! Form::label('state','State :') !!}
		<div class="@if($errors->has('state_id')) form-group has-error @else form-group @endif">
			{!! Form::select('state_id',$state,null,['class'=>'form-control','id'=>'state']) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		{!! Form::label('name','District Name :') !!}
		<div class="@if($errors->has('name')) form-group has-error @else form-group @endif">
			{!! Form::text('name',null,['class'=>'form-control']) !!}
		</div>
	</div>
</div>
