<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    public function scopeSearchByBrand($query, $brand)
    {
        return $query->where('brand', 'LIKE', "%$brand%");
    }
    
    public function scopeSearchByModel($query, $model)
    {
        return $query->where('model', 'LIKE', '%'. $model .'%');
    }
}
