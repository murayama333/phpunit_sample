# Case3: MemCalc

## 準備

ここでは以下の2つのプログラムを作成します。

+ MemCalc.php
+ MemCalcTest.php

### MemCalc.php

srcフォルダに"メモリー機能付き計算機"クラスを作ります。

```php
<?php
class MemCalc
{

  private $memory;

  public function __construct($x = 0)
  {
    $this->memory = $x;
  }
}
```

### MemCalcTest.php

testsフォルダに"メモリー機能付き計算機"テストクラスを作ります。

```php
<?php
use \PHPUnit\Framework\TestCase;

class MemCalcTest extends TestCase
{

}
```

---

## Part1 showメソッドの実装

テストファーストでプログラムを作成してみます。

### MemCalcTest.php

MemCalcクラスのshowメソッドを$memoryの内容を出力するものとして、テストプログラムを作成します。

```php
<?php
use \PHPUnit\Framework\TestCase;

class MemCalcTest extends TestCase
{

  public function testShow0()
  {
    $calc = new MemCalc();
    $calc->show();
    $this->expectOutputString("0");
  }
}
```

> expectOutputStringメソッドはechoなどの標準出力への出力を検証します。

### MemCalc.php

showメソッドを実装してください。

```php
<?php
class MemCalc
{

  private $memory;

  public function __construct($x = 0)
  {
    $this->memory = $x;
  }

  // show

}
```

次のようにテストプログラムを実行できればOKです。

```
> php phpunit-6.0.8.phar --bootstrap src/MemCalc.php tests/MemCalcTest
PHPUnit 6.0.8 by Sebastian Bergmann and contributors.

.                                                                   1 / 1 (100%)

Time: 64 ms, Memory: 8.00MB

OK (1 test, 1 assertion)
```


---

## Part2 addメソッドの実装

### MemCalcTest.php

MemCalcクラスのaddメソッドを、$memoryに値を加算するものとして、テストプログラムを作成します。

```php
<?php
use \PHPUnit\Framework\TestCase;

class MemCalcTest extends TestCase
{

  public function testShow0()
  {
    $calc = new MemCalc();
    $calc->show();
    $this->expectOutputString("0");
  }

  public function testAdd3Show3()
  {
    $calc = new MemCalc();
    $calc->add(3)->show();
    $this->expectOutputString("3");
  }

}
```

### MemCalc.php

addメソッドを実装してください。

```php
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

  // add

}
```

次のようにテストプログラムを実行できればOKです。

```
> php phpunit-6.0.8.phar --bootstrap src/MemCalc.php tests/MemCalcTest
PHPUnit 6.0.8 by Sebastian Bergmann and contributors.

..                                                                  2 / 2 (100%)

Time: 58 ms, Memory: 8.00MB

OK (2 tests, 2 assertions)
```

---

## Part3 divideメソッドの実装

MemCalcクラスのdivideメソッドを、$memoryの値を除算するものとして、テストプログラムを作成します。

```php
<?php
use \PHPUnit\Framework\TestCase;

class MemCalcTest extends TestCase
{

  public function testShow0()
  {
    $calc = new MemCalc();
    $calc->show();
    $this->expectOutputString("0");
  }

  public function testAdd3Show3()
  {
    $calc = new MemCalc();
    $calc->add(3)->show();
    $this->expectOutputString("3");
  }

  public function test10Divide5Add3Show5()
  {
    $calc = new MemCalc(10);
    $calc->divide(5)->add(3)->show();
    $this->expectOutputString("5");
  }
}
```

### MemCalc.php

divideメソッドを実装してください。

```php
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

  // divide

}
```

次のようにテストプログラムを実行できればOKです。

```
> php phpunit-6.0.8.phar --bootstrap src/MemCalc.php tests/MemCalcTest
PHPUnit 6.0.8 by Sebastian Bergmann and contributors.

...                                                                 3 / 3 (100%)

Time: 57 ms, Memory: 8.00MB

OK (3 tests, 3 assertions)
```


## Part4 ゼロによる除算

MemCalcクラスのdivideメソッドの引数が0のとき、InvalidArgumentExceptionをスローすることを確認するテストプログラムを作成します。

```php
<?php
use \PHPUnit\Framework\TestCase;

class MemCalcTest extends TestCase
{

  public function testShow0()
  {
    $calc = new MemCalc();
    $calc->show();
    $this->expectOutputString("0");
  }

  public function testAdd3Show3()
  {
    $calc = new MemCalc();
    $calc->add(3)->show();
    $this->expectOutputString("3");
  }

  public function test10Divide5Add3Show5()
  {
    $calc = new MemCalc(10);
    $calc->divide(5)->add(3)->show();
    $this->expectOutputString("5");
  }

  /**
   * @expectedException InvalidArgumentException
   */
  public function test10Divide0ThrowInvalidArgumentException()
  {
    $calc = new MemCalc(10);
    $calc->divide(0)->show();
  }
}
```

### MemCalc.php

divideメソッドを修正してください。

```php
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
    // TODO
    $this->memory /= $x;
    return $this;
  }
}
```

次のようにテストプログラムを実行できればOKです。

```
> php phpunit-6.0.8.phar --bootstrap src/MemCalc.php tests/MemCalcTest
PHPUnit 6.0.8 by Sebastian Bergmann and contributors.

....                                                                4 / 4 (100%)

Time: 62 ms, Memory: 8.00MB

OK (4 tests, 4 assertions)
```
