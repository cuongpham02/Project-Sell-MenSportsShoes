<?php

namespace App\Repositories\Admin\Brand;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Admin\Brand\BrandRepository;
use App\Entities\Admin\Brand\Brand;
use App\Validators\Admin\Brand\BrandValidator;

/**
 * Class BrandRepositoryEloquent.
 *
 * @package namespace App\Repositories\Admin\Brand;
 */
class BrandRepositoryEloquent extends BaseRepository implements BrandRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Brand::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
