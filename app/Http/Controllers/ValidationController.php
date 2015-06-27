<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Response;
class ValidationController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function email(Request $request)
	{
		if($request->ajax()) {
		    $user = \App\User::where('email', $request->get('email'))->get();
		    if($user->count()) {
		        return Response::json(array('msg' => 'true'));
		    }
		    return Response::json(array('msg' => 'false'));

		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function alias(Request $request)
	{
		if($request->ajax()) {
		    $user = \App\Company::where('alias', $request->get('alias'))->get();
		    if($user->count()) {
		        return Response::json(array('msg' => 'true'));
		    }
		    return Response::json(array('msg' => 'false'));

		}
	}

}
