<?php

namespace App\Http\Controllers;

use App\Models\Cattle;
use App\Traits\Helper;
use Illuminate\Http\Request;

class FeedlotController extends Controller
{
    use Helper;

    public function getAllProfile(){

        $cattles = Cattle::has('feedlots')->get();

        return $this->getProfile($cattles);
    }

    public function getSpecificProfile(Request $request){

        $cattles = Cattle::whereIn('number', $request->cattles)->get();

        return $this->getProfile($cattles);
    }

    
}
