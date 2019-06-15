<?php

namespace App\Models;

use App\Models\Cattle;
use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    protected $fillable = [
        'number',
    ];

    public function cattles(){
        return $this->hasMany(Cattle::class);
    }
}
