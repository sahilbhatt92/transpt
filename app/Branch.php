<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model {

	protected $table = 'branches';

	protected $guarded = ['id'];

	public function user()
	{
		return $this->hasMany('App\User');
	}

	public function party()
	{
		return $this->hasMany('App\Party');
	}

	public function invoice()
	{
		return $this->hasMany('App\Invoice');
	}

	public function godown()
	{
		return $this->hasMany('App\Godown');
	}

	public function product()
	{
		return $this->hasMany('App\Product');
	}

	public function brand()
	{
		return $this->hasMany('App\Brand');
	}

	public function productdetail()
	{
		return $this->hasMany('App\ProductDetail');
	}

	public function grstatus()
	{
		return $this->hasMany('App\GRStatus');
	}

	public function gr()
	{
		return $this->hasMany('App\GR');
	}

	public function freightprice()
	{
		return $this->hasMany('App\FreightPrice');
	}

	public function driver()
	{
		return $this->hasMany('App\Driver');
	}

	public function station()
	{
		return $this->belongsTo('App\Station');
	}

	public function district()
	{
		return $this->belongsTo('App\District');
	}

	public function productregistration()
	{
		return $this->hasMany('App\ProductRegistration');
	}

	public function generalhead()
	{
		return $this->hasMany('App\GeneralHead');
	}

	public function state()
	{
		return $this->belongsTo('App\State');
	}

	public function truck()
	{
		return $this->hasMany('App\Truck');
	}

	public function issuegr()
	{
		return $this->hasMany('App\IssueGR');
	}

	public function issuechallan()
	{
		return $this->hasMany('App\IssueChallan');
	}

	public function issuebill()
	{
		return $this->hasMany('App\IssueBill');
	}

	public function issueloadingslip()
	{
		return $this->hasMany('App\IssueLoadingSlip');
	}
	
	public function account()
	{
		return $this->hasMany('App\Account');
	}

	public function company()
	{
		return $this->belongsTo('App\Company');
	}

	public function accountyear()
	{
		return $this->belongsTo('App\AccountYear');
	}
}
