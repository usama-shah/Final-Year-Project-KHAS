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
        'first_name',
        'last_name',
        'address',
        'city',
        'zip_code',
        'phone',
        'email',
        'verification_code',
        'email_verified_at',
        'password',
        'email_sent_timestamp',
        'email_verification_token',
        'photo',
        'banned',
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
    ];

    public function phones()
    {
        return $this->hasMany(Phone::class)->latest();
    }

    public function sales()
    {
        return $this->hasMany(Phone::class)->where('status', 'Sold')->latest();
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class)->latest();
    }

    public function cartItems()
    {
        return $this->hasMany(Cart::class)->latest();
    }

    public function purchase()
    {
        return $this->hasMany(Purchase::class)->latest();
    }
    public function purchasedPhones()
    {
        return $this->hasMany(PurchasedPhones::class, 'user_id')->latest();
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class)->latest();
    }
    public function payMethod()
    {
        return $this->hasMany(PaymentMethod::class)->latest();
    }
    public function returns()
    {
        return $this->hasMany(Returns::class)->latest();
    }
    public function returncompleted()
    {
        return $this->hasMany(ReturnCompleted::class)->latest();
    }

}
