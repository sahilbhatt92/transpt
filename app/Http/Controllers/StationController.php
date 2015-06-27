<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Station;
use App\State;
use App\District;
use Auth;
class StationController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $station = "";
	protected $district = "";
	protected $state = "";

	public function __construct(Station $station, State $state, District $district)
	 {
	 	$this->station = $station->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 	$this->district = $district->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 	$this->state = $state->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 } 

	public function index()
	{
		$stations = $this->station->get();
		return view('station.index',compact('stations'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$state = $this->state->orderBy('name', 'asc')->lists('name','id');
		return view('station.create',compact('state'));
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
		Station::create($input);
		
		flash()->success('Station Created Successfully !');

		return redirect('station');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$station = $this->station->find($id);
		return view('station.view',compact('station'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$station = $this->station->find($id);
		$state = $this->state->orderBy('name', 'asc')->lists('name','id');
		return view('station.edit',compact('station','state'));
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

		$station = $this->station->find($id);
		$station->update($request->except('_method','_token'));
		
		flash()->success('Station Updated Successfully !');

		return redirect('station');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->station->find($id)->delete();

		flash()->success('Station Deleted Successfully !');

		return redirect('station');
	}

}
