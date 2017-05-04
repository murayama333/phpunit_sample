# Case1: Hello PHPUnit

```
PHPUnit is a programmer-oriented testing framework for PHP.
It is an instance of the xUnit architecture for unit testing frameworks.

https://phpunit.de/
```

プログラムの単体テストフレームワークです。

> ちなみにJavaにはJUnitというのがあります。xUnitと聞けば大体同じような仕組みになっています。

## 準備

PHP5系の方とPHP7系の方でダウンロードするファイルが違うので注意してください。

PHP7系の人はPHPUnit 6.0を使います。

https://phar.phpunit.de/phpunit.phar

PHP5系の人はPHPUnit 5.7を使います。

https://phar.phpunit.de/phpunit-5.7.phar

デスクトップにphpunitというフォルダを作って、そこに上記のファイルをダウンロードしておいてください。

それからコマンドプロンプト（ターミナル）を開いて以下のコマンドを実行してください。

```
cd Desktop/phpunit
```

> デスクトップのphpunitフォルダに移動しています。


## PHPUnitを使って何をするのか

プログラムの単体テストプログラムを書いて、実行できます。

次のようなコード（Email.php）が手元にあるとします。

```php
<?php
final class Email
{
    private $email;

    private function __construct($email)
    {
        $this->ensureIsValidEmail($email);

        $this->email = $email;
    }

    public static function fromString($email)
    {
        return new self($email);
    }

    public function __toString()
    {
        return $this->email;
    }

    private function ensureIsValidEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" is not a valid email address',
                    $email
                )
            );
        }
    }
}
```

> デスクトップ/phpunit/srcフォルダにEmail.phpを保存してください。

続いて上記のプログラムが正しく動くかテストするために、PHPUnitを使ってテストプログラム（EmailTest.php）を作りましょう。


```php
<?php
use PHPUnit\Framework\TestCase;

/**
 * @covers Email
 */
final class EmailTest extends TestCase
{
    public function testCanBeCreatedFromValidEmailAddress()
    {
        $this->assertInstanceOf(
            Email::class,
            Email::fromString('user@example.com')
        );
    }

    public function testCannotBeCreatedFromInvalidEmailAddress()
    {
        $this->expectException(InvalidArgumentException::class);

        Email::fromString('invalid');
    }

    public function testCanBeUsedAsString()
    {
        $this->assertEquals(
            'user@example.com',
            Email::fromString('user@example.com')
        );
    }
}
```

> デスクトップ/phpunit/testsフォルダにEmailTest.phpを保存してください。

上記の2つのプログラムは公式サイトのサンプルコードです。

## 動かし方

コマンドプロンプト（ターミナル）上で次のように実行します。

```
php phpunit-6.0.8.phar --bootstrap src/Email.php tests/EmailTest.php
PHPUnit 6.0.8 by Sebastian Bergmann and contributors.

...                                                                 3 / 3 (100%)

Time: 57 ms, Memory: 8.00MB

OK (3 tests, 3 assertions)
```
