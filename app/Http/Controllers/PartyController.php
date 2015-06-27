<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Party;
use App\District;
use App\State;
use App\Account;
use App\GeneralHead;
use Auth;

class PartyController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $party = "";
	protected $account = "";
	protected $generalhead = "";

	public function __construct(Party $party,Account $account, State $state, District $district, GeneralHead $generalhead)
	 {
	 	$this->party = $party->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 	$this->account = $account->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 	$this->district = $district->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 	$this->state = $state->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 	$this->generalhead = $generalhead->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 } 

	public function index()
	{
		$parties = $this->party->get();
		return view('party.index',compact('parties'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$state = $this->state->orderBy('name', 'asc')->lists('name','id');
		$generalhead = $this->generalhead->orderBy('name', 'asc')->lists('name','id');
		return view('party.create',compact('state','generalhead'));
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
		$input['branch_id'] = Auth::user()->branch_id;
		$input['company_id'] = Auth::user()->company_id;
		$input['user_id'] = Auth::user()->id;
		$input['account_year_id'] = session('account');
		$party = Party::create($input);

		// if($request->get('addToAcc') == 1)
		// {
		// 	Account::create(
		// 		// $request->only('group_name','cr_amt','dr_amt')
		// 		[
		// 			'group_name'=>$request->get('group_name'),
		// 			'cr_amt'=>$request->get('cr_amt'),
		// 			'dr_amt'=>$request->get('dr_amt'),
		// 			'account_name'=>$request->get('name'),
		// 			'party_id'=>$party->id,
		// 			'user_id' => Auth::user()->id,
		// 			'branch_id' => Auth::user()->branch_id,
		// 			'company_id' => Auth::user()->company_id,
		// 			'account_year_id' => session('account'),
		// 		]
		// 	);
		// }	

		
		flash()->success('Party Created Successfully !');

		return redirect('party');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$party = $this->party->find($id);
		$account = $party->account;
		return view('party.view',compact('party','account'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$party = $this->party->find($id);
		$account = $party->account;
		$state = $this->state->orderBy('name', 'asc')->lists('name','id');
		$generalhead = $this->generalhead->orderBy('name', 'asc')->lists('name','id');
		return view('party.edit',compact('party','account','state','generalhead'));
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

		$party = $this->party->find($id);
		$party->update($request->except('_method','_token'));
		$party->update($request->only('addToAcc'));


		// if($request->get('addToAcc') == 1){
		// 	if($party->account()->exists())
		// 		$party->account()->update($request->only('group_name','cr_amt','dr_amt'));
		// 	else
		// 		$party->account()->create($request->only('group_name','cr_amt','dr_amt'));
		// }
		// else{
		// 	$party->account()->delete();
		// }

		flash()->success('Party Updated Successfully !');

		return redirect('party');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$party = $this->party->find($id);
		$party->issuegr()->update(['party_id'=>'0']);
		$party->account()->delete();
		$party->delete();


		flash()->success('Party Deleted Successfully !');

		return redirect('party');
	}

}
