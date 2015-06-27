<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\IssueChallan;
use App\Branch;
use DB;
use Validator;
use Input;
use Auth;

class IssueChallanController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $issuechallan = "";
	protected $branch = "";
	protected $validator = "";

	public function __construct(IssueChallan $issuechallan,Branch $branch, Validator $validator)
	 {
	 	$this->issuechallan = $issuechallan->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 	$this->branch = $branch->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 	$this->validator = $validator;
	 } 

	public function index()
	{
		$issuechallans = $this->issuechallan->get();
		$branch = $this->branch;
		return view('issuechallan.index',compact('issuechallans','branch'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$branch = $this->branch->orderBy('name', 'asc')->lists('name','id');
		$issuechallan = ($this->issuechallan->count() == 0)? 
						1:DB::table('issue_challan')->select(DB::raw('MAX(issue_to)+1 as counter'))->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'))->first()->counter;
		$counter = $issuechallan;
		return view('issuechallan.create',compact('branch','counter'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{

		Validator::extend('challaneater_than', function($attribute, $value, $parameters)
		{
 		    $other = Input::get($parameters[0]);

		    return isset($other) and intval($value) >= intval($other);
		});

		$messages = ['challaneater_than'=>'Issue To must be challaneater than Issue From'];

		$this->validate($request, [
        'branch_id' => 'required|max:255',
        'issue_to'=> 'required|challaneater_than:issue_from'
    	],$messages);

		$input = $request->all();
		$input['company_id']       =  Auth::user()->company_id;
		$input['user_id']          =  Auth::user()->id;
		$input['account_year_id']  =  session('account');
		$issuechallan = IssueChallan::create($input);

		flash()->success('Issue Challan Created Successfully !');

		return redirect('issuechallan');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$issuechallan = $this->issuechallan->find($id);
		$branch = $issuechallan->branch;
		return view('issuechallan.view',compact('issuechallan','branch'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$issuechallan = $this->issuechallan->find($id);
		$counter = $issuechallan->issue_from;
		$branch = $this->branch->orderBy('name', 'asc')->lists('name','id');
		return view('issuechallan.edit',compact('issuechallan','branch','counter'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{
		$this->validate($request, [
        'branch_id' => 'required|max:255'
    	]);

		$issuechallan = $this->issuechallan->find($id);
		$input = $request->all();
		$issuechallan->update($input);

		flash()->success('Issue Challan Updated Successfully !');

		return redirect('issuechallan');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$issuechallan = $this->issuechallan->find($id);
		$issuechallan->delete();

		flash()->success('Issue Challan Deleted Successfully !');

		return redirect('issuechallan');
	}
}
