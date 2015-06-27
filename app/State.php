<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model {

	protected $table = "state";

	protected $guarded = ['id'];


	public function station()
	{
		return $this->hasMany('App\Station');
	}

	public function district()
	{
		return $this->hasMany('App\District');
	}

	public function party()
	{
		return $this->hasMany('App\Party');
	}

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

    public function truck()
    {
        return $this->belongsToMany('App\Truck');
    }
}
