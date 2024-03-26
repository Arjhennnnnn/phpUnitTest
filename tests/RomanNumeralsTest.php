<?php
use App\RomanNumerals;


class RomanNumeralsTest extends \PHPUnit\Framework\TestCase
{

    // /** 
    //  * @test
    //  * @dataProvider checks
    //  * 
    //  *  */
    function it_generates_roman_numerals($number , $numerals){

        $this->assertEquals($numerals,RomanNumerals::generate($number));

    }


    public function checks(){

        return [

            [1 , 'I'],

            [2 , 'II'],

            [3 , 'III'],

            [4 , 'IV'],

            [5 , 'V' ],

            [6 , 'VI' ],

            [7 , 'VII' ],

            [8 , 'VIII' ],

            [13 , 'XIII' ],

            [14 , 'XIV' ],

            [15 , 'XV'],

            [20 , 'XX'],

            [37 , 'XXXVII']

        ];

    }

    
}
