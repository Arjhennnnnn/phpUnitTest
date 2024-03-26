<?php

use App\PrimeFactors;

class PrimeFactorsTest extends \PHPUnit\Framework\TestCase
{
    // /** @test */

    function it_generates_prime_factors_for_1(){

        $factors = new PrimeFactors;

        $this->assertEquals([], $factors->generate(1));

    }

    // /** @test */

    function it_generates_prime_factors_for_2(){

        $factors = new PrimeFactors;

        $this->assertEquals([2], $factors->generate(2));

    }

    // /** @test */
    function it_generates_prime_factors_for_3(){

        $factors = new PrimeFactors;

        $this->assertEquals([2,0], $factors->generate(3));

    }

    // /** @test */
    function it_generates_prime_factors_for_4(){

        $factors = new PrimeFactors;

        $this->assertEquals([2,2], $factors->generate(4));

    }

    // /** @test */
    // function it_generates_prime_factors_for_2(){

    //     $factors = new PrimeFactors;

    //     $this->assertEquals([2], $factors->generate(2));

    // }

    // /** @test */
    // function it_generates_prime_factors_for_4(){

    //     $factors = new PrimeFactors;

    //     $this->assertEquals([2,2], $factors->generate(4));

    // }
}
