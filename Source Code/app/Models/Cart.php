<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $id = 'id';
    protected $table = 'cart';
    protected $fillable = [
        'user_id',
        'phone_id',
    ];

     /**
     * Get the user that owns the cart item.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the product associated with the cart item.
     */
    public function phones()
    {
        return $this->belongsTo(Phone::class,'phone_id');
    }
}
