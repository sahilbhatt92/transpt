<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model {

	protected $table = 'product_detail';

	protected $guarded = ['id'];

	public function branch()
	{
		return $this->belongsTo('App\Branch');
	}

	public function brand()
	{
		return $this->belongsTo('App\Brand');
	}

	public function product()
	{
		return $this->belongsTo('App\Product');
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
