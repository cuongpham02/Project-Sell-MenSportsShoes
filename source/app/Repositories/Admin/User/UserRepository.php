<?php

namespace App\Repositories\Admin\User;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface UserRepository.
 *
 * @package namespace App\Repositories\User;
 */
interface UserRepository extends RepositoryInterface
{
    public function getAllUsers($limit = null, $filter = null);
    public function getSoftDeleteUsers();
}
