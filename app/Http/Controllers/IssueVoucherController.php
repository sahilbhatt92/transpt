<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\IssueVoucher;
use App\Branch;
use DB;
use Validator;
use Input;
use Auth;

class IssueVoucherController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $issuevoucher = "";
	protected $branch = "";
	protected $validator = "";

	public function __construct(IssueVoucher $issuevoucher,Branch $branch, Validator $validator)
	 {
	 	$this->issuevoucher = $issuevoucher->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 	$this->branch = $branch->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 	$this->validator = $validator;
	 } 

	public function index()
	{
		$issuevouchers = $this->issuevoucher->get();
		$branch = $this->branch;
		return view('issuevoucher.index',compact('issuevouchers','branch'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$branch = $this->branch->orderBy('name', 'asc')->lists('name','id');
		$issuevoucher = ($this->issuevoucher->count() == 0)? 
						1:DB::table('issue_voucher')->select(DB::raw('MAX(issue_to)+1 as counter'))->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'))->first()->counter;
		$counter = $issuevoucher;
		return view('issuevoucher.create',compact('branch','counter'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{

		Validator::extend('vouchereater_than', function($attribute, $value, $parameters)
		{
 		    $other = Input::get($parameters[0]);

		    return isset($other) and intval($value) >= intval($other);
		});

		$messages = ['vouchereater_than'=>'Issue To must be vouchereater than Issue From'];

		$this->validate($request, [
        'branch_id' => 'required|max:255',
        'issue_to'=> 'required|vouchereater_than:issue_from'
    	],$messages);

		$input = $request->all();
		$input['company_id']       =  Auth::user()->company_id;
		$input['user_id']          =  Auth::user()->id;
		$input['account_year_id']  =  session('account');
		$issuevoucher = IssueVoucher::create($input);

		flash()->success('Issue Voucher Created Successfully !');

		return redirect('issuevoucher');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$issuevoucher = $this->issuevoucher->find($id);
		$branch = $issuevoucher->branch;
		return view('issuevoucher.view',compact('issuevoucher','branch'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$issuevoucher = $this->issuevoucher->find($id);
		$counter = $issuevoucher->issue_from;
		$branch = $this->branch->orderBy('name', 'asc')->lists('name','id');
		return view('issuevoucher.edit',compact('issuevoucher','branch','counter'));
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

		$issuevoucher = $this->issuevoucher->find($id);
		$input = $request->all();
		$issuevoucher->update($input);

		flash()->success('Issue Voucher Updated Successfully !');

		return redirect('issuevoucher');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$issuevoucher = $this->issuevoucher->find($id);
		$issuevoucher->delete();

		flash()->success('Issue Voucher Deleted Successfully !');

		return redirect('issuevoucher');
	}
}
