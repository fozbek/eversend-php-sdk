<?
namespace Eversend\Services;

use Eversend\Common\ApiClient;

class Transactions extends ApiClient
{

    public static function list(
        int $limit = 10, int $page = 1, string $search = null, string $range = null,
        $from = null, $to = null, $type = null, $currency = null, $status = null
    ) {
        $params = [
            'limit' => $limit,
            'page'  => $page,
        ];
        if (!empty($search)) $params['search']      = $search;
        if (!empty($search)) $params['range']       = $range;
        if (!empty($search)) $params['from']        = $from;
        if (!empty($search)) $params['to']          = $to;
        if (!empty($search)) $params['type']        = $type;
        if (!empty($search)) $params['currency']    = $currency;
        if (!empty($search)) $params['status']      = $status;
        return $this->_read('transactions', $params);
    }

    public static function get(int $transactionId)
    {
        return $this->_read('transactions/' . $transactionId);
    }
}