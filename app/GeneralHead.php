<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralHead extends Model {

	protected $table = 'general_head';

	protected $guarded = ['id'];

	public function branch()
	{
		return $this->belongsTo('App\Branch');
	}

	public function party()
	{
		return $this->hasMany('App\Party');
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
