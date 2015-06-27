<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model {

	protected $table = "station";

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

	public function district()
	{
		return $this->belongsTo('App\District');
	}

	public function state()
	{
		return $this->belongsTo('App\State');
	}
}
