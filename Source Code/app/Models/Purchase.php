<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $table = "purchase";
    protected $id = "id";

    protected $fillable = [
        'user_id',
        'phone_id',
        'recivers_name',
        'recivers_email',
        'recivers_phone',
        'recivers_address',
        'recivers_city',
        'recivers_zip_code',
        'delivery_option',
        'stripe_transaction_id',
        'total_price',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(PurchasedPhones::class);
    }
}
