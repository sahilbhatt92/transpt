<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Truck;
use App\Driver;
use App\State;
use File;
use Auth;

class TruckController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $truck = "";
	protected $driver = "";
	protected $state = "";

	public function __construct(Truck $truck,Driver $driver, State $state)
	 {
	 	$this->truck = $truck->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 	$this->driver = $driver->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 	$this->state = $state->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 } 

	public function index()
	{
		$trucks = $this->truck->get();
		$driver = $this->driver->get();
		return view('truck.index',compact('trucks','driver'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$state = $this->state->orderBy('name', 'asc')->lists('name','id');
		$driver = $this->driver->orderBy('name', 'asc')->lists('name','id');
		return view('truck.create',compact('driver','state'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
        'truck_no' => 'required|max:255',
        'state_list'=>'required',
        'rc_copy_photo'=>'image|max:1024',
        'insurance_photo'=>'image|max:1024',
        'road_tax_photo'=>'image|max:1024',
        'fitness_photo'=>'image|max:1024',
        'permit_fyr_photo'=>'image|max:1024',
        'permit_photo'=>'image|max:1024'
    	]);

		// dd($request->get('state_list'));
		$input = $this->getAll($request,'store','');
		$truck = Truck::create($input);
		$truck->state()->sync($request->get('state_list'));
		flash()->success('Truck Created Successfully !');

		return redirect('truck');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$truck = $this->truck->find($id);
		$driver = $truck->driver;
		return view('truck.view',compact('truck','driver'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$truck = $this->truck->find($id);
		$driver = $this->driver->orderBy('name', 'asc')->lists('name','id');
		$state = $this->state->orderBy('name', 'asc')->lists('name','id');
		return view('truck.edit',compact('truck','driver','state'));
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
        'truck_no' => 'required|max:255',
        'state_list'=>'required',
        'rc_copy_photo'=>'image|max:1024',
        'insurance_photo'=>'image|max:1024',
        'road_tax_photo'=>'image|max:1024',
        'fitness_photo'=>'image|max:1024',
        'permit_fyr_photo'=>'image|max:1024',
        'permit_photo'=>'image|max:1024'
    	]);

		$truck = $this->truck->find($id);
		$input = $this->getAll($request,'update',$truck);
		$truck->state()->sync($request->get('state_list'));
		$truck->update($input);

		flash()->success('Truck Updated Successfully !');

		return redirect('truck');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$truck = $this->truck->find($id);
		$path = public_path().'/uploads/';
		File::delete(
				[
					$path.$truck->rc_copy_photo,
					$path.$truck->insurance_photo,
					$path.$truck->road_tax_photo,
					$path.$truck->fitness_photo,
					$path.$truck->permit_photo,
					$path.$truck->permit_fyr_photo
				]
			);
		$truck->delete();

		flash()->success('Truck Deleted Successfully !');

		return redirect('truck');
	}

	public function hasPhoto($value,$request,$method,$table = '')
	{
		$name = ($method=='store')? '' : $table->$value;
		if($request->hasFile($value)){
			$name = time().'-'.$request->file($value)->getClientOriginalName();
			$request->file($value)->move(base_path() . '/public/uploads/', $name);
		}
		return $name;
	}

	public function getAll($request,$method,$table)
	{
		$input = ($method=='store')? $request->except('state_list') : $request->except('state_list','_method','_token');
		$input['branch_id']        =  Auth::user()->branch_id;
		$input['company_id']       =  Auth::user()->company_id;
		$input['user_id']          =  Auth::user()->id;
		$input['account_year_id']  =  session('account');
		$input['rc_copy_photo']    =  $this->hasPhoto('rc_copy_photo',$request,$method,$table);
		$input['insurance_photo']  =  $this->hasPhoto('insurance_photo',$request,$method,$table);
		$input['road_tax_photo']   =  $this->hasPhoto('road_tax_photo',$request,$method,$table);
		$input['fitness_photo']    =  $this->hasPhoto('fitness_photo',$request,$method,$table);
		$input['permit_photo']     =  $this->hasPhoto('permit_photo',$request,$method,$table);
		$input['permit_fyr_photo'] =  $this->hasPhoto('permit_fyr_photo',$request,$method,$table);
		return $input;
	}
}
