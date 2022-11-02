<?
namespace v1;
require_once __DIR__ . '/../../vendor/autoload.php';

use Authentication;

class Wallets
{
    public static function list()
    {
        $client = getV1Client();

        $response = $client->get('wallets', [
            'headers' => [
                'Authorization' => 'Bearer ' . new Authentication().getToken(),
            ],
        ]);

        return handleResponse($response);
    }

    public static function get(string $walletId)
    {   
        $client = getV1Client();

        $response = $client->get('wallets/' . $walletId, [
            'headers' => [
                'Authorization' => 'Bearer ' . new Authentication().getToken(),
            ],
        ]);

        return handleResponse($response);
    }
}