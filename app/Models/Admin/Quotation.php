<?php

namespace App\Models\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quotation extends Model
{
    use HasFactory;

    protected $table = "quotation";
    protected $fillable = [
        'number',
        'code',
        'method',
        'description',
        'is_paid',
        'is_approved',
        'is_open',
        'total_amount',
        'quotation_status_id',
        'customer_id',
        'company_id',
        'creator_id',
        'valid_date',
    ];
    //relations
    public function customer()
    {
        return $this->hasOne('App\Models\User','id','customer_id');
    }
    public function creator()
    {
        return $this->hasOne('App\Models\User','id','creator_id');
    }
    public function products()
    {
        return $this->hasMany('App\Models\Admin\Product','quotation_id','id');
    }
    //scope
    public function scopeFilter($query)
    {
        $companyId = Auth::user()->company_id ??'';
        return $query->where('company_id', $companyId);
    }
    public function scopeOpen($query)
    {
        return $query->where('is_open', 1);
    }
    public function scopeOwn($query)
    {
        $userId = Auth::user()->id ??'';
        return $query->where('creator_id', $userId );
    }
    //model function

    public static function quoteNumber()
    {
        $userId = Auth::user()->id ??'';

        $lastQuotationNumber = Self::filter()->own()->latest('created_at')->first()->number + 1;

        return $lastQuotationNumber;
    }
    public static function status($status)
    {
        $status = QuotationStatus::where('name',$status)->first()->id;

        if(!$status){
            $status = 10000;
        }   

        return $status;
    }

}
