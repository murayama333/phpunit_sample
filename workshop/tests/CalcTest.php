<?php

use PHPUnit\Framework\TestCase;

class CalcTest extends TestCase
{

  public function testAdd3_4_eq_7()
  {
    $calc = new Calc();
    $this->assertEquals(7, $calc->add(3, 4));
  }

  public function testAdd5_5_eq_10($value='')
  {
    $calc = new Calc();
    $this->assertEquals(10, $calc->add(5, 5));
  }

  /**
   * @dataProvider addProvider
   */
  public function testAdd($x, $y, $expected){
    $calc = new Calc();
    $this->assertEquals($expected, $calc->add($x, $y));
  }


  public function addProvider()
  {
    return [
      [1, 1, 2],
      [2, 2, 4],
      [3, 3, 6],
    ];
  }
}
