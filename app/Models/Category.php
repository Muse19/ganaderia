<?php

namespace App\Models;

use App\Models\Cattle;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    public function cattles(){
        return $this->hasMany(Cattle::class);
    }
}
