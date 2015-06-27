<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class GrFields extends Model {

	protected $table = 'gr_fields';

	protected $guarded = ['id'];

	public function company()
	{
		return $this->belongsTo('App\Company');
	}
}
