<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kyc extends Model
{
    use HasFactory;


    const STATUS_APPROVED = 'Approved';
    const STATUS_PENDING = 'Pending';
    const STATUS_DECLINED = 'Declined';
    
    const REQUEST_TYPE_CUSTOMER = 'customer';

    protected $fillable = [
       'govt_id_url', 'nin', 'user_id', 'verification_type', 'request_type', 'status', 'remark'
    ];


    public function user() {
        return $this->belongsTo(User::class);
    }
}
