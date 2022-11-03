<?php

namespace Eversend;

use Eversend\Services\Beneficiaries;
use Eversend\Services\Collections;
use Eversend\Services\Crypto;
use Eversend\Services\Exchange;
use Eversend\Services\Transactions;
use Eversend\Services\Wallets;

class Eversend
{
    private $clientId;
    private $clientSecret;
    private $version;

    public function __construct(string $clientId, string $clientSecret, int $version = 1)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->version = $version;
    }

    public function wallets(): Wallets
    {
        return new Wallets(
            $this->clientId,
            $this->clientSecret,
            $this->version
        );
    }

    public function beneficiaries(): Beneficiaries
    {
        return new Beneficiaries(
            $this->clientId,
            $this->clientSecret,
            $this->version
        );
    }

    public function transactions(): Transactions
    {
        return new Transactions(
            $this->clientId,
            $this->clientSecret,
            $this->version
        );
    }

    public function exchange(): Exchange
    {
        return new Exchange(
            $this->clientId,
            $this->clientSecret,
            $this->version
        );
    }

    public function collections(): Collections
    {
        return new Collections(
            $this->clientId,
            $this->clientSecret,
            $this->version
        );
    }

    public function crypto(): Crypto
    {
        return new Crypto(
            $this->clientId,
            $this->clientSecret,
            $this->version
        );
    }
}
