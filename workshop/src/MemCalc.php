<?php
class MemCalc
{
  private $memory = 0;


  public function __construct($x = 0)
  {
    $this->memory = $x;
  }

  public function add($x)
  {
    $this->memory += $x;
    return $this;
  }

  public function subtract($x)
  {
    $this->memory -= $x;
    return $this;
  }

  public function multiply($x){
    $this->memory *= $x;
    return $this;
  }

  public function divide($x){
    if ($x == 0) {
      throw new InvalidArgumentException();
    }
    $this->memory /= $x;
    return $this;
  }

  public function reset(){
    $this->memory = 0;
    return $this;
  }


  public function show(){
    echo $this->memory;
    return $this;
  }
}