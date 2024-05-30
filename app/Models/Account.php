<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        'account_uuid',
        "account_number",
        "transaction_pin",
        "bvn"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function tranfers()
    {
        return $this->hasMany(Transfer::class);
    }

    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }
}
