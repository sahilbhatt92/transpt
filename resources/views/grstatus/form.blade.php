<div class="row">
	<div class="col-lg-6">
		{!! Form::label('gr_id','GR No.') !!}
		<div class="@if($errors->has('gr_id')) form-group has-error @else form-group @endif">
			{!! Form::select('gr_id',$gr,null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('date','Date :') !!}
	    <div class="input-group date dates">
			{!! Form::text('date',null,['class'=>'form-control']) !!}
	        <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		{!! Form::label('status','Status :') !!}
		<div class="form-group">
			{!! Form::text('status',null,['class'=>'form-control']) !!}
		</div>
	</div>
</div>