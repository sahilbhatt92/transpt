<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\ProductRegistration;
use Auth;
class ProductRegistrationController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $productregistration = "";

	public function __construct(ProductRegistration $productregistration)
	 {
	 	$this->productregistration = $productregistration->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 } 

	public function index()
	{
		$productregistrations = $this->productregistration->get();
		return view('productregistration.index',compact('productregistrations'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('productregistration.create');
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
    	]);
		
		$input = $request->all();
		$input['branch_id'] = Auth::user()->branch_id;
		$input['company_id'] = Auth::user()->company_id;
		$input['user_id'] = Auth::user()->id;
		$input['account_year_id'] = session('account');
		ProductRegistration::create($input);
		
		flash()->success('ProductRegistration Created Successfully !');

		return redirect('productregistration');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$productregistration = $this->productregistration->find($id);
		return view('productregistration.view',compact('productregistration'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$productregistration = $this->productregistration->find($id);
		return view('productregistration.edit',compact('productregistration'));
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
    	]);

		$productregistration = $this->productregistration->find($id);
		$productregistration->update($request->except('_method','_token'));
		
		flash()->success('ProductRegistration Updated Successfully !');

		return redirect('productregistration');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->productregistration->find($id)->delete();

		flash()->success('ProductRegistration Deleted Successfully !');

		return redirect('productregistration');
	}

}
