<?
namespace Eversend\Services;

use Eversend\Common\ApiClient;

class Wallets extends ApiClient
{
    public static function list()
    {
        return $this->_read('wallets');
    }

    public static function get(string $walletId)
    {
        return $this->_read('wallets/' . $walletId);
    }
}
