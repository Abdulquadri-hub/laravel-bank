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
        "transfer_id",
        "external_transfer_id",
        "transaction_type",
        "amount",
        "balance_after",
        "description",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
