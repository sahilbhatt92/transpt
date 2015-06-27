<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Brand;
use Auth;
class BrandController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $brand = "";

	public function __construct(Brand $brand)
	 {
	 	$this->brand = $brand->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 } 

	public function index()
	{
		$brands = $this->brand->get();
		return view('brand.index',compact('brands'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('brand.create');
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
		Brand::create($input);
		
		flash()->success('Brand Created Successfully !');

		return redirect('brand');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$brand = $this->brand->find($id);
		return view('brand.view',compact('brand'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$brand = $this->brand->find($id);
		return view('brand.edit',compact('brand'));
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

		$brand = $this->brand->find($id);
		$brand->update($request->except('_method','_token'));
		
		flash()->success('Brand Updated Successfully !');

		return redirect('brand');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->brand->find($id)->delete();

		flash()->success('Brand Deleted Successfully !');

		return redirect('brand');
	}

}
