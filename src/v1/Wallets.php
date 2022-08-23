<?
namespace v1;

require_once __DIR__ . '/../../vendor/autoload.php';

class Wallets
{
    public static function getWallets(string $token)
    {
        $client = getV1Client();

        $response = $client->get('wallets', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ],
        ]);

        return handleResponse($response);
    }

    public static function getWallet(string $token, string $walletId)
    {
        $client = getV1Client();

        $response = $client->get('wallets/' . $walletId, [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ],
        ]);

        return handleResponse($response);
    }
}