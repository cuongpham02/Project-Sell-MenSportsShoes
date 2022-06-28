<?php

namespace App\Repositories\Admin\Role;

use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Role\Role;

/**
 * Class RoleRepositoryEloquent.s
 *
 * @package namespace App\Repositories\Role;
 */
class RoleRepositoryEloquent extends BaseRepository implements RoleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Role::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Get Roles SoftDelete;
     * @return mixed
     */
    public function getSoftDeleteRoles()
    {
        $roles = $this->model->onlyTrashed();

        return $roles;
    }

    /**
     * @param array|null $attributes
     * @return void
     */
    public function getAllRoles(array $attributes = null)
    {
        // viết hàm getallroles
        // TODO: Implement getAllRoles() method.
    }

    /**
     * @param array $filter
     * @return $this
     */
    private function withFilter(array $filter = [])
    {
        if (isset($filter['search_company_name'])) {
            $this->model = $this->model->where(function (Builder $query) use ($filter) {
                $query->where('company_name', 'LIKE', "%{$filter['search_company_name']}%");
            });
        }

        if (isset($filter['search_phone_number'])) {
            $this->model = $this->model->where(function (Builder $query) use ($filter) {
                $query->where('phone_number', 'LIKE', "%{$filter['search_phone_number']}%");
            });
        }

        if (isset($filter['sort_by']) && isset($filter['order_by'])) {
            $sort = ['desc', 'asc'];
            if (!in_array($filter['order_by'], $sort)) {
                $filter['order_by'] = 'asc';
            }

            $this->model = $this->model->orderBy($filter['sort_by'], $filter['order_by']);
        }

        return $this;
    }

}
