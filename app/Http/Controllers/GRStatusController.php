<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\GRStatus;
use App\GR;
use Auth;
class GRStatusController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $grstatus = "";
	protected $gr = "";

	public function __construct(GRStatus $grstatus,GR $gr)
	 {
	 	$this->gr = $gr->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 	$this->grstatus = $grstatus->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 } 

	public function index()
	{
		$grstatuses = $this->grstatus->get();
		return view('grstatus.index',compact('grstatuses'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$gr = $this->gr->orderBy('gr_no', 'asc')->lists('gr_no','id');
		return view('grstatus.create',compact('gr'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
        'gr_id' => 'required|max:255'
    	]);
		
		$input = $request->all();
		$input['branch_id'] = Auth::user()->branch_id;
		$input['company_id'] = Auth::user()->company_id;
		$input['user_id'] = Auth::user()->id;
		$input['account_year_id'] = session('account');
		GRStatus::create($input);
		
		flash()->success('GRStatus Created Successfully !');

		return redirect('grstatus');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$grstatus = $this->grstatus->find($id);
		return view('grstatus.view',compact('grstatus'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$grstatus = $this->grstatus->find($id);
		$gr = $this->gr->orderBy('gr_no', 'asc')->lists('gr_no','id');
		return view('grstatus.edit',compact('grstatus','gr'));
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
        'gr_id' => 'required|max:255'
    	]);

		$grstatus = $this->grstatus->find($id);
		$grstatus->update($request->except('_method','_token'));
		
		flash()->success('GRStatus Updated Successfully !');

		return redirect('grstatus');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->grstatus->find($id)->delete();

		flash()->success('GRStatus Deleted Successfully !');

		return redirect('grstatus');
	}

}
