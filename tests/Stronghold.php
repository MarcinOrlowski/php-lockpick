<?php
declare(strict_types=1);

/**
 * PHP Lockpick
 * Helps accessing protected/private members/consts of foreign objects
 *
 * @author    Marcin Orlowski <mail (#) marcinOrlowski (.) com>
 * @copyright 2014-2022 Marcin Orlowski
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      https://github.com/MarcinOrlowski/php-lockpick
 */

namespace MarcinOrlowski\LockpickTest;

class Stronghold
{
    protected const PROTECTED_CONSTANT = 'I am protected constant';
    // @phpstan-ignore-next-line
    private const   PRIVATE_CONSTANT   = 'I am private constant';

    protected string $protectedProperty = 'I am protected property';
    // @phpstan-ignore-next-line
    private string   $privateProperty   = 'I am private property';

    protected static function protectedStaticMethod(): string
    {
        return 'I am protected static method';
    }

    // @phpstan-ignore-next-line
    private static function privateStaticMethod(): string
    {
        return 'I am private static method';
    }

    protected function protectedMethod(): string
    {
        return 'I am protected method';
    }

    // @phpstan-ignore-next-line
    private function privateMethod(): string
    {
        return 'I am private method';
    }
}
