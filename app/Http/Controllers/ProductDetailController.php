<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\ProductDetail;
use App\Product;
use App\Brand;
use Auth;
class ProductDetailController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $productdetail = "";
	protected $product = "";
	protected $brand = "";

	public function __construct(ProductDetail $productdetail,Product $product,Brand $brand)
	 {
	 	$this->product = $product->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 	$this->brand = $brand->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 	$this->productdetail = $productdetail->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 } 

	public function index()
	{
		$productdetails = $this->productdetail->get();
		return view('productdetail.index',compact('productdetails'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$brand = $this->brand->orderBy('name', 'asc')->lists('name','id');
		$product = $this->product->orderBy('name', 'asc')->lists('name','id');
		return view('productdetail.create',compact('brand','product'));
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
		ProductDetail::create($input);
		
		flash()->success('ProductDetail Created Successfully !');

		return redirect('productdetail');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$productdetail = $this->productdetail->find($id);
		return view('productdetail.view',compact('productdetail'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$productdetail = $this->productdetail->find($id);
		$brand = $this->brand->orderBy('name', 'asc')->lists('name','id');
		$product = $this->product->orderBy('name', 'asc')->lists('name','id');
		return view('productdetail.edit',compact('productdetail','brand','product'));
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

		$productdetail = $this->productdetail->find($id);
		$productdetail->update($request->except('_method','_token'));
		
		flash()->success('ProductDetail Updated Successfully !');

		return redirect('productdetail');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->productdetail->find($id)->delete();

		flash()->success('ProductDetail Deleted Successfully !');

		return redirect('productdetail');
	}

}
