<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Cattle;
use Illuminate\Database\Eloquent\Model;

class Feedlot extends Model
{

    protected $fillable = [
        'weight'
    ];

    public function cattle(){
        return $this->belongsTo(Cattle::class);
    }

    public function getDateAttribute($value){
        return Carbon::parse($value)->format('d-m-Y');
    }

   
}
