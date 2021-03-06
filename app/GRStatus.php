<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class GRStatus extends Model {

	protected $table = 'grstatus';

	protected $guarded = ['id'];

	public function getDates()
    {
        return ['date'];
    }

	public function branch()
	{
		return $this->belongsTo('App\Branch');
	}

	public function gr()
	{
		return $this->belongsTo('App\GR');
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
