# Eversend Nodejs SDK

[![PyPI version](https://badge.fury.io/py/eversend.svg)](https://badge.fury.io/py/eversend) [![Build Status][travis-image]][travis-url] ![Dependencies](https://img.shields.io/librariesio/release/pypi/eversend)

Nodejs SDK for Eversend payments API

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

[pypi-image]: https://badge.fury.io/py/eversend.svg
[npm-url]: https://badge.fury.io/js/@eversend%2Fnode-sdk
[travis-image]: https://app.travis-ci.com/eversend/eversend-python-sdk.svg?token=WxxstsCyyxGyzLpHFkUi&branch=master
[travis-url]: https://app.travis-ci.com/eversend/eversend-python-sdk
