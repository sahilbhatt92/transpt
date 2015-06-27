<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Truck extends Model {

	protected $table = 'truck';

	protected $guarded = ['id'];

	public function getDates()
    {
        return ['permit_due_date_yr','permit_due_date_fyr','purchase_date','road_tax_date','fitness_due_date'];
    }


    function getPermitDueDateYrAttribute()
    {
        return Carbon::parse($this->attributes['permit_due_date_yr'])->format('Y-m-d');
    }


    function getPermitDueDateFyrAttribute()
    {
        return Carbon::parse($this->attributes['permit_due_date_fyr'])->format('Y-m-d');
    }

    function getPurchaseDateAttribute()
    {
        return Carbon::parse($this->attributes['purchase_date'])->format('Y-m-d');
    }

    function getRoadTaxDateAttribute()
    {
        return Carbon::parse($this->attributes['road_tax_date'])->format('Y-m-d');
    }

    function getFitnessDueDateAttribute()
    {
        return Carbon::parse($this->attributes['fitness_due_date'])->format('Y-m-d');
    }

    public function driver()
    {
    	return $this->belongsTo('App\Driver');
    }

    public function branch()
    {
        return $this->belongsTo('App\Branch');
    }

    public function freightprice()
    {
        return $this->hasMany('App\FreightPrice');
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
        return $this->belongsToMany('App\State');
    }

    function getStateListAttribute()
    {
        return $this->state()->lists('id');
    }


}
