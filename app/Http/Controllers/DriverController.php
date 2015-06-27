<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Driver;
use Auth;
class DriverController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $driver = "";

	public function __construct(Driver $driver)
	 {
	 	$this->driver = $driver->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'));
	 } 

	public function index()
	{
		$drivers = $this->driver->get();
		return view('driver.index',compact('drivers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('driver.create');
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
		'contact'=> 'numeric|min:10',
        'g_photo'=>'image|max:1024',
        'photo'=>'image|max:1024',
        'license_photo'=>'image|max:1024'
    	]);

		$input = $this->getAll($request,'store','');
		Driver::create($input);
		
		flash()->success('Driver Created Successfully !');

		return redirect('driver');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$driver = $this->driver->find($id);
		return view('driver.view',compact('driver'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$driver = $this->driver->find($id);
		return view('driver.edit',compact('driver'));
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
		'contact'=> 'numeric|min:10',
        'g_photo'=>'image|max:1024',
        'photo'=>'image|max:1024',
        'license_photo'=>'image|max:1024'
    	]);

		$driver = $this->driver->find($id);
		$input = $this->getAll($request,'update',$driver);
		$driver->update($input);
		
		flash()->success('Driver Updated Successfully !');

		return redirect('driver');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->driver->find($id)->truck()->update(['driver_id'=>'0']);
		$this->driver->find($id)->delete();

		flash()->success('Driver Deleted Successfully !');

		return redirect('driver');
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
		$input = ($method=='store')? $request->all() : $request->except('_method','_token');
		$input['branch_id']        =  Auth::user()->branch_id;
		$input['company_id']       =  Auth::user()->company_id;
		$input['user_id']          =  Auth::user()->id;
		$input['account_year_id']  =  session('account');
		$input['photo']    =  $this->hasPhoto('photo',$request,$method,$table);
		$input['license_photo']  =  $this->hasPhoto('license_photo',$request,$method,$table);
		$input['g_photo']   =  $this->hasPhoto('g_photo',$request,$method,$table);
		return $input;
	}


}
