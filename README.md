```ascii
 ▄█        ▄██████▄   ▄████████    ▄█   ▄█▄    ▄███████▄  ▄█   ▄████████    ▄█   ▄█▄
███       ███    ███ ███    ███   ███ ▄███▀   ███    ███ ███  ███    ███   ███ ▄███▀
███       ███    ███ ███    █▀    ███▐██▀     ███    ███ ███▌ ███    █▀    ███▐██▀  
███       ███    ███ ███         ▄█████▀      ███    ███ ███▌ ███         ▄█████▀  
███       ███    ███ ███        ▀▀█████▄    ▀█████████▀  ███▌ ███        ▀▀█████▄  
███       ███    ███ ███    █▄    ███▐██▄     ███        ███  ███    █▄    ███▐██▄  
███▌    ▄ ███    ███ ███    ███   ███ ▀███▄   ███        ███  ███    ███   ███ ▀███▄
█████▄▄██  ▀██████▀  ████████▀    ███   ▀█▀  ▄████▀      █▀   ████████▀    ███   ▀█▀
▀                                 ▀                                        ▀  
```

# Lockpick #

[![Latest Stable Version](https://poser.pugx.org/marcin-orlowski/lockpick/v/stable)](https://packagist.org/packages/marcin-orlowski/lockpick)
[![License](https://poser.pugx.org/marcin-orlowski/lockpick/license)](https://packagist.org/packages/marcin-orlowski/lockpick)

Collection of PHP helper methods allowing easy access to protected or private properties and
constants of objects or classes as well as allowing to call such non-public methods.
This library is mostly useful while creating unit tests for your code.

## Installation ##

```bash
composer require marcin-orlowski/lockpick
```

## Usage ##

As all methods come as set of **static** methods, so you just need to add related `use` to your
code class and all methods should be simply available via static reference `Lockpick::...`:

```php
use Lockpick\Lockpick;
use PHPUnit\Framework\Assert;

$obj = new Stronghold();
$actual = Lockpick::call($obj, 'openSessame', [ 'abracadabra' ]);
Assert::assertEquals($expected, $actual);
...
```

## Available methods ##

The `$clsOrObj` parameter can be either `object` or class name (`string`)

| Method                                                       | Description                                                       |
|--------------------------------------------------------------|-------------------------------------------------------------------|
| call($clsOrObj, string $methodName, array $args = []): mixed | Calls object/class protected/private method                       |
| getProperty($clsOrObj, string $name): mixed                  | Returns value of protected/private property                       |
| setProperty($clsOrObj, string $name, mixed $value): mixed    | Sets value of protected/private property                          |
| getConstant($clsOrObj, string $name): mixed                  | Returns value of protected/private constant                       |
| getMethodVisibility($clsOrObj, string $name): Visibility     | Returns visibility of class method (public, protected, private)   |
| getPropertyVisibility($clsOrObj, string $name): Visibility   | Returns visibility of class property (public, protected, private) |
| getConstantVisibility($clsOrObj, string $name): Visibility   | Returns visibility of class constant (public, protected, private) |

----

## License ##

* Written and copyrighted &copy;2014-2024 by Marcin Orlowski
* Open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
* ASCII Art created using [https://textkool.com](https://textkool.com)
