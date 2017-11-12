<?php

use Tac\repos\CoinRepo;

class CoinTest extends PHPUnit_Framework_TestCase
{
	private $coinRepo;

    protected function setUp()
    {
        $this->coinRepo = new CoinRepo();
    }
    
    protected function tearDown()
    {
        $this->coinRepo = NULL;
    }

    protected function assertEqualsArrays($expected, $actual) {
    	$this->assertTrue(count($expected) == count(array_intersect($expected, $actual)));
	}


	public function testAssertEqualArray()
	{
		$expected = array(1,2,3);
		$original = array(1,3,2);

		$this->assertEqualsArrays($expected, $original);
	}


	public function testGetCoinCombinations()
	{
		$array = array(1, 2);
		$sum = 3;

		$this->coinRepo->getAllCombinations(0, $array, $sum);

		$expected = $this->coinRepo->getTotals();
		$original = array(array(1, 2, 1, 1, 1));

		$this->assertEqualsArrays($expected, $original);
	}


}