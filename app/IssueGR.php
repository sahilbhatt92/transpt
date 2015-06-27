<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class IssueGR extends Model {

	protected $table = "issue_gr";

	protected $guarded = ['id'];

	public function getDates()
    {
        return ['issue_date'];
    }


    public function getIssueDateAttribute()
    {
        return Carbon::parse($this->attributes['issue_date'])->format('Y-m-d');
    }

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
