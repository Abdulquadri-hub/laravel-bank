<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        "transaction_uuid",
        "account_id",
        'deposit_id',
        'transfer_id',
        'external_transfer_id',
        "transaction_type",
        "amount",
        "balance_after",
        "description",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function transfer()
    {
        return $this->belongsTo(Transfer::class);
    }

    public function deposit()
    {
        return $this->belongsTo(Deposit::class);
    }

}
