<?php

namespace App\Models;

use App\Models\Cattle;
use Illuminate\Database\Eloquent\Model;

class CattleLot extends Model
{
    public function cattle(){
        return $this->belongsTo(Cattle::class);
    }
}
