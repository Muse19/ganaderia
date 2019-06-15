<?php

namespace App\Models;

use App\Models\Cattle;
use App\Models\Vaccine;
use Illuminate\Database\Eloquent\Model;

class Dose extends Model
{
    protected $fillable = [
        'name'
    ];

    public function vaccine(){
        return $this->belongsTo(Vaccine::class);
    }

    public function cattles(){
        return $this->belongsToMany(Cattle::class)->withPivot('date');
    }
}
