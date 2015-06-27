<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use \App\Company;
use \App\User;
use \App\Role;
use \App\GrFields;

class CompanyController extends Controller {

	public function index()
	{
		return view('company.index');
	}

	public function save(Request $request)
	{

		$input = $request->all();
		// $field_name = implode('|',$input['website']['locales']);

		$company = new Company;
		$company->name = $input['client']['company_name'];
		$company->alias = $input['website']['sub_name'];
		$company->save();
		
		$user = new User;
		$user->name = $input['client']['name'];
		$user->email = $input['client']['email'];
		$user->password = $input['client']['password'];
		$user->ip = '*';
		$user->branch_id = 1;
		$user->company_id = $company->id;
		$user->active = 1;
		$user->save();

		$user->roles()->attach(Role::find(1)->id);

		// $gr_fields = new GrFields;
		// $gr_fields->field_name = $field_name;
		// $gr_fields->company_id = $company->id;
		// $gr_fields->save();

		session(['input'=>$input]);
		return redirect('thanks');

	}

	public function thanks()
	{
		return view('company.thanks');
	}

}