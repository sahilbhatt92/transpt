<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\IssueBill;
use App\Branch;
use DB;
use Validator;
use Input;
use Auth;

class IssueBillController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $issuebill = "";
	protected $branch = "";
	protected $validator = "";

	public function __construct(IssueBill $issuebill,Branch $branch, Validator $validator)
	 {
	 	$this->issuebill = $issuebill->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 	$this->branch = $branch->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 	$this->validator = $validator;
	 } 

	public function index()
	{
		$issuebills = $this->issuebill->get();
		$branch = $this->branch;
		return view('issuebill.index',compact('issuebills','branch'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$branch = $this->branch->orderBy('name', 'asc')->lists('name','id');
		$issuebill = ($this->issuebill->count() == 0)? 
						1:DB::table('issue_bill')->select(DB::raw('MAX(issue_to)+1 as counter'))->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'))->first()->counter;
		$counter = $issuebill;
		return view('issuebill.create',compact('branch','counter'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{

		Validator::extend('billeater_than', function($attribute, $value, $parameters)
		{
 		    $other = Input::get($parameters[0]);

		    return isset($other) and intval($value) >= intval($other);
		});

		$messages = ['billeater_than'=>'Issue To must be billeater than Issue From'];

		$this->validate($request, [
        'branch_id' => 'required|max:255',
        'issue_to'=> 'required|billeater_than:issue_from'
    	],$messages);

		$input = $request->all();
		$input['company_id']       =  Auth::user()->company_id;
		$input['user_id']          =  Auth::user()->id;
		$input['account_year_id']  =  session('account');
		$issuebill = IssueBill::create($input);

		flash()->success('Issue Bill Created Successfully !');

		return redirect('issuebill');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$issuebill = $this->issuebill->find($id);
		$branch = $issuebill->branch;
		return view('issuebill.view',compact('issuebill','branch'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$issuebill = $this->issuebill->find($id);
		$counter = $issuebill->issue_from;
		$branch = $this->branch->orderBy('name', 'asc')->lists('name','id');
		return view('issuebill.edit',compact('issuebill','branch','counter'));
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

		$issuebill = $this->issuebill->find($id);
		$input = $request->all();
		$issuebill->update($input);

		flash()->success('Issue Bill Updated Successfully !');

		return redirect('issuebill');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$issuebill = $this->issuebill->find($id);
		$issuebill->delete();

		flash()->success('Issue Bill Deleted Successfully !');

		return redirect('issuebill');
	}
}
