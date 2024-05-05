<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_picture', // Add the profile_picture column here
        'phone',
        'wallet',
        'city',
        'state',
        'zip',
        'address',
        'braintree',
        'firstname',
        'lastname',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


public function creditCards()
    {
        return $this->hasMany(CreditCard::class);
    }

    public function wallets()
    {
        return $this->hasMany(Wallet::class, 'user_id');
    }

    public function fromWallets()
    {
        return $this->hasMany(Wallet::class, 'from_user_id');
    }

    public function Requestwallets()
    {
        return $this->hasMany(RequestWallet::class, 'from_user_id');
    }

    public function RequestfromWallets()
    {
        return $this->hasMany(RequestWallet::class, 'user_id');
    }
}
