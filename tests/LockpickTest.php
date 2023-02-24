<?php
declare(strict_types=1);

/**
 * PHP Lockpick
 * Helps accessing protected/private members/consts of foreign objects
 *
 * @author    Marcin Orlowski <mail (#) marcinOrlowski (.) com>
 * @copyright 2022 Marcin Orlowski
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      https://github.com/MarcinOrlowski/php-lockpick
 */

namespace MarcinOrlowski\LockpickTest;

use MarcinOrlowski\Lockpick\Lockpick;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class LockpickTest extends TestCase
{
    public function testNonExistingProperty(): void
    {
        $obj = new Stronghold();

        $this->expectException(\ReflectionException::class);
        Lockpick::getProperty($obj, 'non-existing');
    }

    public function testNonExistingConstant(): void
    {
        $obj = new Stronghold();

        $this->expectException(\ReflectionException::class);
        Lockpick::getProperty($obj, 'NON_EXISTING');
    }

    public function testNonExistingMethod(): void
    {
        $obj = new Stronghold();

        $this->expectException(\ReflectionException::class);
        Lockpick::call($obj, 'nonExistingMethod');
    }

    public function testPrivateProperty(): void
    {
        $obj = new Stronghold();

        $val = Lockpick::getProperty($obj, 'privateProperty');

        $expected = 'I am private property';
        Assert::assertEquals($expected, $val);
    }

    public function testProtectedProperty(): void
    {
        $obj = new Stronghold();

        $val = Lockpick::getProperty($obj, 'protectedProperty');

        $expected = 'I am protected property';
        Assert::assertEquals($expected, $val);
    }

    public function testPrivateConstant(): void
    {
        $obj = new Stronghold();

        $val = Lockpick::getConstant($obj, 'PRIVATE_CONSTANT');

        $expected = 'I am private constant';
        Assert::assertEquals($expected, $val);
    }

    public function testProtectedConstant(): void
    {
        $obj = new Stronghold();

        $val = Lockpick::getConstant($obj, 'PROTECTED_CONSTANT');

        $expected = 'I am protected constant';
        Assert::assertEquals($expected, $val);
    }

    public function testPrivateMethod(): void
    {
        $obj = new Stronghold();

        $val = Lockpick::call($obj, 'privateMethod');

        $expected = 'I am private method';
        Assert::assertEquals($expected, $val);
    }

    public function testProtectedMethod(): void
    {
        $obj = new Stronghold();

        $val = Lockpick::call($obj, 'protectedMethod');

        $expected = 'I am protected method';
        Assert::assertEquals($expected, $val);
    }

    public function testGettingOfProtectedProperty(): void
    {
        $obj = new Stronghold();

        $expected = 'protectedPropertysdfsdfsfsf';
        Lockpick::setProperty($obj, 'protectedProperty', $expected);
        $val = Lockpick::getProperty($obj, 'protectedProperty');

        Assert::assertEquals($expected, $val);
    }

    public function testSettingOfProtectedProperty(): void
    {
        $obj = new Stronghold();

        $expected = 'protectedPropertysdfsdfsfsf';
        Lockpick::setProperty($obj, 'protectedProperty', $expected);
        $val = Lockpick::getProperty($obj, 'protectedProperty');

        Assert::assertEquals($expected, $val);
    }
}
