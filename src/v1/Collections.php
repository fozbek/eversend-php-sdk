<?
namespace v1;

require_once __DIR__ . '/../../vendor/autoload.php';

class Collections
{
    public static function getCollectionFees(string $token, string $method, string $currency, float $amount)
    {
        $client = getV1Client();

        $response = $client->post('collections/fees', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ],
            'json' => [
                'method' => $method,
                'currency' => $currency,
                'amount' => $amount,
            ],
        ]);

        return handleResponse($response);
    }

    public static function mobileMoneyCollection(string $token, string $country, string $currency, float $amount, string $phone, $customer, $transactionRef)
    {
        $client = getV1Client();

        $response = $client->post('collections/momo', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ],
            'json' => [
                'phone' => $phone,
                'customer' => $customer,
                'amount' => $amount,
                'transactionRef' => $transactionRef,
                'country' => $country,
                'currency' => $currency,
            ],
        ]);

        return handleResponse($response);
    }

}