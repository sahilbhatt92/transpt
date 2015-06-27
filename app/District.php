<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model {

	protected $table = "district";

	protected $guarded = ['id'];

	public function branch()
	{
		return $this->hasMany('App\Branch');
	}

	public function company()
	{
		return $this->belongsTo('App\Company');
	}

	public function accountyear()
	{
		return $this->belongsTo('App\AccountYear');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function state()
	{
		return $this->belongsTo('App\State');
	}

	public function station()
	{
		return $this->hasMany('App\Station');
	}

	public function party()
	{
		return $this->hasMany('App\Party');
	}
}
