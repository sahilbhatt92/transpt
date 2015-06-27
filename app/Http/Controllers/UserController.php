<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use App\Branch;
use App\Role;
use App\Permission;
use Hash;
use Auth;
class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $user = "";
	protected $branch = "";
	protected $role = "";

	public function __construct(User $user,Branch $branch,Role $role)
	 {
	 	$this->user = $user;
	 	$this->branch = $branch;
	 	$this->role = $role;
	 } 

	public function index()
	{
		$users = $this->user->where('active',0)->where('company_id',Auth::user()->company_id)->get();
		return view('user.index',compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$branch = $this->branch->where('id','!=',1)->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'))->orderBy('name', 'asc')->lists('name','id');
		$user = $this->user;
		return view('user.create',compact('branch','user'));
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
		'email'=> 'required|max:255|email|unique:users',
		'password'=> 'required|min:6'
    	]);

		$user = new User;
		$user->name = $request->get('name');
		$user->email = $request->get('email');
		$user->password = $request->get('password');
		$user->ip = $request->get('ip');
		$user->branch_id = intval($request->get('branch_id'));
		$user->company_id = Auth::user()->company_id;
		$user->active = 0;
		$user->save();

		$user->roles()->sync($request->get('role'));	

		flash()->success('User Created Successfully !');

		return redirect('user');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = $this->user->find($id);
		// dd($user->hasRole('transaction'));
		return view('user.view',compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = $this->user->find($id);
		$branch = $this->branch->where('id','!=',1)->where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'))->orderBy('name', 'asc')->lists('name','id');
		$perms = Permission::orderBy('name', 'asc')->lists('display_name','id');
		return view('user.edit',compact('user','branch','perms'));
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
		'email'=> 'required|max:255|email',
    	]);

		$user = $this->user->find($id);
		$user->name = $request->get('name');
		$user->email = $request->get('email');
		$user->ip = $request->get('ip');
		$user->branch_id = intval($request->get('branch_id'));
		$user->update();

		$user->roles()->sync($request->get('role'));
		
		flash()->success('User Updated Successfully !');

		return redirect('user');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->user->find($id)->delete();

		flash()->success('User Deleted Successfully !');

		return redirect('user');
	}

}
