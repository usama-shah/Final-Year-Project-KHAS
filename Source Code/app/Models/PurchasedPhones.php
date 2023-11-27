<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasedPhones extends Model
{
    use HasFactory;
    protected $table = "purchased_phones";
    protected $id = "id";

    protected $fillable = [
        'user_id',
        'phone_id',
        'purchase_id',
        'status',

    ];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
    public function phone()
    {
        return $this->belongsTo(Phone::class,'phone_id');
    }
    public function purchaser(){
        return $this->belongsTo(User::class,'user_id');
    }
}
