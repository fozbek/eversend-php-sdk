# Eversend PHP SDK

![Packagist Version](https://img.shields.io/packagist/v/eversend/eversend-php-sdk)
![Packagist License](https://img.shields.io/packagist/l/eversend/eversend-php-sdk)
![Packagist Downloads](https://img.shields.io/packagist/dm/eversend/eversend-php-sdk)

PHP SDK for Eversend payments API

## Table of Contents

1. [Installation](#installation)
2. [Initialization](#initialization)
3. [Usage](#usage)
4. [Contribution Guidelines](#contribution-guidelines)
5. [License](#license)

## Installation

```bash
composer require eversend/eversend-php-sdk
```

## Initialization

```php
use Eversend\Eversend;

$eversend = new Eversend([
    'client_id' => 'your_client_id',
    'client_secret' => 'your_client_secret',
    'version' => 1
]);
```

You can get your client_id and client_secret from the settings section in the [dashboard](https://business.eversend.co/settings)

## Usage

### Wallets

**Get all wallets**
```php
$wallets = $eversend->wallets->list();
```

**Get one wallet**
```php
$usdWallet = $eversend->wallets->get('USD');
```

### Transactions

**Get all transactions**
```php
$transactions = $eversend->transactions->list([
    'page' => 1,
    'limit' => 10
]);
```

**Get one transaction**
```php
$transaction = $eversend->transactions->get('EVS12345678');
```

### Exchange

**Get exchange quotation**
```php
$quotation = $eversend->exchange->createQuotation([
    'from' => 'USD',
    'to' => 'UGX',
    'amount' => 10.0
]);
```

**Exchange currency**
```php
$exchange = $eversend->exchange->createExchange([
    'token' => 'dhhsggajjshhdhdhd',
    'transaction_ref' => 'EVS-12345678' // optional
]);
```

### Beneficiaries

**Get beneficiaries**
```php
$beneficiaries = $eversend->beneficiaries->list([
    'page' => 1,
    'limit' => 10
]);
```

**Search beneficiaries**
```php
$beneficiaries = $eversend->beneficiaries->list([
    'search' => 'Okello',
    'page' => 1,
    'limit' => 10
]);
```

**Get single beneficiary**
```php
$beneficiary = $eversend->beneficiaries->get(100);
```

**Create a beneficiary**
```php
$beneficiary = $eversend->beneficiaries->create([
    'first_name' => 'John',
    'last_name' => 'Okello',
    'country' => 'UG', // Alpha-2 country code
    'phone_number' => '+256712345678', // Should be in international format
    'bank_account_name' => 'John Okello',
    'bank_account_number' => '12345678',
    'bank_name' => 'Stanbic Bank',
    'bank_code' => 1234 // Get bank code from payouts->getDeliveryBanks()
]);
```

> Note: All bank fields are optional if bank payments will not be required

**Update a beneficiary**
```php
$beneficiary = $eversend->beneficiaries->update(100, [
    'first_name' => 'John',
    'last_name' => 'Okello',
    'country' => 'UG',
    'phone_number' => '+256712345678',
    'bank_account_name' => 'John Okello',
    'bank_account_number' => '12345678',
    'bank_name' => 'Stanbic Bank',
    'bank_code' => 1234
]);
```

**Delete a beneficiary**
```php
$eversend->beneficiaries->delete(100);
```

### Collections

**Get collection fees**
```php
$collectionFees = $eversend->collections->getFees([
    'amount' => 1000,
    'currency' => 'KES',
    'method' => 'momo'
]);
```

**Get collection OTP**
```php
$collectionOTP = $eversend->collections->getOTP([
    'phone' => '+256712345678'
]);
```

**Initiate Mobile Money collection**
```php
$eversend->collections->initiateMomo([
    'phone' => '+256712345678',
    'amount' => 1000,
    'country' => 'UG',
    'currency' => 'UGX',
    'pin' => 123456, // From phone number passed in Get Collection OTP
    'pin_id' => 'dg524fhsgfde', // From Get Collection OTP
    'transaction_ref' => 'EVS-12345678', // Optional
    'customer' => [
        'name' => 'John Okello'
    ] // Optional customer metadata
]);
```

### Payouts

**Get payout quotation**
```php
$quotation = $eversend->payouts->getQuotation([
    'amount' => 100,
    'amount_type' => 'SOURCE', // Can be SOURCE or DESTINATION
    'source_wallet' => 'USD',
    'destination_country' => 'KE',
    'destination_currency' => 'KES'
]);
```

> Note: amount_type determines whether the amount represents source_wallet (SOURCE) or destination_currency (DESTINATION)

**Pay existing beneficiary**
```php
$payout = $eversend->payouts->initiate([
    'beneficiary_id' => 100,
    'quotation_token' => 'token',
    'transaction_ref' => 'EVS-12345678' // Optional
]);
```

**Pay new beneficiary**
```php
$payout = $eversend->payouts->initiate([
    'first_name' => 'John',
    'last_name' => 'Okello',
    'country' => 'UG',
    'phone_number' => '+256712345678',
    'bank_account_name' => 'John Okello',
    'bank_account_number' => '12345678',
    'bank_name' => 'Stanbic Bank',
    'bank_code' => 1234,
    'quotation_token' => 'token',
    'transaction_ref' => 'EVS-12345678' // Optional
]);
```

**Get delivery countries**
```php
$countries = $eversend->payouts->getDeliveryCountries();
```

**Get delivery banks**
```php
$banks = $eversend->payouts->getDeliveryBanks('UG');
```

## Contribution Guidelines

Contributions are welcome and encouraged. Learn more about our contribution guidelines [here](/CONTRIBUTING.md)

## License

MIT © [Eversend]()