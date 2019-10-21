# Laravel Uuid

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

[link-packagist]: https://packagist.org/packages/emadadly/laravel-uuid
[link-travis]: https://travis-ci.org/EmadAdly/laravel-uuid
[link-scrutinizer]: https://scrutinizer-ci.com/g/emadadly/laravel-uuid/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/emadadly/laravel-uuid
[link-downloads]: https://packagist.org/packages/emadadly/laravel-uuid
[link-author]: https://github.com/emadadly
[link-contributors]: ../../contributors

A simple, automatic UUID generator for any model based on Laravel 5.5 and above, By using this package when each new entry you will get the following :

* Generate `uuid` automatically .
* Assign it to `uuid` field in database automatically.
* easy find it based `uuid` method.

### What is a UUID?

A universally unique identifier (UUID) is a 128-bit number used to identify information in computer systems. is a 36 character long identifier made up of 32 alphanumeric characters with four hyphens in amongst it.
For example:`123E4567-E89b-12D3-A456-426655440000` containing letters and numbers. that will uniquely identify something. you can read more [here](https://en.wikipedia.org/wiki/Universally_unique_identifier)

### What are the benefits?

1. With distributed systems you can be pretty confident that the primary key’s will never collide.

2. When building a large scale application when an auto increment primary key is not ideal.

3. It makes replication trivial (as opposed to int’s, which makes it REALLY hard)

4. Safe enough doesn’t show the user that you are getting information by id, for example `https://example.com/user/25/settings`



## Installation

To get started, require this package

- Via Composer

``` bash
 composer require emadadly/laravel-uuid
```

- Via composer.json file

Add the following to the `require` section of your projects `composer.json` file.
``` php
"emadadly/laravel-uuid": "1.*",
```

Run composer update to download the package

``` bash
 composer update
```

Finally, you'll also need to add the ServiceProvider

**Laravel 5.5 and above**

Uses package auto discovery feature, no need to edit the config/app.php file.

**Laravel 5.4 and below**

You need to add the ServiceProvider in `config/app.php` with the following

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

Our package assumes the column is `uuid` by default. If you want to replace the default `id` follow [these steps.](#replacing-default-id-with-uuid)

## Usage

#### Migrations


When using the migration you should add `uuid` as column type, and set the name it the same name in the `config/uuid.php` file.

``` php
$table->uuid('uuid');
```
it's will create column uuid name and a char(36) inside of our database schema, To be ready to receive Uuids.



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
  ....
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

#### Replacing default ID with UUID

If you want to replace the default id column with the uuid be sure to set `'default_uuid_column' => 'uuid',` to `'default_uuid_column' => 'id',` in the `config\uuid.php` file.

On your migration(s), change the id column type from `increments` to `uuid` as well as manually adding the primary key. *Note: This also applies to model relationship columns, if the related model is using an UUID, the column type should reflect that*

``` php
Schema::create('users', function (Blueprint $table) {

  $table->uuid('id')->unique();
  $table->primary('id');
  ....
  // related model uses UUID, must change type
  $table->uuid('model_id');
  ....
  $table->timestamps();
});
```

Then on the model(s) you will need to set the incrementing flag to false.

``` php
use Illuminate\Database\Eloquent\Model;
use Emadadly\LaravelUuid\Uuids;

class ExampleModel extends Model
{
  use Uuids;
  ....

  /**
  * Indicates if the IDs are auto-incrementing.
  *
  * @var bool
  */
  public $incrementing = false;

  ....
}
```


## Support

If you are having general issues with this package, feel free to contact me on [Twitter](https://twitter.com/emadadly).

If you believe you have found an issue, please report it using the [GitHub issue tracker](https://github.com/EmadAdly/laravel-uuid/issues), or better yet, fork the repository and submit a pull request.

If you're using this package, I'd love to hear your thoughts. Thanks!



## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/emadadly/laravel-uuid.svg
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg
[ico-travis]: https://img.shields.io/travis/emadadly/laravel-uuid/master.svg
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/emadadly/laravel-uuid.svg
[ico-code-quality]: https://img.shields.io/scrutinizer/g/emadadly/laravel-uuid.svg
[ico-downloads]: https://img.shields.io/packagist/dt/emadadly/laravel-uuid.svg

[link-packagist]: https://packagist.org/packages/emadadly/laravel-uuid
[link-travis]: https://travis-ci.org/EmadAdly/laravel-uuid
[link-scrutinizer]: https://scrutinizer-ci.com/g/emadadly/laravel-uuid/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/emadadly/laravel-uuid
[link-downloads]: https://packagist.org/packages/emadadly/laravel-uuid
[link-author]: https://github.com/emadadly
[link-contributors]: ../../contributors
