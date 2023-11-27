<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    use HasFactory;
    protected $table = "inspection";
    protected $id = "id";

    protected $fillable = [
        'phone_id',
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
        'images',
        'deleted_at',
        'imei',
        'pta_approved',
        'sim_status',
        'inspected_by',
        'message',
        'status',
        'description',
    ];

    public function phone()
    {
        return $this->hasOne(Phone::class,'id');

    }
    public function admin()
    {
        return $this->belongsTo(Admin::class,'inspected_by');

    }

}
