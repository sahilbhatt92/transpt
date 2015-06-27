@extends('company')
@section('title')
	Create Company Account | Transport Management Software
@stop

@section('content')
@include('_partials.flash')
<div class="row">
	<div class="col-lg-12">

@if(Session::has('input'))
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Please copy your details to safe location</h3>
	</div>
	<div class="panel-body">
		<div>
			<h3 class="with-underline">Your Account Details</h3>
			<table class="table table-condensed info-table">
				<tbody>
					<tr>
						<td class="info-td">Name</td>
						<td><span id="r-name" class="label label-success">
							{{session('input')['client']['name']}}
						</span></td>
					</tr>
					<tr>
						<td class="info-td">Email</td>
						<td><span id="r-email" class="label label-success">
							{{session('input')['client']['email']}}
						</span></td>
					</tr>
					<tr>
						<td class="info-td">Password</td>
						<td><span id="r-password" class="label label-success">
							{{session('input')['client']['password']}}
						</span></td>
					</tr>
					<tr>
						<td class="info-td">Company Name</td>
						<td><span id="r-company-name" class="label label-success">
							{{session('input')['client']['company_name']}}
						</span></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div>
			<h3 class="with-underline">Your Website Details</h3>
			<table class="table table-condensed info-table">
				<tbody>
					<tr>
						<td class="info-td">Website Address</td>
						<td><span id="r-address" class="label label-success">
							http://{{session('input')['website']['sub_name']}}.bsstpt.com/auth/login
						</span></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="clearfix"></div>
		<a href="http://{{session('input')['website']['sub_name']}}.bsstpt.com/" class="btn btn-primary submit-btn">Now Login</a>
	</div>
	</div>
@else
	<h1 align="center" class="not-found">Oops! the page you are looking for is not found.</h1>
@endif


	</div>

</div>
@stop
