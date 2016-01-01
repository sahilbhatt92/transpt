@extends('company')
@section('title')
	Create Company Account | Transport Management Software
@stop

@section('content')
{{Session::forget('input')}}
			<div class="content">
				<div class="example">
					<div class="row bs-wizard">
						<div class="col-lg-3">
							<ol class="bs-wizard-sidebar">
								<li class="bs-wizard-todo bs-wizard-active"><a href="javascript:void(0)">Your Account Details</a></li>
								<li class="bs-wizard-todo"><a href="javascript:void(0)">Your Website Details</a></li>
								<li class="bs-wizard-todo"><a href="javascript:void(0)">Review and Sign up</a></li>
							</ol>
						</div>
						<div class="col-lg-9">
						{!!Form::open(['class'=>'new_client','accept-charset'=>'UTF-8','id'=>'signup_form'])!!}
								<fieldset>
									<div class="bs-step inv">
										<div class="panel panel-default">
											<div class="panel-heading">
												<h3 class="panel-title">Please fill in your account details</h3>
											</div>
											<div class="panel-body bs-step-inner">
												<div class="form-group">
													<label for="client_name">Name</label>
													<div class="form-group">
														<input type="text" value="" size="30" placeholder="Your Name" name="client[name]" id="client_name" class="required name form-control" data-popover-offset="0,15" autofocus="autofocus">
													</div>
												</div>
												<div class="form-group">
													<label for="client_email">Email</label>
													<div class="form-group">
														<input type="text" value="" size="30" placeholder="Your Email" name="client[email]" id="client_email" class="required email form-control" data-popover-offset="0,15" autofocus="autofocus">
													</div>
												</div>
												<div class="form-group">
													<label for="client_password">Password</label>
													<div class="form-group">
														<input type="password" size="30" placeholder="Your Password" name="client[password]" id="client_password" data-popover-offset="0,15" class="form-control">
													</div>
												</div>
												<div class="form-group">
													<label for="client_password_confirmation">Password Confirmation</label>
													<div class="form-group">
														<input type="password" size="30" placeholder="Confirm Your Password" name="client[password_confirmation]" id="client_password_confirmation" data-popover-offset="0,15" class="form-control">
													</div>
												</div>
												<div class="form-group">
													<label for="client_company_name">Company Name</label>
													<div class="form-group">
														<input type="text" value="" size="30" placeholder="e.g. ABC Transport Inc." name="client[company_name]" id="client_company_name" class="required company_name form-control" data-popover-offset="0,15" autofocus="autofocus">
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="bs-step inv">
										<div class="panel panel-default">
											<div class="panel-heading">
												<h3 class="panel-title">Please provide your website information</h3>
											</div>
											<div class="panel-body bs-step-inner">
												<div class="col-lg-6">
													<div class="form-group">
														<label for="website_sub_name">Subdomain name</label>
														<div class="input-group input-group-fix">
															<span class="input-group-addon">http://</span>
															<input type="text" size="30" placeholder="Your Subdomain Name" name="website[sub_name]" id="website_sub_name" data-popover-offset="0,120" class="span2 form-control">
															<span class="input-group-addon">.transpt.co.in</span>
														</div>
													</div>
												</div>
												<div class="clearfix"></div>
												<!-- 
												<div class="form-group">
													<label for="website_locales">G.R. Fields</label>
													<div class="input-group" id="locale-wrapper">
														<input type="checkbox" data-name="Freight" value="freight" name="website[locales][]" id="locales_0" data-popover-offset="-10,175" checked="checked">
														<label>Freight</label>
														<input type="checkbox" data-name="Kanta" value="kanta" name="website[locales][]" id="locales_1">
														<label>Kanta</label>
														<input type="checkbox" data-name="FOV Charges 0.2%" value="fov" name="website[locales][]" id="locales_1">
														<label>FOV Charges 0.2%</label>
														<input type="checkbox" data-name="Other Charges" value="other_chg" name="website[locales][]" id="locales_1">
														<label>Other Charges</label>
														<input type="checkbox" data-name="Hamali" value="hamali" name="website[locales][]" id="locales_1">
														<label>Hamali</label>
														<input type="checkbox" data-name="Service Tax" value="service_tax" name="website[locales][]" id="locales_1">
														<label>Service Tax</label>
														<input type="checkbox" data-name="Ed. Tax" value="ed_tax" name="website[locales][]" id="locales_1">
														<label>Ed. Tax</label>
														<input type="checkbox" data-name="Risk Ch." value="risk_chg" name="website[locales][]" id="locales_1">
														<label>Risk Ch.</label>
														<input type="checkbox" data-name="Surcharge" value="sur_chg" name="website[locales][]" id="locales_1">
														<label>Surcharge</label>
														<input type="checkbox" data-name="ST. Charge" value="st_chg" name="website[locales][]" id="locales_1">
														<label>ST. Charge</label>
														<input type="checkbox" data-name="CH. Post" value="ch_post" name="website[locales][]" id="locales_1">
														<label>CH. Post</label>
														<input type="checkbox" data-name="To Pay Services" value="topay_services" name="website[locales][]" id="locales_1">
														<label>To Pay Services</label>
														<input type="checkbox" data-name="Docket Charges" value="docket_chg" name="website[locales][]" id="locales_1">
														<label>Docket Charges</label>
														<input type="checkbox" data-name="ST Management Charges" value="st_management_chg" name="website[locales][]" id="locales_1">
														<label>ST Management Charges</label>
														<input type="checkbox" data-name="Service Tax" value="service_tax" name="website[locales][]" id="locales_1">
														<label>Service Tax</label>
													</div>
													<div class="clearfix"></div>
												</div> -->
											</div>
										</div>
									</div>
									<div class="bs-step inv">
										<div class="panel panel-default">
											<div class="panel-heading">
												<h3 class="panel-title">Please review your details and sign up</h3>
											</div>
											<div class="panel-body bs-step-inner">
												<div>
													<h3 class="with-underline">Your Account Details</h3>
													<table class="table table-condensed info-table">
														<tbody>
															<tr>
																<td class="info-td">Name</td>
																<td><span id="r-name" class="label label-success"></span></td>
															</tr>
															<tr>
																<td class="info-td">Email</td>
																<td><span id="r-email" class="label label-success"></span></td>
															</tr>
															<tr>
																<td class="info-td">Password</td>
																<td><span id="r-password" class="label label-success"></span></td>
															</tr>
															<tr>
																<td class="info-td">Company Name</td>
																<td><span id="r-company-name" class="label label-success"></span></td>
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
																<td><span id="r-address" class="label label-success"></span></td>
															</tr>
															<!-- <tr>
																<td class="info-td">G.R. Fields</td>
																<td id="r-locales"></td>
															</tr> -->
														</tbody>
													</table>
												</div>
												<div class="clearfix"></div>
												<button id="last-back" type="reset" class="btn btn-default">Go Back</button>
												<button id="btn-signup" type="submit" class="btn btn-primary submit-btn">Sign Up</button>
											</div>
										</div>
									</div>
								</fieldset>
							{!!Form::close()!!}
						</div>
					</div>
				</div>
			</div>
@stop