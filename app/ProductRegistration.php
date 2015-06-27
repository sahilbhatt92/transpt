<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductRegistration extends Model {

	protected $table = 'productregistration';

	protected $guarded = ['id'];

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
