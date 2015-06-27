<div class="row">
	<div class="col-lg-6">
		{!! Form::label('branch_id','Branch Name :') !!}
		<div class="@if($errors->has('party_code')) form-group has-error @else form-group @endif">
			{!! Form::select('branch_id',$branch,null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('issue_date','Issue Date :') !!}
		<div class="form-group">
            <div class="input-group date dates">
				{!! Form::text('issue_date',null,['class'=>'form-control']) !!}
                <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
            </div>
        </div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		{!! Form::label('issue_from','Issue From :') !!}
		<div class="form-group">
			{!! Form::text('issue_from',$counter,['class'=>'form-control','readonly'=>'readonly']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('issue_to','Issue To :') !!}
		<div class="@if($errors->has('issue_to')) form-group has-error @else form-group @endif">
			{!! Form::text('issue_to',null,['class'=>'form-control',($disabled == 1)? ('readonly') : '']) !!}
		</div>
	</div>
</div>