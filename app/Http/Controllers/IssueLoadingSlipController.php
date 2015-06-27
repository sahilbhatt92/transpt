<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\IssueLoadingSlip;
use App\Branch;
use DB;
use Validator;
use Input;
use Auth;

class IssueLoadingSlipController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $issueloadingslip = "";
	protected $branch = "";
	protected $validator = "";

	public function __construct(IssueLoadingSlip $issueloadingslip,Branch $branch, Validator $validator)
	 {
	 	$this->issueloadingslip = $issueloadingslip->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 	$this->branch = $branch->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 	$this->validator = $validator;
	 } 

	public function index()
	{
		$issueloadingslips = $this->issueloadingslip->get();
		$branch = $this->branch;
		return view('issueloadingslip.index',compact('issueloadingslips','branch'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$branch = $this->branch->orderBy('name', 'asc')->lists('name','id');
		$issueloadingslip = ($this->issueloadingslip->count() == 0)? 
						1:DB::table('issue_loadingslip')->select(DB::raw('MAX(issue_to)+1 as counter'))->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'))->first()->counter;
		$counter = $issueloadingslip;
		return view('issueloadingslip.create',compact('branch','counter'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{

		Validator::extend('loadingslipeater_than', function($attribute, $value, $parameters)
		{
 		    $other = Input::get($parameters[0]);

		    return isset($other) and intval($value) >= intval($other);
		});

		$messages = ['loadingslipeater_than'=>'Issue To must be loadingslipeater than Issue From'];

		$this->validate($request, [
        'branch_id' => 'required|max:255',
        'issue_to'=> 'required|loadingslipeater_than:issue_from'
    	],$messages);

		$input = $request->all();
		$input['company_id']       =  Auth::user()->company_id;
		$input['user_id']          =  Auth::user()->id;
		$input['account_year_id']  =  session('account');
		$issueloadingslip = IssueLoadingSlip::create($input);

		flash()->success('Issue Loading Slip Created Successfully !');

		return redirect('issueloadingslip');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$issueloadingslip = $this->issueloadingslip->find($id);
		$branch = $issueloadingslip->branch;
		return view('issueloadingslip.view',compact('issueloadingslip','branch'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$issueloadingslip = $this->issueloadingslip->find($id);
		$counter = $issueloadingslip->issue_from;
		$branch = $this->branch->orderBy('name', 'asc')->lists('name','id');
		return view('issueloadingslip.edit',compact('issueloadingslip','branch','counter'));
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

		$issueloadingslip = $this->issueloadingslip->find($id);
		$input = $request->all();
		$issueloadingslip->update($input);

		flash()->success('Issue Loading Slip Updated Successfully !');

		return redirect('issueloadingslip');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$issueloadingslip = $this->issueloadingslip->find($id);
		$issueloadingslip->delete();

		flash()->success('Issue Loading Slip Deleted Successfully !');

		return redirect('issueloadingslip');
	}
}
