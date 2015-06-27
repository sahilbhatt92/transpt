<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use Auth;
class ProductController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $product = "";

	public function __construct(Product $product)
	 {
	 	$this->product = $product->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 } 

	public function index()
	{
		$products = $this->product->get();
		return view('product.index',compact('products'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('product.create');
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
		Product::create($input);
		
		flash()->success('Product Created Successfully !');

		return redirect('product');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$product = $this->product->find($id);
		return view('product.view',compact('product'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$product = $this->product->find($id);
		return view('product.edit',compact('product'));
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

		$product = $this->product->find($id);
		$product->update($request->except('_method','_token'));
		
		flash()->success('Product Updated Successfully !');

		return redirect('product');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->product->find($id)->delete();

		flash()->success('Product Deleted Successfully !');

		return redirect('product');
	}

}
