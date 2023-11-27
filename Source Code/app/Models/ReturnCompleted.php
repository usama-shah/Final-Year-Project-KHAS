<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnCompleted extends Model
{
    use HasFactory;
    protected $table = "return_completed";
    protected $id = "id";
    protected $fillable = [
        'user_id',
        'phone_id',
        'transaction_id',
        'status',
        'return_by',
        'payment',
        'reason',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function phone()
    {
        return $this->belongsTo(Phone::class);
    }
}
