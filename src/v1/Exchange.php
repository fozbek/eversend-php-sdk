<?
namespace v1;

require_once __DIR__ . '/../../vendor/autoload.php';

class Exchange
{
    public static function createQuotation(string $token, string $from, string $to, float $amount)
    {
        $client = getV1Client();

        $response = $client->post('exchanges/quotation', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ],
            'json' => [
                'from' => $from,
                'to' => $to,
                'amount' => $amount,
            ],
        ]);

        return handleResponse($response);
    }

    public static function createExchange(string $token, string $exchangeToken, string $transactionRef = '')
    {
        $client = getV1Client();

        $response = $client->post('exchanges', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ],
            'json' => [
                'token' => $exchangeToken,
                'transactionRef' => $transactionRef,
            ],
        ]);

        return handleResponse($response);
    }

}