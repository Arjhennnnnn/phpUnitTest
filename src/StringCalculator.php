<?php

namespace App;

class StringCalculator
{

    const MAX_NUMBER_ALLOWED = 1000;

    protected string $delimeters = ",|\n";


    public function add(string $numbers)
    {

        if(! $numbers){
            return 0;
        }

        $numbers = $this->parseString($numbers);
        
        $this->disallowNegative($numbers);

        $numbers = $this->ignoreGreaterThan1000($numbers);

        return array_sum($numbers);
        
        // convert string to array
        // return intval($numbers);
    }



    protected function disallowNegative(array $numbers) : void
    {
        foreach($numbers as $number){

            if($number < 0){

                throw new \Exception('Negative numbers are disallowed.');

            }

        }
    }


    protected function parseString(string $numbers)
    {
        $customDelimiter = '\/\/(.)\n';

        if(preg_match("/{$customDelimiter}/", $numbers,$matches)){
            // $matches[0] => //:\n

            $this->delimeters = $matches[1];

            $numbers = str_replace($matches[0],'',$numbers);
        }

        // $numbers = explode(",", $numbers); // [5,5]*

        // $numbers = preg_split("/[\/,\n]/", $numbers);
        return preg_split("/{$this->delimeters}/", $numbers);
    }



    /**
     * @param array $numbers
     * @return array
     */

    protected function ignoreGreaterThan1000(array $numbers)
    {
        // return array_filter($numbers, function ($number){

        //     return $number <= self::MAX_NUMBER_ALLOWED;
    
        // });

        return array_filter($numbers , fn($number) => $number <= self::MAX_NUMBER_ALLOWED);

    }
    
}
