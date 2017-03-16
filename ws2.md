# Case2: Calc

## 準備

ここでは以下の2つのプログラムを作成します。

+ Calc.php
+ CalcTest.php

### Calc.php

srcフォルダに計算機クラスを作ります。

```php
<?php

class Calc
{

}
```

### CalcTest.php

testsフォルダに計算機テストクラスを作ります。

```php
<?php
use PHPUnit\Framework\TestCase;

class CalcTest extends TestCase
{

}
```

## Part1 addメソッドの実装

テストファーストでプログラムを作成してみます。

### CalcTest.php

Calcクラスに足し算をするaddメソッドがあると仮定してテストプログラムを記述します。

```php
<?php
use PHPUnit\Framework\TestCase;

class CalcTest extends TestCase
{
  public function testAdd3_4_eq_7()
  {
    $calc = new Calc();
    $this->assertEquals(7, $calc->add(3, 4));
  }
}
```

テストプログラムを実行してみます。

```
> php phpunit-6.0.8.phar --bootstrap src/Calc.php tests/CalcTest
PHPUnit 6.0.8 by Sebastian Bergmann and contributors.

E                                                                   1 / 1 (100%)

Time: 69 ms, Memory: 8.00MB

There was 1 error:

1) CalcTest::testAdd3_4_eq_7
Error: Call to undefined method Calc::add()

/Users/murayama/Desktop/phpunit_sample/work/tests/CalcTest.php:9

ERRORS!
Tests: 1, Assertions: 0, Errors: 1.
```

### Calc.php

Calcクラスにaddメソッドを実装します。

```php
<?php
class Calc
{

  public function add($x, $y)
  {
    return 7;
  }
}
```

テストプログラムを実行してみます。

```
> php phpunit-6.0.8.phar --bootstrap src/Calc.php tests/CalcTest
PHPUnit 6.0.8 by Sebastian Bergmann and contributors.

.                                                                   1 / 1 (100%)

Time: 58 ms, Memory: 8.00MB

OK (1 test, 1 assertion)
```

## Part2 addメソッドの実装2

### CalcTest.php

テストコードを追加します。

```php
<?php
use PHPUnit\Framework\TestCase;

class CalcTest extends TestCase
{
  public function testAdd3_4_eq_7()
  {
    $calc = new Calc();
    $this->assertEquals(7, $calc->add(3, 4));
  }

  public function testAdd5_5_eq_10()
  {
    $calc = new Calc();
    $this->assertEquals(10, $calc->add(5, 5));
  }
}
```

テストプログラムを実行してみます。

```
> php phpunit-6.0.8.phar --bootstrap src/Calc.php tests/CalcTest
PHPUnit 6.0.8 by Sebastian Bergmann and contributors.

.F                                                                  2 / 2 (100%)

Time: 59 ms, Memory: 8.00MB

There was 1 failure:

1) CalcTest::testAdd5_5_eq_10
Failed asserting that 7 matches expected 10.

/Users/murayama/Desktop/phpunit_sample/work/tests/CalcTest.php:15

FAILURES!
Tests: 2, Assertions: 2, Failures: 1.
```

### Calc.php

Calcクラスにaddメソッドを修正します。

```php
<?php
class Calc
{

  public function add($x, $y)
  {
    return $x + $y;
  }
}
```

テストプログラムを実行してみます。

```
> php phpunit-6.0.8.phar --bootstrap src/Calc.php tests/CalcTest
PHPUnit 6.0.8 by Sebastian Bergmann and contributors.

..                                                                  2 / 2 (100%)

Time: 58 ms, Memory: 8.00MB

OK (2 tests, 2 assertions)
```

## Part3 データプロバイダー

検証データを配列で定義して、効率よくテストすることができます。

### CalcTest.php

テストコードを追加します。

```php
<?php
use PHPUnit\Framework\TestCase;

class CalcTest extends TestCase
{
  public function testAdd3_4_eq_7()
  {
    $calc = new Calc();
    $this->assertEquals(7, $calc->add(3, 4));
  }

  public function testAdd5_5_eq_10()
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
```

> testAddメソッドには\@dataProviderアノテーションと引数が定義されています。


テストプログラムを実行してみます。

```
> php phpunit-6.0.8.phar --bootstrap src/Calc.php tests/CalcTest
PHPUnit 6.0.8 by Sebastian Bergmann and contributors.

.....                                                               5 / 5 (100%)

Time: 60 ms, Memory: 8.00MB

OK (5 tests, 5 assertions)
```
