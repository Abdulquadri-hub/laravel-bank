<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    protected $fillable = [
        "transfer_uuid",
        "from_account_id",
        "to_account_id",
        "amount",
        "transfer_type",
        "status",
        "completed_at",
        "reference",
        "description",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function accountFrom()
    {
        return $this->belongsTo(Account::class);
    }

    public function accounTo()
    {
        return $this->belongsTo(Account::class);
    }
}
