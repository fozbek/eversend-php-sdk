<?
namespace Eversend\Services;

use Eversend\Common\ApiClient;

class Beneficiaries extends ApiClient
{
    public static function list(int $limit = 10, int $page = 1, string $search = null)
    {
        $params = [
            'limit' => $limit,
            'page'  => $page,
        ];
        if (!empty($search)) $params['search'] = $search;
        return $this->_read('beneficiaries', $params);
    }

    public static function get(int $beneficiaryId)
    {
        return $this->_read('beneficiaries/' . $beneficiaryId);
    }

    public static function create(array $data)
    {
        return $this->_create('beneficiaries', $data);
    }

    public static function delete(int $beneficiaryId)
    {
        return $this->_delete()('beneficiaries/' . $beneficiaryId);
    }
}
