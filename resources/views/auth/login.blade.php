@extends('app')

@section('content')
<style> body{ background-color: #337AB7; }</style>
<div class="container-fluid">
<div class="row">
    <div class="col-lg-12">&nbsp;</div>
</div>
<div class="row">
    <div class="col-lg-12">&nbsp;</div>
</div>
<div class="row">
    <div class="col-lg-12">&nbsp;</div>
</div>
<div class="row">
    <div class="col-lg-12">&nbsp;</div>
</div>
<div class="row">
    <div class="col-lg-12">&nbsp;</div>
</div>
<div class="row">
    <div class="col-lg-12">&nbsp;</div>
</div>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">Login</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<input type="hidden" name="company_id" value="1">



						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

<!-- 						<div class="form-group">
							<label class="col-md-4 control-label">Branch</label>
							<div class="col-md-6">
								<select name="branch_id" id="branch_id">
									<option value="">Select Branch</option>
									@foreach(App\Branch::all() as $branch)
										<option value="{{$branch->id}}">{{$branch->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
 -->
						<div class="form-group">
							<label class="col-md-4 control-label">Accounting Session</label>
							<div class="col-md-6">
								<select name="account_year_id" id="account_year_id">
									@foreach(App\AccountYear::all() as $ac)
										<option value="{{$ac->id}}">{{$ac->name}}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Remember Me
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">Login</button>

								<a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
