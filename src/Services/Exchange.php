<?php

namespace Eversend\Services;

use Eversend\Common\ApiClient;

class Exchange extends ApiClient
{
    public function createQuotation(string $from, string $to, float $amount)
    {
        $data = [
            'from' => $from,
            'to' => $to,
            'amount' => $amount,
        ];
        return $this->_create('exchanges/quotation', $data);
    }

    public function createExchange(string $token, string $transactionRef = null)
    {
        $data = [
            'token' => $token,
        ];
        if (!empty($transactionRef)) $data['transactionRef'] = $transactionRef;
        return $this->_create('exchanges', $data);
    }

}
