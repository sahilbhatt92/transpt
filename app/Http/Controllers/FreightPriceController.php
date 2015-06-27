<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\FreightPrice;
use App\Truck;
use App\Party;
use App\Station;
use Auth;
class FreightPriceController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $freightprice = "";
	protected $truck = "";
	protected $party = "";
	protected $station = "";

	public function __construct(FreightPrice $freightprice,Truck $truck,Party $party,Station $station)
	 {
	 	$this->truck = $truck->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 	$this->party = $party->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 	$this->station = $station->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 	$this->freightprice = $freightprice->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 } 

	public function index()
	{
		$freightprices = $this->freightprice->get();
		return view('freightprice.index',compact('freightprices'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$party = $this->party->orderBy('name', 'asc')->lists('name','id');
		$truck = $this->truck->orderBy('truck_no', 'asc')->lists('truck_no','id');
		$station = $this->station->orderBy('name', 'asc')->lists('name','id');
		return view('freightprice.create',compact('party','truck','station'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
        'party_id' => 'required|max:255',
        'truck_id' => 'required|max:255'
    	]);
		
		$input = $request->all();
		$input['branch_id'] = Auth::user()->branch_id;
		$input['company_id'] = Auth::user()->company_id;
		$input['user_id'] = Auth::user()->id;
		$input['account_year_id'] = session('account');
		FreightPrice::create($input);
		
		flash()->success('FreightPrice Created Successfully !');

		return redirect('freightprice');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$freightprice = $this->freightprice->find($id);
		return view('freightprice.view',compact('freightprice'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$freightprice = $this->freightprice->find($id);
		$party = $this->party->orderBy('name', 'asc')->lists('name','id');
		$truck = $this->truck->orderBy('truck_no', 'asc')->lists('truck_no','id');
		$station = $this->station->orderBy('name', 'asc')->lists('name','id');
		return view('freightprice.edit',compact('freightprice','party','truck','station'));
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
        'party_id' => 'required|max:255',
        'truck_id' => 'required|max:255'
    	]);

		$freightprice = $this->freightprice->find($id);
		$freightprice->update($request->except('_method','_token'));
		
		flash()->success('FreightPrice Updated Successfully !');

		return redirect('freightprice');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->freightprice->find($id)->delete();

		flash()->success('FreightPrice Deleted Successfully !');

		return redirect('freightprice');
	}

}
