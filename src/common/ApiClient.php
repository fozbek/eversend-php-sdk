<?

namespace Eversend\Common;

require_once __DIR__ . '/../../vendor/autoload.php';
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Common\Constants;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class ApiClient
{
    private $cache;
    private $clientId;
    private $clientSecret;
    private $version;

    public function __construct(string $clientId, string $clientSecret, int $version)
    {
        $this->clientId     = $clientId;
        $this->clientSecret = $clientSecret;
        $this->version      = $version;
        $this->cache        = new FilesystemAdapter();
    }

    private function getClient()
    {
        return new Client(['base_uri' => Constants::BASE_URL . $this->version]);
    }

    private function handleResponse(Response $response)
    {
        return json_decode($response->getBody());
    }

    public static function getToken()
    {
        $this->cache->get('TOKEN', function (ItemInterface $item) {
            $item->expiresAfter(3600);
        
            $client = $this->getClient();

            $response = $client->get('auth/token', ['headers' => [
                'clientId' => $this->clientId,
                'clientSecret' => $this->clientSecret,
            ]]);
        
            return $this->handleResponse($response)['data']['token'];
        });
    }

    private function _read(string $url, array $params = null)
    {
        $client = $this->getClient();
        $token  = getToken();
        $config = [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ]
        ];
        if (!empty($params)) $config['query'] = $params;
        $response = $client->get($url, $config);
        return $this->handleResponse($response);
    }
    
    private function _create(string $url, array $data)
    {
        $client = $this->getClient();
        $token  = getToken();
        $response = $client->post($url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ],
            'json' => $data
        ]);
        return $this->handleResponse($response);
    }

    private function _update(string $url, array $data)
    {
        $client = $this->getClient();
        $token  = getToken();
        $response = $client->patch($url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ],
            'json' => $data
        ]);
        return $this->handleResponse($response);
    }

    private function _delete(string $url)
    {
        $client = $this->getClient();
        $token  = getToken();
        $response = $client->delete($url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ]
        ]);
        return $this->handleResponse($response);
    }
}
