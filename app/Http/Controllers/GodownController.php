<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Godown;
use App\Branch;
use App\Party;
use Auth;
class GodownController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $godown = "";
	protected $branch = "";
	protected $party = "";

	public function __construct(Godown $godown,Branch $branch,Party $party)
	 {
	 	$this->branch = $branch->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 	$this->party = $party->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 	$this->godown = $godown->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 } 

	public function index()
	{
		$godowns = $this->godown->get();
		return view('godown.index',compact('godowns'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$party = $this->party->orderBy('name', 'asc')->lists('name','id');
		if(Auth::user()->hasRole('admin'))
			$branch = Branch::all()->lists('name','id');
		else
			$branch = $this->branch->orderBy('name', 'asc')->lists('name','id');
		return view('godown.create',compact('party','branch'));
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
		Godown::create($input);
		
		flash()->success('Godown Created Successfully !');

		return redirect('godown');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$godown = $this->godown->find($id);
		return view('godown.view',compact('godown'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$godown = $this->godown->find($id);
		$party = $this->party->orderBy('name', 'asc')->lists('name','id');
		$branch = $this->branch->orderBy('name', 'asc')->lists('name','id');
		return view('godown.edit',compact('godown','party','branch'));
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

		$godown = $this->godown->find($id);
		$godown->update($request->except('_method','_token'));
		
		flash()->success('Godown Updated Successfully !');

		return redirect('godown');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->godown->find($id)->delete();

		flash()->success('Godown Deleted Successfully !');

		return redirect('godown');
	}

}
