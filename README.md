# Laravel API Response Formatter

[![Latest Version on Packagist](https://img.shields.io/packagist/v/okriiza/response-formatter.svg?style=flat-square)](https://packagist.org/packages/okriiza/laravel-api-response-formatter)
[![Total Downloads](https://img.shields.io/packagist/dt/okriiza/laravel-api-response-formatter.svg?style=flat-square)](https://packagist.org/packages/okriiza/laravel-api-response-formatter)
![GitHub Actions](https://github.com/okriiza/laravel-api-response-formatter/actions/workflows/main.yml/badge.svg)

a simple package Format API responses throughout your Laravel application

## Installation

You can install the package via composer:

```bash
composer require okriiza/laravel-api-response-formatter
```

The package will automatically register itself.

## Usage

To use the package, simply call the success or error method from the ApiResponseFormatter class. Here's an example of how to use it:

```php
use Okriiza\ApiResponseFormatter\ApiResponseFormatter;
```

And use it like this:

```php
use Okriiza\ApiResponseFormatter\ApiResponseFormatter;

// Example success response
$user = User::find(1);
return ApiResponseFormatter::success($user, 'User found');

// Example error response
return ApiResponseFormatter::error('User not found', 404);
```

By default, the package returns a JSON response with the following format:

```php
{
  "meta": {
    "code": 200,
    "status": true,
    "message": null
  },
  "result": null
}
```

You can customize the response message, status, and code by passing the appropriate arguments to the success or error method.

### Testing

You can run the tests using PHPUnit. Simply run the following command in the package directory:

```bash
vendor/bin/phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email okriizaa@gmail.com instead of using the issue tracker.

## Credits

This package was created by [Rendi Okriza](https://github.com/okriiza)

-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

And here's an example code:

```php
<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Okriiza\ApiResponseFormatter\ApiResponseFormatter;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return ApiResponseFormatter::success($users, 'All users fetched successfully');
    }

    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return ApiResponseFormatter::error('User not found', 404);
        }

        return ApiResponseFormatter::success($user, 'User fetched successfully');
    }
}
```
