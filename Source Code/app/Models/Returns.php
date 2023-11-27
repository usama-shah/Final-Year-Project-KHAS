<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Returns extends Model
{
    use HasFactory;
    protected $table = "returns";
    protected $id = "id";

    protected $fillable = [
        'user_id',
        'phone_id',
        'id',
        'status',
        'message',
        'replay',
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
