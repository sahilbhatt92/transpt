<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Driver extends Model {

	protected $table = 'driver';

	protected $guarded = ['id'];

	public function getDates()
    {
        return ['license_date'];
    }


    function getLicenseDateAttribute()
    {
        return Carbon::parse($this->attributes['license_date'])->format('Y-m-d');
    }

    public function truck()
    {
    	return $this->hasMany('App\Truck');
    }

	public function branch()
	{
		return $this->belongsTo('App\Branch');
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
}
