<?php

namespace Eversend\Services;

use Eversend\Common\ApiClient;

require_once __DIR__ . '/../../vendor/autoload.php';

class Payouts extends ApiClient
{
    public function getQuotation(
        string $sourceWallet,
        float $amount,
        string $type,
        string $destinationCountry,
        string $destinationCurrency,
        string $amountType)
    {
        $data = [
            'type' => $type,
            'amount' => $amount,
            'sourceWallet' => $sourceWallet,
            'destinationCountry' => $destinationCountry,
            'destinationCurrency' => $destinationCurrency,
            'amountType' => $amountType,
        ];
        return $this->_create('payouts/quotation', $data);
    }

    public function initiate(
        string $quotationToken,
        string $beneficiaryId,
        string $firstName,
        string $lastName,
        string $phoneNumber,
        string $bankName,
        string $bankAccountName,
        string $bankCode,
        string $bankAccountNumber,
        string $country,
        string $transactionRef
    ) {
        $data = [
            'token' => $quotationToken,
        ];
        if (!empty($beneficiaryId)) $data['beneficiaryId'] = $beneficiaryId;
        if (!empty($firstName)) $data['firstName'] = $firstName;
        if (!empty($lastName)) $data['lastName'] = $lastName;
        if (!empty($phoneNumber)) $data['phoneNumber'] = $phoneNumber;
        if (!empty($country)) $data['country'] = $country;
        if (!empty($bankName)) $data['bankName'] = $bankName;
        if (!empty($bankAccountName)) $data['bankAccountName'] = $bankAccountName;
        if (!empty($bankAccountNumber)) $data['bankAccountNumber'] = $bankAccountNumber;
        if (!empty($bankCode)) $data['bankCode'] = $bankCode;
        if (!empty($transactionRef)) $data['transactionRef'] = $transactionRef;
        return $this->_create('payouts', $data);
    }

    public function countries()
    {
        return $this->_read('payouts/countries');
    }

    public function banks(string $country)
    {
        return $this->_read('payouts/banks/' . $country);
    }

}