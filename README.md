# Eversend PHP SDK

![Packagist Version](https://img.shields.io/packagist/v/eversend/eversend-php-sdk) ![Packagist License](https://img.shields.io/packagist/l/eversend/eversend-php-sdk) ![Packagist Downloads](https://img.shields.io/packagist/dm/eversend/eversend-php-sdk)

PHP SDK for Eversend payments API

## Installation

```sh
composer require eversend/eversend-php-sdk
```

## Usage

```php
use Eversend\Eversend

$eversendClient = new Eversend(clientId= 'clientId', clientSecret= 'clientSecret', version=1)

$wallets = eversendClient.wallets().list();
```

For additional documentation, check our [developer docs](https://developer.eversend.co/docs)
## License

MIT © [Eversend]()
