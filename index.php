<?

use v1\Authentication;
use v1\Collections;

require_once __DIR__ . '/vendor/autoload.php';

$response = Authentication::getToken('QwZmJ5dJi9CXc6e6f0XWu7SzuL1IOrSV', 'jxzh8gxd0CRwjdEndRLalJparpnaf2g6vb5Qa2aHb9SB0kcWRzWFclqId6R16KDA');

// $response2 = Wallets::getWallets($response->token);

// $response3 = Wallets::getWallet($response->token, 'UGX');

//$response4 = Exchange::createQuotation($response->token, 'KES', 'UGX', 100);
//var_dump($response4);
// test  createExchange here

//$response5 = Transactions::getTransactions($response->token);
//$response6 = Transactions::getTransaction($response->token, 'BE381652809942648');

// $response7 = Payouts::getDeliveryBanks($response->token, 'KE');
// var_dump($response7);

// $response8 = Payouts::getDeliveryCountries($response->token);
// var_dump($response8);

$response9 = Collections::getCollectionFees($response->token, 'momo', 'UGX', 1000);
var_dump($response9);
