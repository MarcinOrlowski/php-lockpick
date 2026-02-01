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

# CHANGELOG #

* 1.4.1 (TBD)
  * Added project logo
  * Project structure cleanup
  * Upgraded PHPStan to ^1.12 for PHP 8.4 compatibility
  * Fixed `setProperty()` to correctly handle class name strings for static properties


* 1.4.0 (2024-02-07)
  * The `Lockpick::call()` now allows single arguments to be passed w/o wrapping them into array.


* 1.3.0 (2024-02-06)
  * Dropped PHP 8.0 support
  * Added `Lockpick::getMethodVisibility()` method
  * Added `Lockpick::getPropertiesVisibility()` method
  * Added `Lockpick::getConstantVisibility()` method


* 1.2.1 (2023-04-14)
  * Listed `marcin-orlowski/php-lockpick` package as conflicting one.
  * Removed unused config files.


* 1.2.0 (2023-04-13)
  * Package name changed to `marcin-orlowski/lockpick` (formerly `marcin-orlowski/php-lockpick`).
  * Updated documentation.


* 1.1.0 (2023-02-24)
  * Added `setProperty()` method to set value of private/protected properties.


* 1.0.1 (2022-11-28)
  * Corrected methods' signatures.
  * Code cleanup.
  * Tweaked configs of Github Actions.


* 1.0.0 (2022-11-04)
  * Initial release as separated package (extracted from `marcin-orlowski/phpunit-extra-assets`).
