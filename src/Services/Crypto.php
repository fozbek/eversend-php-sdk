<?
namespace Eversend\Services;

use Eversend\Common\ApiClient;

class Crypto extends ApiClient
{
    public static function listTransactions(int $limit = 10, int $page = 1)
    {
        $params = [
            'limit' => $limit,
            'page'  => $page,
        ];
        return $this->_read('crypto/transactions', $params);
    }

    public static function listAddresses(int $limit = 10, int $page = 1)
    {
        $params = [
            'limit' => $limit,
            'page'  => $page,
        ];
        return $this->_read('crypto/addresses', $params);
    }

    public static function getAssetChains(int $coin)
    {
        return $this->_read('crypto/assets/' . $coin);
    }

    public static function createAddress(
        string $assetId, string $ownerName, $destinationAddressDescription, $purpose)
    {
        $data = [
            'assetId' => $assetId,
            'ownerName'  => $ownerName,
            'destinationAddressDescription' => $destinationAddressDescription,
            'purpose'  => $purpose,
        ];
        return $this->_create('crypto/addresses', $data);
    }
}
