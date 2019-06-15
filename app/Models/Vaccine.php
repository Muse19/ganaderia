<?php

namespace App\Models;

use App\Models\Dose;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    protected $fillable = [
        'name',
    ];

    public function doses(){
        return $this->hasMany(Dose::class);
    }
}
