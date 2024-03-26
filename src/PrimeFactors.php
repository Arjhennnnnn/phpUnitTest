<?php

namespace App;

class PrimeFactors
{

    public function generate($number)
    {

        if($number > 1){

            $factors = [];

            while($number % 2 == 0){
    
                $factors[] = 2;
    
                $number = $number / 2;

            }

            return $factors;
        }

        return [];



    }
}
