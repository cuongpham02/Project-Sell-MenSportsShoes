<?php

namespace App\Repositories\Admin\Role;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface RoleRepository.
 *
 * @package namespace App\Repositories\Role;
 */
interface RoleRepository extends RepositoryInterface
{
    public function getAllRoles($limit = null, array $filter = null);
    public function getSoftDeleteRoles();
}
