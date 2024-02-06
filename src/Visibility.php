<?php
declare(strict_types=1);

/**
 * PHP Lockpick
 * Helps accessing protected/private members/consts of foreign objects
 *
 * @author    Marcin Orlowski <mail (#) marcinOrlowski (.) com>
 * @copyright 2014-2024 Marcin Orlowski
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      https://github.com/MarcinOrlowski/php-lockpick
 */

namespace MarcinOrlowski\Lockpick;

enum Visibility: string
{
    case PUBLIC    = 'public';
    case PROTECTED = 'protected';
    case PRIVATE   = 'private';

    /* ****************************************************************************************** */

}
