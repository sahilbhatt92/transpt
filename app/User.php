<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Hash;
class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword, EntrustUserTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['remember_token'];

	public function setPasswordAttribute($value)
	{
	    $this->attributes['password'] = Hash::make($value);
	}

	// public function getHasRoleAttribute()
	// {

	//     $this->attributes['user'];
	// }


	public function branch()
	{
		return $this->belongsTo('App\Branch');
	}

	public function company()
	{
		return $this->belongsTo('App\Company');
	}

	public function party()
	{
		return $this->hasMany('App\Party');
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

	public function invoice()
	{
		return $this->hasMany('App\Invoice');
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

	public function productregistration()
	{
		return $this->hasMany('App\ProductRegistration');
	}

	public function freightprice()
	{
		return $this->hasMany('App\FreightPrice');
	}

	public function driver()
	{
		return $this->hasMany('App\Driver');
	}

	public function state()
	{
		return $this->hasMany('App\State');
	}

	public function station()
	{
		return $this->hasMany('App\Station');
	}

	public function district()
	{
		return $this->hasMany('App\District');
	}

	public function truck()
	{
		return $this->hasMany('App\Truck');
	}

	public function issuegr()
	{
		return $this->hasMany('App\IssueGR');
	}

	public function issuevoucher()
	{
		return $this->hasMany('App\IssueVoucher');
	}

	public function issuechallan()
	{
		return $this->hasMany('App\IssueChallan');
	}

	public function issueloadingslip()
	{
		return $this->hasMany('App\IssueLoadingSlip');
	}
	
	public function issuebill()
	{
		return $this->hasMany('App\IssueBill');
	}

	public function account()
	{
		return $this->hasMany('App\Account');
	}

	public function generalhead()
	{
		return $this->hasMany('App\GeneralHead');
	}


}
