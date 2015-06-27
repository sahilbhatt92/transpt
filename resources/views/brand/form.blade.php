<div class="row">
	<div class="col-lg-12">
		{!! Form::label('name','Brand Name :') !!}
		<div class="@if($errors->has('name')) form-group has-error @else form-group @endif">
			{!! Form::text('name',null,['class'=>'form-control']) !!}
		</div>
	</div>
</div>
