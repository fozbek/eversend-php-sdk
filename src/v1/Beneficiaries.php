<?
namespace v1;

require_once __DIR__ . '/../../vendor/autoload.php';

class Beneficiaries
{
    public static function getBeneficiaries(string $token, $limit, $page, $type, $search)
    {
        $client = getV1Client();

        $response = $client->get('beneficiaries', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ],
        ]);

        return handleResponse($response);

    }

    public static function getBeneficiary(string $token, $beneficiaryId)
    {
        $client = getV1Client();

        $response = $client->get('beneficiaries/' . $beneficiaryId, [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ],
        ]);

        return handleResponse($response);

    }
}