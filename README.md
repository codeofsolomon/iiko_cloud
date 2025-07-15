# Laravel IIKO Cloud API

An unofficial Laravel SDK for the IIKO Cloud API, providing a convenient way to integrate your Laravel application with the iikoCloud restaurant management platform.

## Requirements

* PHP ^8.2
* Laravel ^10.0 || ^11.0 || ^12.0
* ext-json
* GuzzleHTTP ^7.9
* nyholm/psr7 ^1.8
* psr/http-client ^1.0
* psr/http-message ^2.0
* webmozart/assert ^1.11

## Installation

Install the package via Composer:

```bash
composer require codeofsolomon/laravel-iiko-cloud-api
```

After installing, publish the configuration file:

```bash
php artisan vendor:publish --tag=iiko-api-config
```

This will copy the configuration file to `config/iiko-api.php`.

## Configuration

Open the published config file (`config/iiko-api.php`) and set your credentials and preferences:

```php
return [
    /*
    |--------------------------------------------------------------------------
    | Authentication
    |--------------------------------------------------------------------------
    |
    | iikoCloud login.
    |
    */
    'login' => env('IIKO_CLOUD_LOGIN'),

    /*
    |--------------------------------------------------------------------------
    | HTTP
    |--------------------------------------------------------------------------
    */
    'base_uri' => env('IIKO_BASE_URI', 'https://api-ru.iiko.services/api/1/'),
    'timeout' => env('IIKO_CLOUD_TIMEOUT', 15.0),

    /*
    |--------------------------------------------------------------------------
    | Token cache
    |--------------------------------------------------------------------------
    |
    | The TTL is automatically calculated from the expiresIn value in the response,
    | but you can set a hard upper limit here.
    |
    */
    'token_cache_ttl' => env('IIKO_TOKEN_TTL', 60 * 59), // 59 min
    'cache_store' => env('IIKO_CACHE_STORE', null),        // null → driver по-умолчанию
];
```

Add the following to your `.env` file:

```dotenv
IIKO_BASE_URI=https://api-ru.iiko.services/api/1/
IIKO_CLOUD_LOGIN=your-client-login
IIKO_CACHE_STORE=null
IIKO_CLOUD_TIMEOUT=3500
```

## Usage

The package registers a service binding and a facade (`IikoApi`). You can inject the client or use the facade in your application.

### Using the Facade

```php
use Codeofsolomon\Iiko\Facades\IikoApi;

// Retrieve a list of regions
$response = IikoApi::getRegions([
    'organization' => config('iiko-api.organization_id'),
]);

$regions = $response->toArray();
```

### Dependency Injection

```php
use Codeofsolomon\Iiko\Api\IikoApiClient;

class OrderController extends Controller
{
    public function index(IikoApiClient $client)
    {
        $terminals = $client->getTerminalGroups([
            'organization' => config('iiko-api.organization_id'),
        ]);

        return response()->json($terminals);
    }
}
```

Refer to the source code in `src/Api` for a full list of available methods and their parameters.

## Token Management

Access tokens are automatically fetched and cached according to the settings in the configuration file. You generally do not need to manage tokens manually.



## Contributing

Contributions are welcome! Please:

1. Fork the repository
2. Create a new branch for your feature or bugfix
3. Write tests and ensure existing tests pass
4. Submit a Pull Request with a clear description of your changes

## License

This package is open-sourced software licensed under the MIT license.
