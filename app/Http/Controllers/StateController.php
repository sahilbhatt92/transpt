<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\State;
use Auth;
class StateController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $state = "";

	public function __construct(State $state)
	 {
	 	$this->state = $state->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 } 

	public function index()
	{
		$states = $this->state->get();
		return view('state.index',compact('states'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('state.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
        'name' => 'required|max:255'
    	]);
		
		$input = $request->all();
		$input['company_id'] = Auth::user()->company_id;
		$input['user_id'] = Auth::user()->id;
		$input['account_year_id'] = session('account');
		State::create($input);
		
		flash()->success('State Created Successfully !');

		return redirect('state');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$state = $this->state->find($id);
		return view('state.view',compact('state'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$state = $this->state->find($id);
		return view('state.edit',compact('state'));
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
        'name' => 'required|max:255'
    	]);

		$state = $this->state->find($id);
		$state->update($request->except('_method','_token'));
		
		flash()->success('State Updated Successfully !');

		return redirect('state');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->state->find($id)->delete();

		flash()->success('State Deleted Successfully !');

		return redirect('state');
	}

}
