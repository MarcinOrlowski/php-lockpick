# PhpLockpick #

[![Latest Stable Version](https://poser.pugx.org/marcin-orlowski/php-lockpick/v/stable)](https://packagist.org/packages/marcin-orlowski/php-lockpick)
[![License](https://poser.pugx.org/marcin-orlowski/php-lockpick/license)](https://packagist.org/packages/marcin-orlowski/php-lockpick)

Collection of helper methods allowing easy access to protected/private properties and constants
of objects or classes.

## Installation ##

```bash
composer require marcin-orlowski/php-lockpick
```

## Usage ##

As all methods come as set of static methods so you just need to add related `use` to your
code class and all methods should be simply available via static reference `Lockpick::...`.

## Available methods ##

| Method                                                                   | Description                         |
|--------------------------------------------------------------------------|-------------------------------------|
| call(object OR string $cls_or_obj, string $method_name, array $args = [] | Calls object/class protected method |
| getProperty(string OR object $cls_or_obj, string $name)                  | Returns value of protected property |
| getConstant(string OR object $cls_or_obj, string $name)                  | Returns value of protected constant |

----

## License ##

* Written and copyrighted &copy;2014-2022 by Marcin Orlowski
* Open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
