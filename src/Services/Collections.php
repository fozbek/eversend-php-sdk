<?
namespace Eversend\Services;

use Eversend\Common\ApiClient;

require_once __DIR__ . '/../../vendor/autoload.php';

class Collections extends ApiClient
{
    public static function getFees(string $method, string $currency, float $amount)
    {
        $data = [
            'method' => $method,
            'currency' => $currency,
            'amount' => $amount,
        ];
        return $this->_create('collections/fees', $data);
    }

    public static function getOTP(
        string $phone)
    {
        $data = [
            'phone' => $phone
        ];
        return $this->_create('collections/otp', $data);
    }

    public static function initiateMomo(
        string $country, string $currency, float $amount, string $phone, string $pinId, string $pin, $customer = null, $transactionRef = null)
    {
        $data = [
            'phone' => $phone,
                'amount' => $amount,
                'country' => $country,
                'currency' => $currency,
        ];
        if (!empty($customer)) $data['customer'] = $customer;
        if (!empty($transactionRef)) $data['transactionRef'] = $transactionRef;
        if (!empty($pinId) && !empty($pin)) $data['otp'] = ['pinId' => $pinId, 'pin' => $pin];
        return $this->_create('collections/momo', $data);
    }

}