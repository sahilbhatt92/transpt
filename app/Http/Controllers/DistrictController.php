<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\District;
use App\State;
use Auth;
class DistrictController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $district = "";
	protected $state = "";

	public function __construct(District $district, State $state)
	 {
	 	$this->district = $district->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 	$this->state = $state->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 } 

	public function index()
	{
		$districts = $this->district->get();
		return view('district.index',compact('districts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$state = $this->state->orderBy('name', 'asc')->lists('name','id');
		return view('district.create',compact('state'));
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
		District::create($input);
		
		flash()->success('District Created Successfully !');

		return redirect('district');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$district = $this->district->find($id);
		return view('district.view',compact('district'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$district = $this->district->find($id);
		$state = $this->state->orderBy('name', 'asc')->lists('name','id');
		return view('district.edit',compact('district','state'));
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

		$district = $this->district->find($id);
		$district->update($request->except('_method','_token'));
		
		flash()->success('District Updated Successfully !');

		return redirect('district');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->district->find($id)->delete();

		flash()->success('District Deleted Successfully !');

		return redirect('district');
	}

}
