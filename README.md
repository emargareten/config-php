# Simple Config for PHP applications

[![Latest Version on Packagist](https://img.shields.io/packagist/v/emargareten/config-php.svg?style=flat-square)](https://packagist.org/packages/emargareten/config-php)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
![Tests](https://github.com/emargareten/config-php/workflows/Tests/badge.svg)
[![Total Downloads](https://img.shields.io/packagist/dt/emargareten/config-php.svg?style=flat-square)](https://packagist.org/packages/emargareten/config-php)

This package makes it easy to manage configuration settings in your application. It provides a simple and convenient way to set, get, and manipulate configuration values.

## Requirements
This package requires PHP 8.0 or later.

## Installation

You can install the package via composer:

``` bash
composer require emargareten/config-php
```

## Usage

### Setting the Configuration File Path

Before you can use the package, you must create a configuration file and set the path to it. The configuration file should return an array of configuration values:

```php
<?php

return [
    'key' => 'value',
    'another_key' => 'another_value',
];
```

Now set the path to your configuration file in your application bootstrap file etc.:

```php
Config::setPath('/path/to/config.php');
```

Alternatively, you can pass the path as a parameter when you instantiate the `Config` class for the first time:

```php
$config = new Config('/path/to/config.php');
```

If you don't want to use a configuration file, you can use the `setValues` method to set configuration values directly:

```php
Config::setValues([
    'key' => 'value',
    'another_key' => 'another_value',
]);
```

### Using the Configuration

The Config value are static, so you can access them anywhere in your application.

You can the following methods to get, set, and manipulate configuration values: (call these methods statically or on an instance of the `Config` class)
```php

// Get a value from your configuration
$value = Config::get('key');

// Get a value with a default value if key is not found
$value = Config::get('key', 'default');

// Set a value in your configuration
Config::set('key', 'value');

// Remove a value from your configuration
Config::forget('key');

// Remove all values from your configuration
Config::clear();

// Set multiple values in your configuration
Config::setMany([
    'key1' => 'value1',
    'key2' => 'value2',
]);

// Reset your configuration to its initial state (rereads the config file)
Config::reset();

// Check if a key exists in your configuration
if (Config::has('key')) {
    // ...
}

// Get all values from your configuration
$values = Config::all();
```

You can also use the `config` helper function to access the `Config` class:

```php
config()->get('key'); // or config('key')

config()->set('key', 'value');

// ...
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information about what has changed recently.

## Testing

``` bash
composer test
```

## Contributing
Contributions are welcome! If you find any bugs or issues or have a feature request, please open a new issue or submit a pull request. Before contributing, please make sure to read the [Contributing Guide](CONTRIBUTING.md).

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
