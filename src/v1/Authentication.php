<?

namespace v1;

require_once __DIR__ . '/../../vendor/autoload.php';

class Authentication
{
    public static function getToken(string $clientId, string $clientSecret)
    {
        $client = getV1Client();

        $response = $client->get('auth/token', ['headers' => [
            'clientId' => $clientId,
            'clientSecret' => $clientSecret,
        ]]);

        return handleResponse($response);
    }
}