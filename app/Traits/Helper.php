<?php

namespace App\Traits;

use Carbon\Carbon;
use App\Models\Lot;
use App\Models\Feedlot;
use Illuminate\Database\Eloquent\Collection;

trait Helper{

    private function percentAchieved($start_weight, $end_weight){
       
        $result = ($end_weight/$start_weight)*100;
        
            return round($result - 100, 2);
       
    }

    private function minDate($cattle){

        return Carbon::parse(Feedlot::whereIn('cattle_id', $cattle)->min('date'));
    }

    private function maxDate($cattle){

        return Carbon::parse(Feedlot::whereIn('cattle_id', $cattle)->max('date'));
    }

    private function getRangeDate($from, $to){

        return Feedlot::whereBetween('date', [$from, $to])->get()
                         ->pluck('date')
                         ->unique();
    }

    private function getColor($start_weight, $end_weight, $type, $osc){
        
        if($type==0){
            $result = $end_weight - $start_weight;
        }else{
            $result = $this->percentAchieved($start_weight, $end_weight);
        }

        if ($result > $osc){
            return '#008000';
        }elseif ($result >= 0 && $result <= $osc ) {
            return '#FFFF00';
        }
        return '#ff9900';
    }

    private function getIncrement($cattle, $final_weight, $term){

        $result = ($final_weight - $cattle->feedlots()->first()->weight)/$term;
        return round($result,2);
    }

    private function getKg($start_date, $end_date, $increment){

        $days = Carbon::parse($end_date)->diffInDays($start_date);

        return round($days * $increment, 2);
    }


    private function getProfile(Collection $collection){
        
        $cattles = $collection;
        $array = array();
        $lots = array();
        $max_lot =array();
        
        foreach($cattles as $cattle){
            //$data = $cattle->feedlots->groupBy('lot_id');
            $data = $cattle->lot_log;
            $lots = [];
            $start_weight = 0.0;
            
            array_push($max_lot, $cattle->feedlots->groupBy('lot_id')->count());
            
            foreach($data as $d){
                
                $from = Carbon::parse($d->start_date);
                $to = isset($d->end_date) ? $d->end_date : Carbon::now();

                $feedlot = $cattle->feedlots()->whereBetween('date', [$from, $to])->get();
                
                if($start_weight ==0.0){
                    $start_weight = $feedlot->first()->weight;
                }
                
                $end_weight = $feedlot->last()->weight;
                
                $start_date = Carbon::parse($d->start_date);
                $end_date = Carbon::parse($d->end_date);
                
                $lot_dates = (object)[
                   'lot' => Lot::find($d->lot_id)->number,
                    'start_date' => $start_date->format('d-m-Y'),
                    'end_date' => $end_date->format('d-m-Y'),
                    'start_weight' => $start_weight,
                    'end_weight' => $end_weight,
                    'days' => $end_date->diffInDays($start_date),
                    'kg_achieved' => $end_weight - $start_weight,
                    'percent' => $this->percentAchieved($start_weight, $end_weight),
                ];
                
                array_push($lots, $lot_dates);
                $start_weight = $feedlot->last()->weight;
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
                   'days' =>  Carbon::parse($cattle->lot_log->last()->end_date)->diffInDays($cattle->lot_log->first()->start_date),
                   'evol_kg' => $cattle->feedlots->last()->weight - $cattle->feedlots->first()->weight,
                   'percent_evol' => $this->percentAchieved($cattle->feedlots->first()->weight, $cattle->feedlots->last()->weight)
                   
                ],
                'lots' => array_reverse($lots)
            ];
            
            array_push($array, $cattle_lots);
        }
        
        return [$array, max($max_lot)];
    }

    private function getBalance(Collection $collection, $from, $to){

        $rangeDate = $this->getRangeDate($from, $to);

        $array = [];
        $totalWeights = [];
    
        foreach($collection as $cattle){

            $weights = [];

            foreach($rangeDate as $i => $date){
               
                $data = $cattle->feedlots()->where('date', $date)->first();

                    $weight = (object)[
                        'weight' => isset($data->weight) ? $data->weight : null,
                    ];
                 
                    if(!isset($totalWeights[$i])){
                        $totalWeights[$i] = 0;
                    }
                    $totalWeights[$i] +=  isset($data->weight) ? (int)$data->weight : 0;
                
                    array_push($weights, $weight);
            }
          
            $cattle_dates = (object)[
                'cattle' => (object)[
                    'id' => $cattle->id,
                    'number' => $cattle->number,
                    'lot' => $cattle->lot->number,
                    'gender' => $cattle->gender,
                    'age' => $cattle->birth_date,
                    'category' => $cattle->category->name,
                    'race' => $cattle->race->name
                ],
                'weights' => array_reverse($weights)    
            ];

            array_push($array, $cattle_dates);
        }

        return [$array, array_reverse($rangeDate->toArray()), array_reverse($totalWeights)];

    }

    private function getEvolution(Collection $collection, $from, $to, $osc=0.0 , $type=0 ){

        $rangeDate = $this->getRangeDate($from, $to);

        $array = [];
        $totalWeights = [];
    
        foreach($collection as $cattle){

            $weights = [];
            $start_weight = 0.0;

            foreach($rangeDate as $i => $date){
               
                $data = $cattle->feedlots()->where('date', $date)->first();

                    if($start_weight == 0.0 || !isset($data->weight)){
                        $weight = (object)[
                            'weight' => isset($data->weight) ? $data->weight : null,
                        ];
                    }else{
     
                        $weight = (object)[
                            'weight' =>  $data->weight,
                            'kg_achieved' => $data->weight - $start_weight,
                            'percent' => $this->percentAchieved($start_weight, $data->weight),
                            'color' => $this->getColor($start_weight, $data->weight, $type, $osc),
                        ]; 
                        
                    }
                   
                    $start_weight = isset($data->weight) ? $data->weight : $start_weight;
                 
                    if(!isset($totalWeights[$i])){
                        $totalWeights[$i] = 0;
                    }
                    $totalWeights[$i] +=  isset($data->weight) ? (int)$data->weight : 0;
                
                    array_push($weights, $weight);
            }
          
            $cattle_dates = (object)[
                'cattle' => (object)[
                    'id' => $cattle->id,
                    'number' => $cattle->number,
                    'lot' => $cattle->lot->number,
                    'gender' => $cattle->gender,
                    'age' => $cattle->birth_date,
                    'category' => $cattle->category->name,
                    'race' => $cattle->race->name
                ],
                'weights' => array_reverse($weights)    
            ];

            array_push($array, $cattle_dates);
        }

        return [$array, array_reverse($rangeDate->toArray()), array_reverse($totalWeights)];
    }

    private function getAchievement(Collection $collection, $from, $to, $term, $final_weight, $osc){

        $rangeDate = $this->getRangeDate($from, $to);

        $array = [];
    
        foreach($collection as $cattle){

            $weights = [];
            $start_weight = 0.0;
            $start_date = '';
            $increment = $this->getIncrement($cattle, $final_weight, $term);

            foreach($rangeDate as $i => $date){
               
                $data = $cattle->feedlots()->where('date', $date)->first();

                    if($start_weight == 0.0 || !isset($data->weight)){
                        $weight = (object)[
                            'weight' => isset($data->weight) ? $data->weight : null,
                        ];
                    }else{
                        
                        $kg = $this->getKg($start_date, $data->date, $increment);
                        $expected_weight = $start_weight + $kg;
                        $weight = (object)[
                            'current_weight' =>  $data->weight,
                            'kg' => $kg,
                            'expected_weight' => $expected_weight,
                            'days' => Carbon::parse($data->date)->diffInDays(Carbon::parse($start_date)),
                            'color' => $this->getColor($expected_weight, $data->weight, 0, $osc),
                        ]; 
                        
                    }
                   
                    $start_weight = isset($data->weight) ? $data->weight : $start_weight;
                    $start_date = isset($data->weight) ? $data->date : $start_date;
                 
                
                    array_push($weights, $weight);
            }
            
            $days =  Carbon::parse($cattle->feedlots->last()->date)->diffInDays($cattle->feedlots->first()->date);
            $kg = $cattle->feedlots->last()->weight - $cattle->feedlots->first()->weight;
            $cattle_dates = (object)[
                'cattle' => (object)[
                    'id' => $cattle->id,
                    'number' => $cattle->number,
                    'lot' => $cattle->lot->number,
                    'category' => $cattle->category->name,
                    'days' => $days,
                    'kg_achieved' =>$kg,
                    'term' => $term - $days,
                    'expected_kg' => round($days * $increment, 2),
                ],
                'weights' => array_reverse($weights)    
            ];

            array_push($array, $cattle_dates);
        }

        return [$array, array_reverse($rangeDate->toArray())];
    }



}
