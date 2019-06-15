<?php

namespace App\Traits;

use Carbon\Carbon;
use App\Models\Lot;
use Illuminate\Database\Eloquent\Collection;

trait Helper{

    private function percentAchieved($start_weight, $end_weight){
       
        $result = ($end_weight*100)/$start_weight;
        
        if($result > 100.0){
            return round($result - 100, 2);
        }
        
        return round($result, 2);
    }


    private function getProfile(Collection $collection){
        
        $cattles = $collection;
        $array = array();
        $lots = array();
        $max_lot =array();
        
        foreach($cattles as $cattle){
            $data = $cattle->feedlots->groupBy('lot_id');
            $lots = [];
            $start_weight = 0.0;
            
            array_push($max_lot, $cattle->feedlots->groupBy('lot_id')->count());
            
            foreach($data as $d){
                if($start_weight ==0.0){
                    $start_weight = $d->first()->weight;
                }
                
                $end_weight = $d->last()->weight;
                
                $start_date = Carbon::parse($d->first()->date);
                $end_date = Carbon::parse($d->last()->date);
                
                $lot_dates = (object)[
                   'lot' => Lot::find($d->first()->lot_id)->number,
                    'start_date' => $start_date->format('d-m-Y'),
                    'end_date' => $end_date->format('d-m-Y'),
                    'start_weight' => $start_weight,
                    'end_weight' => $end_weight,
                    'days' => $end_date->diffInDays($start_date),
                    'kg_achieved' => $end_weight - $start_weight,
                    'percent' => $this->percentAchieved($start_weight, $end_weight),
                ];
                
                array_push($lots, $lot_dates);
                $start_weight = $d->last()->weight;
                $lot_dates = [];
                
            }
            
            $cattle_lots = (object)[
                'cattle' => (object)[
                   'id' => $cattle->id,
                   'number' => $cattle->number,
                   'gender' => $cattle->gender,
                   'raza' => $cattle->race->name,
                   'current_weight' => $cattle->feedlots->last()->weight,
                   'start_weight' => $cattle->feedlots->first()->weight,
                   'start_date' =>  Carbon::parse($cattle->feedlots->first()->date),
                   'days' =>  Carbon::parse($cattle->feedlots->last()->date)->diffInDays($cattle->feedlots->first()->date),
                   'evol_kg' => $cattle->feedlots->last()->weight - $cattle->feedlots->first()->weight,
                   'percent_evol' => $this->percentAchieved($cattle->feedlots->first()->weight, $cattle->feedlots->last()->weight)
                   
                ],
                'lots' => array_reverse($lots)
            ];
            
            array_push($array, $cattle_lots);
        }
        
        return [$array, max($max_lot)];
    }
}