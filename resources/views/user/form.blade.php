<div class="row">
	<div class="col-lg-12">
		{!! Form::label('name','User Name :') !!}
		<div class="@if($errors->has('name')) form-group has-error @else form-group @endif">
			{!! Form::text('name',null,['class'=>'form-control']) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		{!! Form::label('email','Email :') !!}
		<div class="@if($errors->has('email')) form-group has-error @else form-group @endif">
			{!! Form::email('email',null,['class'=>'form-control']) !!}
		</div>
	</div>
</div>
@if($password=='true')
<div class="row">
	<div class="col-lg-12">
		{!! Form::label('password','Password :') !!}
		<div class="@if($errors->has('password')) form-group has-error @else form-group @endif">
			{!! Form::password('password',['class'=>'form-control']) !!}
		</div>
	</div>
</div>
@endif
<div class="row">
	<div class="col-lg-6">
		{!! Form::label('branch_id','Branch :') !!}
		<div class="@if($errors->has('branch_id')) form-group has-error @else form-group @endif">
			{!! Form::select('branch_id',$branch,null,['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-6">
		{!! Form::label('ip','IP Addr :') !!}
		<div class="form-group">
			{!! Form::text('ip',null,['class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-3">
		{!! Form::label('role','Role :') !!}
	</div>
	<div class="col-lg-9">
		{!! Form::label('perms','Permission :') !!}
	</div>
</div>

<div class="row">
<?php $i = 1; ?>
@foreach(App\Role::where('id','!=',1)->where('name', 'LIKE', '%master%')->get() as $role)
<?php $class = ($i==1)?'col-lg-3':'col-lg-2'; ?>
	<div class="{{$class}}">
	@if($user->hasRole($role->name))
		{!! Form::checkbox('role[]',$role->id,true,['id'=>$role->name,'class'=>'master']) !!} 
		{!! Form::label($role->name,$role->display_name) !!}
	@else
		{!! Form::checkbox('role[]',$role->id,null,['id'=>$role->name,'class'=>'master']) !!} 
		{!! Form::label($role->name,$role->display_name) !!}
	@endif
	</div>
<?php $i++; ?>
@endforeach
</div>
<div class="row">
&nbsp;
</div>
<div class="row">
<?php $i = 1; ?>
@foreach(App\Role::where('id','!=',1)->where('name', 'LIKE', '%transaction%')->get() as $role)
<?php $class = ($i==1)?'col-lg-3':'col-lg-2'; ?>
	<div class="{{$class}}">
	@if($user->hasRole($role->name))
		{!! Form::checkbox('role[]',$role->id,true,['id'=>$role->name,'class'=>'transaction']) !!} 
		{!! Form::label($role->name,$role->display_name) !!}
	@else
		{!! Form::checkbox('role[]',$role->id,null,['id'=>$role->name,'class'=>'transaction']) !!} 
		{!! Form::label($role->name,$role->display_name) !!}
	@endif
	</div>
<?php $i++; ?>
@endforeach
</div>
<div class="row">
&nbsp;
</div>
<div class="row">
<?php $i = 1; ?>
@foreach(App\Role::where('id','!=',1)->where('name', 'LIKE', '%fleet%')->get() as $role)
<?php $class = ($i==1)?'col-lg-3':'col-lg-2'; ?>
	<div class="{{$class}}">
	@if($user->hasRole($role->name))
		{!! Form::checkbox('role[]',$role->id,true,['id'=>$role->name,'class'=>'fleet']) !!} 
		{!! Form::label($role->name,$role->display_name) !!}
	@else
		{!! Form::checkbox('role[]',$role->id,null,['id'=>$role->name,'class'=>'fleet']) !!} 
		{!! Form::label($role->name,$role->display_name) !!}
	@endif
	</div>
<?php $i++; ?>
@endforeach
</div>
<div class="row">
&nbsp;
</div>
<div class="row">
<?php $i = 1; ?>
@foreach(App\Role::where('id','!=',1)->where('name', 'LIKE', '%accounts%')->get() as $role)
<?php $class = ($i==1)?'col-lg-3':'col-lg-2'; ?>
	<div class="{{$class}}">
	@if($user->hasRole($role->name))
		{!! Form::checkbox('role[]',$role->id,true,['id'=>$role->name,'class'=>'accounts']) !!} 
		{!! Form::label($role->name,$role->display_name) !!}
	@else
		{!! Form::checkbox('role[]',$role->id,null,['id'=>$role->name,'class'=>'accounts']) !!} 
		{!! Form::label($role->name,$role->display_name) !!}
	@endif
	</div>
<?php $i++; ?>
@endforeach
</div>
<div class="row">
&nbsp;
</div>
<div class="row">
<?php $i = 1; ?>
@foreach(App\Role::where('id','!=',1)->where('name', 'LIKE', '%reports%')->get() as $role)
<?php $class = ($i==1)?'col-lg-3':'col-lg-2'; ?>
	<div class="{{$class}}">
	@if($user->hasRole($role->name))
		{!! Form::checkbox('role[]',$role->id,true,['id'=>$role->name,'class'=>'reports']) !!} 
		{!! Form::label($role->name,$role->display_name) !!}
	@else
		{!! Form::checkbox('role[]',$role->id,null,['id'=>$role->name,'class'=>'reports']) !!} 
		{!! Form::label($role->name,$role->display_name) !!}
	@endif
	</div>
<?php $i++; ?>
@endforeach
</div>
<div class="row">
&nbsp;
</div>
