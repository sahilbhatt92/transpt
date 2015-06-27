<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Branch;
use App\District;
use App\State;
use Auth;

class BranchController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $branch = "";
	protected $district = "";
	protected $state = "";

	public function __construct(Branch $branch, State $state, District $district)
	 {
	 	$this->branch = $branch->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 	$this->district = $district->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 	$this->state = $state->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 } 

	public function index()
	{
		$branches = $this->branch->get();
		return view('branch.index',compact('branches'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$state = $this->state->orderBy('name', 'asc')->lists('name','id');
		return view('branch.create',compact('state'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
        'name' => 'required|max:255',
        'mobile'=> 'numeric|min:10',
        'telephone'=> 'numeric'
    	]);
		$input = $request->all();
		$input['company_id']=Auth::user()->company->id;
		$input['account_year_id']=session('account');
		Branch::create($input);
		
		flash()->success('Branch Created Successfully !');

		return redirect('branch');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$branch = $this->branch->find($id);
		return view('branch.view',compact('branch'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$branch = $this->branch->find($id);
		$state = $this->state->orderBy('name', 'asc')->lists('name','id');
		return view('branch.edit',compact('branch','state'));
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
        'name' => 'required|max:255',
        'mobile'=> 'numeric|min:10',
        'telephone'=> 'numeric'
    	]);

		$branch = $this->branch->find($id);
		$branch->update($request->except('_method','_token'));
		
		flash()->success('Branch Updated Successfully !');

		return redirect('branch');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->branch->find($id)->delete();

		flash()->success('Branch Deleted Successfully !');

		return redirect('branch');
	}

}
