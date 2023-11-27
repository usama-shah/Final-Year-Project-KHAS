<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    protected $table='roles_permision';
    use HasFactory;
    protected $fillable = [
        'role_id',
        'sub_modules_id',
        'module_id',
        'roles_id',
        'create',
        'update',
        'delete',
        'view'
    ];

    public function roles()
    {
        return $this->belongsTo(Roles::class);
    }
}
