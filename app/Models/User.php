<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'gender',
        'home_address',
        'state',
        'office_address',
        'city',
        'nationality',
        'date_of_birth' ,
        'phone_num',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function fullname()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function EmailVerificationToken()
    {
        return $this->hasOne(EmailVerificationToken::class);
    }

    public function account()
    {
        return $this->hasOne(Account::class);
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
