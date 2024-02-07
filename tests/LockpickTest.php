<?php
declare(strict_types=1);

/**
 * PHP Lockpick
 * Helps accessing protected/private members/consts of foreign objects
 *
 * @author    Marcin Orlowski <mail (#) marcinOrlowski (.) com>
 * @copyright 2022-2024 Marcin Orlowski
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      https://github.com/MarcinOrlowski/php-lockpick
 */

namespace MarcinOrlowski\LockpickTest;

use MarcinOrlowski\Lockpick\Lockpick;
use MarcinOrlowski\Lockpick\Visibility;
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

    /* ****************************************************************************************** */

    public function tstPublicStaticMethodVisibility(): void
    {
        $visibility = Lockpick::getMethodVisibility(Stronghold::class, 'publicStaticMethod');
        Assert::assertEquals(Visibility::PUBLIC, $visibility);
    }

    public function testProtectedStaticMethodVisibility(): void
    {
        $visibility = Lockpick::getMethodVisibility(Stronghold::class, 'protectedStaticMethod');
        Assert::assertEquals(Visibility::PROTECTED, $visibility);
    }

    public function testPrivateStaticMethodVisibility(): void
    {
        $visibility = Lockpick::getMethodVisibility(Stronghold::class, 'privateStaticMethod');
        Assert::assertEquals(Visibility::PRIVATE, $visibility);
    }

    /* ****************************************************************************************** */

    public function testPublicMethodVisibility(): void
    {
        $visibility = Lockpick::getMethodVisibility(Stronghold::class, 'publicMethod');
        Assert::assertEquals(Visibility::PUBLIC, $visibility);
    }

    public function testProtectedMethodVisibility(): void
    {
        $visibility = Lockpick::getMethodVisibility(Stronghold::class, 'protectedMethod');
        Assert::assertEquals(Visibility::PROTECTED, $visibility);
    }

    public function testPrivateMethodVisibility(): void
    {
        $visibility = Lockpick::getMethodVisibility(Stronghold::class, 'privateMethod');
        Assert::assertEquals(Visibility::PRIVATE, $visibility);
    }

    /* ****************************************************************************************** */

    public function testPublicPropertyVisibility(): void
    {
        $visibility = Lockpick::getPropertyVisibility(Stronghold::class, 'publicProperty');
        Assert::assertEquals(Visibility::PUBLIC, $visibility);
    }

    public function testProtectedPropertyVisibility(): void
    {
        $visibility = Lockpick::getPropertyVisibility(Stronghold::class, 'protectedProperty');
        Assert::assertEquals(Visibility::PROTECTED, $visibility);
    }

    public function testPrivatePropertyVisibility(): void
    {
        $visibility = Lockpick::getPropertyVisibility(Stronghold::class, 'privateProperty');
        Assert::assertEquals(Visibility::PRIVATE, $visibility);
    }

    /* ****************************************************************************************** */

    public function testPublicConstantVisibility(): void
    {
        $visibility = Lockpick::getConstantVisibility(Stronghold::class, 'PUBLIC_CONSTANT');
        Assert::assertEquals(Visibility::PUBLIC, $visibility);
    }

    public function testProtectedConstantVisibility(): void
    {
        $visibility = Lockpick::getConstantVisibility(Stronghold::class, 'PROTECTED_CONSTANT');
        Assert::assertEquals(Visibility::PROTECTED, $visibility);
    }

    public function testPrivateConstantVisibility(): void
    {
        $visibility = Lockpick::getConstantVisibility(Stronghold::class, 'PRIVATE_CONSTANT');
        Assert::assertEquals(Visibility::PRIVATE, $visibility);
    }

    /* ****************************************************************************************** */

    // Test for non-existent method, expecting a ReflectionException
    public function testMethodDoesNotExist(): void
    {
        $this->expectException(\ReflectionException::class);
        Lockpick::getMethodVisibility(Stronghold::class, 'nonExistentMethod');
    }

    /* ****************************************************************************************** */

    public function testCallWithArgsAsArray(): void
    {
        $cnt = \mt_rand(1, 100);
        $args = \range(0, $cnt - 1);

        $retCnt = Lockpick::call(new Stronghold(), 'countArgs', $args);
        Assert::assertEquals($cnt, $retCnt);
    }

    public function testCallWithArgsSingle(): void
    {
        $val = \mt_rand(1, 100);
        $retCnt = Lockpick::call(new Stronghold(), 'countArgs', [$val]);
        Assert::assertEquals(1, $retCnt);

        $retCnt = Lockpick::call(new Stronghold(), 'countArgs', $val);
        Assert::assertEquals(1, $retCnt);
    }

    public function testCallWithArgsUnfolded(): void
    {
        $arg1 = 1;
        $arg2 = 2;
        $arg3 = 3;

        $retCnt = Lockpick::call(new Stronghold(), 'countArgs', [$arg1, $arg2, $arg3]);
        Assert::assertEquals(3, $retCnt);
    }

}
