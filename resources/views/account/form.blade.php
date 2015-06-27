<div class="row">
	<div class="col-lg-12">
		{!! Form::label('group_name','Group Name :') !!}
		<div class="form-group">
			{!! Form::text('group_name',null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-12">
		{!! Form::label('account_name','Account Name :') !!}
		<div class="@if($errors->has('account_name')) form-group has-error @else form-group @endif">
			{!! Form::text('account_name',null,['class'=>'form-control']) !!}
		</div>
	</div>
</div>
