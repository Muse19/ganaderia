<?php

namespace App\Http\Controllers;

use App\Models\Cattle;
use App\Traits\Helper;
use Illuminate\Http\Request;

class FeedlotController extends Controller
{
    use Helper;

    public function getAllProfile(){

        $cattle = Cattle::has('feedlots')->get();

        return $this->getProfile($cattle);
    }

    public function getSpecificProfile(Request $request){

        $cattle = Cattle::whereIn('number', $request->cattle)->get();

        return $this->getProfile($cattle);
    }

    public function getSimpleBalance(Request $request){

        $from = $this->minDate([1,2]);
        $to = $this->maxDate([1,2]);

        $cattle = Cattle::whereIn('id', [1,2])->get();

        return $this->getBalance($cattle, $from, $to);

    }

    public function getEvolutionBalance(Request $request){
        $from = $this->minDate([1,2]);
        $to = $this->maxDate([1,2]);

        $cattle = Cattle::whereIn('id', [1,2])->get();

        return $this->getEvolution($cattle, $from, $to);
    }

    
}
