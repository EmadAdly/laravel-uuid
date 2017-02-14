# Laravel Uuid

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

A simple, automatic UUID generator for any model based on Laravel 5.4 , by using this package will automatically generate Uuid and assign it to id field. you can use it for any model.

#### What is a UUID?

A universally unique identifier (UUID) is a 128-bit number used to identify information in computer systems. which is a set of 36 characters, containing letters and numbers.that will uniquely identify something.

## Installation
To get started, require this package

**Via Composer**

``` bash
 composer require emadadly/laravel-uuid
```

**Via composer.json file**

Add the following to the `require` section of your projects `composer.json` file.
``` php
"emadadly/laravel-uuid": "1.*",
```

Run composer update to download the package

``` bash
 php composer update
```

Finally, you'll also need to add the ServiceProvider in `config/app.php`

``` php
  'providers' => [
        ...
        Emadadly\laravelUuid\LaravelUuidServiceProvider::class,
    ],
```



## Usage

### 1) Migrations

**Firstly: Replace increments method**

when using the migration that comes out by default Or when manually created, You should replace.

``` php
$table->increments('id');
```
to 

``` php 
$table->uuid('id');
```
it's will create a char(36) inside of our database schema, To be ready to receive Uuid

**Secondly: Set primary key**

In the first step we have removed the increment type which resulted in the removal of primary key, now the schema builder doesn’t know the primary key.
So we need to add that manually.

Add at down schema

``` php
$table->primary('id');
```

> Simply, the schema seems something like this.

``` php
Schema::create('users', function (Blueprint $table) {
    $table->uuid('id');
    ....
    ....

    $table->primary('id');
});
```

### 2) Models

**Firstly : Removing auto increment for model**

Laravel by default will be auto increment the Primary Key when you create a new row. So we can turn off this feature by adding following attribute in our model.

``` php
public $incrementing = false;
```
**Secondly : Using the trait in model**

To set up a model to using Uuid, simply use the Uuids trait:

``` php
use Illuminate\Database\Eloquent\Model;
use Emadadly\laravelUuid\UUIDManager;

class ExampleModel extends Model
{
    use Uuids;

   public $incrementing = false;
}
```
When you create a new instance of a Model which uses Uuids, larave-uuid package will automatically add Uuid.

``` php
// 'Uuid' will automatically generate and assign id field by laravel-uuid package.
$model = ExampleModel::create(['name' => 'whatever']);
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email eadly@outlook.com instead of using the issue tracker.

## Credits

- [Emad Adly][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/emadadly/laravel-uuid/laravel-uuid.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/emadadly/laravel-uuid/laravel-uuid/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/emadadly/laravel-uuid/laravel-uuid.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/emadadly/laravel-uuid/laravel-uuid.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/emadadly/laravel-uuid/laravel-uuid.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/emadadly/laravel-uuid/laravel-uuid
[link-travis]: https://travis-ci.org/emadadly/laravel-uuid/laravel-uuid
[link-scrutinizer]: https://scrutinizer-ci.com/g/emadadly/laravel-uuid/laravel-uuid/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/emadadly/laravel-uuid/laravel-uuid
[link-downloads]: https://packagist.org/packages/emadadly/laravel-uuid/laravel-uuid
[link-author]: https://github.com/emadadly
[link-contributors]: ../../contributors
