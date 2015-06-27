<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\GeneralHead;
use Auth;
class GeneralHeadController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $generalhead = "";

	public function __construct(GeneralHead $generalhead)
	 {
	 	$this->generalhead = $generalhead->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 } 

	public function index()
	{
		$generalheads = $this->generalhead->get();
		return view('generalhead.index',compact('generalheads'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('generalhead.create');
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
		$input['branch_id'] = Auth::user()->branch_id;
		$input['company_id'] = Auth::user()->company_id;
		$input['user_id'] = Auth::user()->id;
		$input['account_year_id'] = session('account');
		GeneralHead::create($input);
		
		flash()->success('General Head Created Successfully !');

		return redirect('generalhead');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$generalhead = $this->generalhead->find($id);
		return view('generalhead.view',compact('generalhead'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$generalhead = $this->generalhead->find($id);
		return view('generalhead.edit',compact('generalhead'));
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

		$generalhead = $this->generalhead->find($id);
		$generalhead->update($request->except('_method','_token'));
		
		flash()->success('General Head Updated Successfully !');

		return redirect('generalhead');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->generalhead->find($id)->delete();

		flash()->success('General Head Deleted Successfully !');

		return redirect('generalhead');
	}

}
