<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phone extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $id = 'id';
    protected $table = "phones";
    protected $fillable = [
        'title',
        'user_id',
        'brand',
        'model',
        'price',
        'color',
        'storage_capacity',
        'ram',
        'original_packaging',
        'condition',
        'purchase_date',
        'purchase_proof',
        'warranty_status',
        'expiration_date',
        'operating_system',
        'battery_health',
        'accessories',
        'reason_for_selling',
        'front_screen_condition',
        'back_cover_condition',
        'frame_edges_condition',
        'buttons_condition',
        'ports_condition',
        'touchscreen_functionality',
        'screen_damage',
        'water_damage',
        'battery_issues',
        'camera_issues',
        'audio_issues',
        'connectivity_issues',
        'sensor_issues',
        'software_issues',
        'description',
        'main_image',
        'additional_images',
        'deleted_at',
        'imei',
        'pta_approved',
        'sim_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function get_brand()
    {
        return $this->belongsTo(Brands::class, 'brand');
    }
    public function getFormattedPriceAttribute()
    {
        return number_format($this->price, 0);
    }
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
    public function purchasedPhones()
    {
        return $this->hasMany(PurchasedPhones::class);
    }
    public function purchase()
    {
        return $this->hasMany(Purchase::class);
    }
    public function returns()
    {
        return $this->hasMany(Returns::class);
    }
    public function inspection()
    {
        return $this->hasOne(Inspection::class, 'phone_id');
    }

    public function returncompleted()
    {
        return $this->hasMany(ReturnCompleted::class)->latest();
    }

}
