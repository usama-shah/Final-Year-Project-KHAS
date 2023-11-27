<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'transaction_type',
        'status',
        'message',
        'reason',
        'method',
        'transaction_id',
        'phone_id',
        'purchase_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function payMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'method');
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'method');
    }
}
