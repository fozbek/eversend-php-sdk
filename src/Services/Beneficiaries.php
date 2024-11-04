<?php

namespace Eversend\Services;

use Eversend\Common\ApiClient;

class Beneficiaries extends ApiClient
{
    public function list(int $limit = 10, int $page = 1, string $search = null)
    {
        $params = [
            'limit' => $limit,
            'page' => $page,
        ];
        if (!empty($search)) $params['search'] = $search;
        return $this->_read('beneficiaries', $params);
    }

    public function get(int $beneficiaryId)
    {
        return $this->_read('beneficiaries/' . $beneficiaryId);
    }

    public function create(
        string $firstName,
        string $lastName,
        string $country,
        string $phoneNumber,
        string $bankAccountName,
        string $bankAccountNumber,
        string $bankName,
        string $bankCode
    )
    {
        $data = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'country' => $country,
            'phoneNumber' => $phoneNumber,
        ];

        if (!empty($bankAccountName)) $data['bankAccountName'] = $bankAccountName;
        if (!empty($bankAccountNumber)) $data['bankAccountNumber'] = $bankAccountNumber;
        if (!empty($bankName)) $data['bankName'] = $bankName;
        if (!empty($bankCode)) $data['bankCode'] = $bankCode;

        return $this->_create('beneficiaries', [$data]);
    }

    public function update(
        string $beneficiaryId,
        string $firstName,
        string $lastName,
        string $country,
        string $phoneNumber,
        string $bankAccountName,
        string $bankAccountNumber,
        string $bankName,
        string $bankCode
    )
    {
        $data = [];

        if (!empty($firstName)) $data['firstName'] = $firstName;
        if (!empty($lastName)) $data['lastName'] = $lastName;
        if (!empty($country)) $data['country'] = $country;
        if (!empty($phoneNumber)) $data['phoneNumber'] = $phoneNumber;
        if (!empty($bankAccountName)) $data['bankAccountName'] = $bankAccountName;
        if (!empty($bankAccountNumber)) $data['bankAccountNumber'] = $bankAccountNumber;
        if (!empty($bankName)) $data['bankName'] = $bankName;
        if (!empty($bankCode)) $data['bankCode'] = $bankCode;

        return $this->_update('beneficiaries/' . $beneficiaryId, [$data]);
    }

    public function delete(int $beneficiaryId)
    {
        return $this->_delete('beneficiaries/' . $beneficiaryId);
    }
}
