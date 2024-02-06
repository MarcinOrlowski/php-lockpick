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

Collection of PHP helper methods allowing easy access to protected or private properties
and constants of objects or classes as well as allowing to call formerly protected/private
methods, aimed mostly for tests.

## Installation ##

```bash
composer require marcin-orlowski/lockpick
```

**NOTE:** Formerly package was named `marcin-orlowski/php-lockpick`. If you use old package name, the upgrade should
be automatically handled by the `composer upgrade` anyway.

## Usage ##

As all methods come as set of **static** methods, so you just need to add related `use` to your
code class and all methods should be simply available via static reference `Lockpick::...`.

## Available methods ##

| Method                                                               | Description                                            |
|----------------------------------------------------------------------|--------------------------------------------------------|
| call(object\|string $clsOrObj, string $methodName, array $args = []) | Calls object/class protected method |
| getProperty(string OR object $clsOrObj, string $name)                | Returns value of protected property                    |
| setProperty(string OR object $clsOrObj, string $name, mixed $value)  | Sets  value of protected property                      |
| getConstant(string OR object $clsOrObj, string $name)                | Returns value of protected constant                    |

----

## License ##

* Written and copyrighted &copy;2014-2024 by Marcin Orlowski
* Open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
* ASCII Art created using [https://textkool.com](https://textkool.com)
