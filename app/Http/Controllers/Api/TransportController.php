<?php namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Response;
use \App\State as State;
use Auth;
class TransportController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function state(Request $request)
	{
		if($request->ajax()) {
		    $state = State::where('company_id',Auth::user()->company_id)->where('account_year_id',session('account'))->find($request->get('state'))->district()->orderBy('name')->lists('name','id');
		    return $state;
		}
	}

}
