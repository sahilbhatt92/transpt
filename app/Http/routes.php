<?php
use \Request as Request;
use \App\Role;
use Crypt as Encrypt;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

 $server = explode('.', Request::server('HTTP_HOST'));

Route::group(['domain'=> $server[0].'.transpt.co.in'],function(){
	$server = explode('.', Request::server('HTTP_HOST'));
	if($server[0] == "www")
	{

		Route::get('/',function(){
			return redirect()->route('company');
		});

		Route::get('company',['as'=>'company','uses'=>'CompanyController@index']);
		Route::post('company','CompanyController@save');
		Route::get('thanks','CompanyController@thanks');

		Route::post('validation/email','ValidationController@email');
		Route::post('validation/alias','ValidationController@alias');

	}else{

		$server = explode('.', Request::server('HTTP_HOST'));
		$alias = \App\Company::where('alias',$server[0])->first()->alias;


		Route::group(['domain'=> $alias.'.transpt.co.in'],function(){

			Route::get('/',function(){

				return redirect()->route('dashboard');
			});


			Route::group(['middleware'=>'auth'],function(){

				Route::get('dashboard',['as'=>'dashboard','uses'=>function(){
					return view('dashboard');
				}]);

					Route::resource('user','UserController');
					Route::resource('branch','BranchController');
					Route::resource('party','PartyController');
					Route::resource('driver','DriverController');
					Route::resource('truck','TruckController');
					Route::resource('issuegr','IssueGrController');
					Route::resource('issuechallan','IssueChallanController');
					Route::resource('issuebill','IssueBillController');
					Route::resource('issuevoucher','IssueVoucherController');
					Route::resource('issueloadingslip','IssueLoadingSlipController');
					Route::resource('station','StationController');
					Route::resource('district','DistrictController');
					Route::resource('state','StateController');
					Route::resource('generalhead','GeneralHeadController');
					Route::resource('brand','BrandController');
					Route::resource('product','ProductController');
					Route::resource('productdetail','ProductDetailController');
					Route::resource('grstatus','GRStatusController');
					Route::resource('freightprice','FreightPriceController');
					Route::resource('productregistration','ProductRegistrationController');
					Route::resource('godown','GodownController');
					Route::resource('account','AccountController');
					Route::resource('invoice','InvoiceController');

			});

		});

	}

}); 

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
