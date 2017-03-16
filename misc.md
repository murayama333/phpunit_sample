# PHPUnit

## 詳細なテスト結果を出力するには

--debugオプションを指定します。

```
> php phpunit-6.0.8.phar --debug --bootstrap src/MemCalc.php tests/MemCalcTest
PHPUnit 6.0.8 by Sebastian Bergmann and contributors.


Starting test 'MemCalcTest::testShow0'.
.
Starting test 'MemCalcTest::testAdd3Show3'.
.
Starting test 'MemCalcTest::test10Divide5Add3Show5'.
.
Starting test 'MemCalcTest::test10Divide0ThrowInvalidArgumentException'.
.                                                                4 / 4 (100%)

Time: 58 ms, Memory: 8.00MB
```

### カラー出力するには

--colorオプションを指定します。

## プライベートなプロパティやメソッドをテストするには

リフレクションAPIを使って処理します。

```
public function testPrivateProperty()
{
  $calc = new MemCalc();
  $calc->add(5);
  //$this->assertEquals(5, $calc->add(5)->memory);

  $prop = new ReflectionProperty(get_class($calc), 'memory');
  $prop->setAccessible(true);
  $this->assertEquals(5, $prop->getValue($calc));
}
```

> プライベートなメンバをテストするべきかは検討すべきです。

## 複数のテストを実行するには

phpunit.xmlファイルを作成して、テストの構成情報を管理すると便利です。

```xml
<phpunit bootstrap="bootstrap.php">
</phpunit>
```

上記の場合、--bootstrapオプションで読み込むファイルを指定しているので、php（phpunit）コマンド実行時に--bootstrapオプションを省略できます。

またbootstrap.phpにはプログラムをロードする実装を用意しておきます。

```php
<?php
require_once("src/Calc.php");
require_once("src/MemCalc.php");
require_once("src/Email.php");
```

> composerのオートロードも調べてみると良いでしょう。

## もっとPHPUnitを勉強するには

https://phpunit.de/manual/current/ja/installation.html


## そして、もっとプログラミングを楽しむには

https://www.facebook.com/itcaret/
