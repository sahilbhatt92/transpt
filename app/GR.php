<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class GR extends Model {

	protected $table = 'gr';

	protected $guarded = ['id'];

	public function branch()
	{
		return $this->belongsTo('App\Branch');
	}

	public function grstatus()
	{
		return $this->hasMany('App\GRStatus');
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
