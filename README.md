# Laravel Uuid

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
<!-- [![Total Downloads][ico-downloads]][link-downloads] -->

A simple, automatic UUID generator for any model based on Laravel 5.4 , by using this package will automatically generate Uuid and assign it to id field. you can use it for any model.

### What is a UUID?

A universally unique identifier (UUID) is a 128-bit number used to identify information in computer systems. is a 36 character long identifier made up of 32 alphanumeric characters with four hyphens in amongst it.

For example:**123e4567-e89b-12d3-a456-426655440000** containing letters and numbers. that will uniquely identify something. you can read more [here](https://en.wikipedia.org/wiki/Universally_unique_identifier)

### What are the benefits?

1. With distributed systems you can be pretty confident that the primary key’s will never collide.

2. When building a large scale application when an auto increment primary key is not ideal.

3. It makes replication trivial (as opposed to int’s, which makes it REALLY hard)

4. Safe enough doesn’t show the user that you are getting information by id, for example https://example.com/user/25/settings



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
 composer update
```

Finally, you'll also need to add the ServiceProvider in `config/app.php`

``` php
  'providers' => [
        ...
        Emadadly\LaravelUuid\LaravelUuidServiceProvider::class,
    ],
```

You could also publish the config file:

``` bash
php artisan vendor:publish --provider="Emadadly\LaravelUuid\LaravelUuidServiceProvider"
```

and set your default_uuid_column setting, if you have an app-wide default. 

Our package assume the column is `uuid` by default.

## Usage

#### Migrations


When using the migration you should add `uuid` as column type, and set the name it the same name in the `config/uuid.php` file.

``` php
$table->uuid('uuid');
```
it's will create column uuin name and a char(36) inside of our database schema, To be ready to receive Uuids.



> Simply, the schema seems something like this.

``` php
Schema::create('users', function (Blueprint $table) {
	$table->increments('id');
    $table->uuid('uuid');
    ....
    ....
    $table->timestamps();

});
```


#### Models

Use this trait in any model.

To set up a model to using Uuid, simply use the Uuids trait:

``` php
use Illuminate\Database\Eloquent\Model;
use Emadadly\LaravelUuid\Uuids;

class ExampleModel extends Model
{
    use Uuids;


}
```

#### Controller

When you create a new instance of a model which uses Uuids, our package will automatically add Uuid.

``` php
// 'Uuid' will automatically generate and assign id field.
$model = ExampleModel::create(['name' => 'whatever']);
```

Also when use show, update or delete method inside the Controller, it very easy to implement through `ExampleModel::uuid()` scope method

``` php
    public function show($uuid)
    {
            $example = ExampleModel::uuid($uuid);
            return response()->json(['example' => $example]);
    }
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

If you discover any security related issues, please email thedevmark@gmail.com instead of using the issue tracker.

## Credits

- [Emad Adly][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/emadadly/laravel-uuid.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/emadadly/laravel-uuid/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/emadadly/laravel-uuid.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/emadadly/laravel-uuid.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/emadadly/laravel-uuid.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/emadadly/laravel-uuid
[link-travis]: https://travis-ci.org/EmadAdly/laravel-uuid
[link-scrutinizer]: https://scrutinizer-ci.com/g/emadadly/laravel-uuid/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/emadadly/laravel-uuid
[link-downloads]: https://packagist.org/packages/emadadly/laravel-uuid
[link-author]: https://github.com/emadadly
[link-contributors]: ../../contributors
