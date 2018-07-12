## Laravel Forge Facade

This package provides a facade around the Laravel Forge SDK provided by `themsaid/forge-sdk
`.

### Use Case

This package is meant for cases where you're only concerned with a single server on your Laravel Forge account.

### Installation

Install the package: 
```
composer require davidmaksimov/forge-facade
```

Update your `.env` configuration
```dotenv
LARAVEL_FORGE_API_KEY=
LARAVEL_FORGE_SERVER_ID=
```

### App Configuration
If you're not using auto-discovery, add the service provider and facade in your `config/app.php` file.

```php
'providers' => [
    ...
    Davidmaksimov\ForgeFacade\ServiceProvider::class,
],
```

```php
'aliases' => [
    ...
    'Forge' => \Davidmaksimov\ForgeFacade\Facade::class,
],
```

### Usage

Now you can use the facade to call methods that require a server id without it. When calling methods that require arguments 

```php
Forge::sites();
Forge::site($siteId);
Forge::createSite($siteId, $data);
```
