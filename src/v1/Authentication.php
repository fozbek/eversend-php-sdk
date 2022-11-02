<?

namespace v1;

require_once __DIR__ . '/../../vendor/autoload.php';
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

$cache = new FilesystemAdapter();

class Authentication
{
    public static function getToken(string $clientId, string $clientSecret)
    {
        $cache->get('TOKEN', function (ItemInterface $item) {
            $item->expiresAfter(3600);
        
            $client = getV1Client();

            $response = $client->get('auth/token', ['headers' => [
                'clientId' => $clientId,
                'clientSecret' => $clientSecret,
            ]]);
        
            return handleResponse($response)['data']['token'];
        });
    }
}