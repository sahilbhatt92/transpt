<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class FreightPrice extends Model {

	protected $table = 'freightprice';

	protected $guarded = ['id'];

	public function truck()
	{
		return $this->belongsTo('App\Truck');
	}

	public function party()
	{
		return $this->belongsTo('App\Party');
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
