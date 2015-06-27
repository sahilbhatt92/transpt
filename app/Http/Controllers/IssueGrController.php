<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\IssueGR;
use App\Branch;
use DB;
use Validator;
use Input;
use Auth;

class IssueGrController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $issuegr = "";
	protected $branch = "";
	protected $validator = "";

	public function __construct(IssueGR $issuegr,Branch $branch, Validator $validator)
	 {
	 	$this->issuegr = $issuegr->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 	$this->branch = $branch->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 	$this->validator = $validator;
	 } 

	public function index()
	{
		$issuegrs = $this->issuegr->get();
		$branch = $this->branch;
		return view('issuegr.index',compact('issuegrs','branch'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$branch = $this->branch->orderBy('name', 'asc')->lists('name','id');
		$issuegr = ($this->issuegr->count() == 0)? 
						1:DB::table('issue_gr')->select(DB::raw('MAX(issue_to)+1 as counter'))->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'))->first()->counter;
		$counter = $issuegr;
		return view('issuegr.create',compact('branch','counter'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{

		Validator::extend('greater_than', function($attribute, $value, $parameters)
		{
 		    $other = Input::get($parameters[0]);

		    return isset($other) and intval($value) >= intval($other);
		});

		$messages = ['greater_than'=>'Issue To must be greater than Issue From'];

		$this->validate($request, [
        'branch_id' => 'required|max:255',
        'issue_to'=> 'required|greater_than:issue_from'
    	],$messages);

		$input = $request->all();
		$input['company_id']       =  Auth::user()->company_id;
		$input['user_id']          =  Auth::user()->id;
		$input['account_year_id']  =  session('account');
		$issuegr = IssueGR::create($input);

		flash()->success('Issue G.R. Created Successfully !');

		return redirect('issuegr');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$issuegr = $this->issuegr->find($id);
		$branch = $issuegr->branch;
		return view('issuegr.view',compact('issuegr','branch'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$issuegr = $this->issuegr->find($id);
		$counter = $issuegr->issue_from;
		$branch = $this->branch->orderBy('name', 'asc')->lists('name','id');
		return view('issuegr.edit',compact('issuegr','branch','counter'));
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

		$issuegr = $this->issuegr->find($id);
		$input = $request->all();
		$issuegr->update($input);

		flash()->success('Issue G.R. Updated Successfully !');

		return redirect('issuegr');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$issuegr = $this->issuegr->find($id);
		$issuegr->delete();

		flash()->success('Issue G.R. Deleted Successfully !');

		return redirect('issuegr');
	}
}
