<div class="row">
	<div class="col-lg-6">
		{!! Form::label('party_id','Party Name') !!}
		<div class="@if($errors->has('party_id')) form-group has-error @else form-group @endif">
			{!! Form::select('party_id',$party,null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('truck_id','Truck No.') !!}
		<div class="@if($errors->has('truck_id')) form-group has-error @else form-group @endif">
			{!! Form::select('truck_id',$truck,null,['class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-6">
		{!! Form::label('from','From :') !!}
		<div class="form-group">
			{!! Form::select('from',$station,null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('to','To :') !!}
		<div class="form-group">
			{!! Form::select('to',$station,null,['class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-6">
		{!! Form::label('rate','Rate :') !!}
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1"><i class="fa fa-inr"></i></span>
			{!! Form::text('rate',null,['class'=>'form-control']) !!}
		</div>
	</div>
</div>