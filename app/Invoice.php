<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model {

	protected $table = 'invoice';

	protected $guarded = ['id'];

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
