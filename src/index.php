<?
require_once __DIR__ . '/../vendor/autoload.php';

use Common\Constants;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

function getV1Client()
{
    return new Client(['base_uri' => Constants::V1_URL]);
}

function handleResponse(Response $response)
{
    return json_decode($response->getBody());
}
