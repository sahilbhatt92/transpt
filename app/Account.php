<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model {

	protected $table = 'account';

	protected $guarded = ['id'];

	public function party()
	{
		return $this->belongsTo('App\Party');
	}

	public function branch()
	{
		return $this->belongsTo('App\Branch');
	}

	public function company()
	{
		return $this->belongsTo('App\Company');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
