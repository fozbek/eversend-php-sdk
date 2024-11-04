<?php

namespace Eversend\Services;

use Eversend\Common\ApiClient;

class Transactions extends ApiClient
{
    public function list(
        int $limit = 10, int $page = 1, string $search = null, string $range = null,
            $from = null, $to = null, $type = null, $currency = null, $status = null
    )
    {
        $params = [
            'limit' => $limit,
            'page' => $page,
        ];
        if (!empty($search)) {
            $params['search'] = $search;
        }
        if (!empty($range)) {
            $params['range'] = $range;
        }
        if (!empty($from)) {
            $params['from'] = $from;
        }
        if (!empty($to)) {
            $params['to'] = $to;
        }
        if (!empty($type)) {
            $params['type'] = $type;
        }
        if (!empty($currency)) {
            $params['currency'] = $currency;
        }
        if (!empty($status)) {
            $params['status'] = $status;
        }

        return $this->_read('transactions', $params);
    }

    public function get(int $transactionId)
    {
        return $this->_read('transactions/' . $transactionId);
    }
}