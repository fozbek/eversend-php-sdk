<?
namespace v1;

require_once __DIR__ . '/../../vendor/autoload.php';

class Payouts
{
    public static function createQuotation(string $token, string $sourceWallet, float $amount, string $type, string $destinationCountry, string $destinationCurrency, string $amountType)
    {
        $client = getV1Client();

        $response = $client->post('payouts/quotation', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ],
            'json' => [
                'sourceWallet' => $sourceWallet,
                'type' => $type,
                'amount' => $amount,
                'destinationCountry' => $destinationCountry,
                'destinationCurrency' => $destinationCurrency,
                'amountType' => $amountType,
            ],
        ]);

        return handleResponse($response);
    }

    public static function createTransaction(
        string $token, string $quotationToken, $beneficiaryId,
        $firstName, $lastName, $phoneNumber, $bankName, $bankAccountName, $bankCode,
        $bankAccountNumber, $country, $transactionRef
    ) {
        $client = getV1Client();

        $response = $client->post('payouts', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ],
            'json' => [
                'token' => $quotationToken,
                'beneficiaryId' => $beneficiaryId,
                'firstName' => $firstName,
                'lastName' => $lastName,
                'phoneNumber' => $phoneNumber,
                'bankName' => $bankName,
                'bankAccountName' => $bankAccountName,
                'bankCode' => $bankCode,
                'bankAccountNumber' => $bankAccountNumber,
                'country' => $country,
                'transactionRef' => $transactionRef,
            ],
        ]);

        return handleResponse($response);
    }

    public static function getDeliveryCountries(string $token)
    {
        $client = getV1Client();

        $response = $client->get('payouts/countries', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ],
        ]);

        return handleResponse($response);

    }

    public static function getDeliveryBanks(string $token, string $countryCode)
    {
        $client = getV1Client();

        $response = $client->get('payouts/banks/' . $countryCode, [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ],
        ]);

        return handleResponse($response);

    }

}