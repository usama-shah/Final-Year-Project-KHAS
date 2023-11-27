<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'icon',
        'parent_id',
        'column_name',
        'suffix',
        'prefix',
    ];
    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

}
