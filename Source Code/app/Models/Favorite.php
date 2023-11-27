<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $id="id";
    protected $table="favorites";
    protected $fillable = [
        'user_id',
        'phone_id',
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
?>