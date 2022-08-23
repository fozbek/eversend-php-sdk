<?
namespace v1;

require_once __DIR__ . '/../../vendor/autoload.php';

class Transactions
{
    public static function getTransactions(string $token, string $search = '',
        string $range = '', int $limit = 10, int $page = 1, $from = '', $to = '', $type = '', $currency = '', $status = ''
    ) {
        $client = getV1Client();

        $response = $client->get('transactions', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ],
        ]);

        return handleResponse($response);
    }

    public static function getTransaction(string $token, string $transactionId)
    {
        $client = getV1Client();

        $response = $client->get('transactions/' . $transactionId, [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ],
        ]);

        return handleResponse($response);
    }
}