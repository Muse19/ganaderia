<?php

namespace App\Models;

use App\Models\Lot;
use App\Models\Dose;
use App\Models\Race;
use App\Models\Feedlot;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Cattle extends Model
{
    protected $fillable = [
        'number',
        'category_id',
        'lot_id',
        'race_id',
        'gender',
        'weight'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function race(){
        return $this->belongsTo(Race::class);
    }

    public function lot(){
        return $this->belongsTo(Lot::class);
    }

    public function doses(){
        return $this->belongsToMany(Dose::class)->withPivot('date');
    }

    public function feedlots(){
        return $this->HasMany(Feedlot::class);
    }
}
