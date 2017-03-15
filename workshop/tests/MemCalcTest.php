<?php
use \PHPUnit\Framework\TestCase;

class MemCalcTest extends TestCase
{

  public function testAdd3Show3()
  {
    $calc = new MemCalc();
    $calc->add(3)->show();
    $this->expectOutputString("3");
  }

  public function test10Divide5Multiply3Show6()
  {
    $calc = new MemCalc(10);
    $calc->divide(5)->multiply(3)->show();
    $this->expectOutputString("6");
  }

  /**
   * @expectedException InvalidArgumentException
   */
  public function test10Divide0ThrowInvalidArgumentException()
  {
    $calc = new MemCalc(10);
    $calc->divide(0)->show();
  }

  public function testPrivateProperty()
  {
    $calc = new MemCalc();
    $calc->add(5);
    //$this->assertEquals(5, $calc->add(5)->memory);

    $prop = new ReflectionProperty(get_class($calc), 'memory');
    $prop->setAccessible(true);
    $this->assertEquals(5, $prop->getValue($calc));
  }

}
