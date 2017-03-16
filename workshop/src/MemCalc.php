<?php
class MemCalc
{

  private $memory;

  public function __construct($x = 0)
  {
    $this->memory = $x;
  }

  public function show(){
    echo $this->memory;
    return $this;
  }

  public function add($x)
  {
    $this->memory += $x;
    return $this;
  }

  public function divide($x){
    if ($x == 0) {
      throw new InvalidArgumentException();
    }
    $this->memory /= $x;
    return $this;
  }

/*
  public function subtract($x)
  {
    $this->memory -= $x;
    return $this;
  }

  public function multiply($x){
    $this->memory *= $x;
    return $this;
  }

  public function reset(){
    $this->memory = 0;
    return $this;
  }
*/
}
