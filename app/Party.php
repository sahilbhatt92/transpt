<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Party extends Model {

	protected $table = 'party';

	protected $guarded = ['id'];

	public function account()
	{
		return $this->hasOne('App\Account');
	}

	public function branch()
	{
		return $this->belongsTo('App\Branch');
	}

	public function godown()
	{
		return $this->hasMany('App\Godown');
	}

	public function freightprice()
	{
		return $this->hasMany('App\FreightPrice');
	}

	public function company()
	{
		return $this->belongsTo('App\Company');
	}

	public function generalhead()
	{
		return $this->belongsTo('App\GeneralHead');
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
