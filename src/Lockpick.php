<?php
declare(strict_types=1);

/**
 * PHP Lockpick
 * Helps accessing protected/private members/consts of foreign objects
 *
 * @author    Marcin Orlowski <mail (#) marcinOrlowski (.) com>
 * @copyright 2014-2023 Marcin Orlowski
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      https://github.com/MarcinOrlowski/php-lockpick
 */

namespace MarcinOrlowski\Lockpick;

use MarcinOrlowski\TypeAsserts\Type;
use MarcinOrlowski\TypeAsserts\Validator;

class Lockpick
{
    /**
     * Calls protected method of $object, passing optional array of arguments.
     *
     * @param object|string $clsOrObj Object to call $methodName on or name of the class.
     * @param string $methodName Name of method to call.
     * @param array $args Optional array of arguments (empty array for no args).
     *
     * @throws \ReflectionException
     * @throws \RuntimeException
     */
    public static function call(string|object $clsOrObj, string $methodName, array $args = []): mixed
    {
        Validator::assertIsType($clsOrObj, [Type::EXISTING_CLASS, Type::OBJECT]);

        /**
         * At this point $objectOrClass is either object or string but some static analyzers
         * got problems figuring that out, so this (partially correct) var declaration is
         * to make them believe.
         *
         * @var class-string|object $clsOrObj
         */
        $reflection = new \ReflectionClass($clsOrObj);
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs(\is_object($clsOrObj) ? $clsOrObj : null, $args);
    }

    /* **************************************************************************************************** */

    /**
     * Returns value of otherwise non-public property of the class
     *
     * @param string|object $clsOrObj Class name to get property from, or instance of that class
     * @param string $name Property name to grab (i.e. `maxLength`)
     *
     * @throws \ReflectionException
     */
    public static function getProperty(object|string $clsOrObj, string $name): mixed
    {
        Validator::assertIsType($clsOrObj, [Type::EXISTING_CLASS, Type::OBJECT], 'clsOrObj');

        /**
         * At this point $objectOrClass is either object or string but some static analyzers
         * got problems figuring that out, so this (partially correct) var declaration is
         * to make them believe.
         */
        $reflection = new \ReflectionClass($clsOrObj);
        $property = $reflection->getProperty($name);
        $property->setAccessible(true);

        return $property->getValue(\is_object($clsOrObj) ? $clsOrObj : null);
    }

    public static function setProperty(object|string $clsOrObj, string $name, mixed $value): void
    {
        Validator::assertIsType($clsOrObj, [Type::EXISTING_CLASS, Type::OBJECT], 'clsOrObj');

        /**
         * At this point $objectOrClass is either object or string but some static analyzers
         * got problems figuring that out, so this (partially correct) var declaration is
         * to make them believe.
         */
        $reflection = new \ReflectionClass($clsOrObj);
        $property = $reflection->getProperty($name);
        $property->setValue($clsOrObj, $value);
    }

    /* **************************************************************************************************** */

    /**
     * Returns value of otherwise non-public member of the class
     *
     * @param string|object $clsOrObj Class name to get member from, or instance of that class
     * @param string $name Name of constant to grab (i.e. `FOO`)
     *
     * @return mixed
     *
     * @throws \ReflectionException
     */
    public static function getConstant(object|string $clsOrObj, string $name): mixed
    {
        Validator::assertIsType($clsOrObj, [Type::EXISTING_CLASS, Type::OBJECT], 'clsOrObj');

        /**
         * At this point $clsOrObj is either object or string but some static analyzers
         * got problems figuring that out, so this (partially correct) var declaration is
         * to make them believe.
         */
        return (new \ReflectionClass($clsOrObj))->getConstant($name);
    }

    /* **************************************************************************************************** */

}
