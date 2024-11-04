<?php

namespace Eversend\Services;

use Eversend\Common\ApiClient;

class Wallets extends ApiClient
{
    public function list()
    {
        return $this->_read('wallets');
    }

    public function get(string $walletId)
    {
        return $this->_read('wallets/' . $walletId);
    }
}
