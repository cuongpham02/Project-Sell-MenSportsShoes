<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Brand\CreateBrandRequest;
use App\Repositories\Admin\Brand\BrandRepository;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BrandController extends Controller
{
    /**
     * @var RoleRepository
     */
    protected $repository;

    /**
     * RolesController constructor.
     *
     * @param BrandRepository $repository
     */
    public function __construct(BrandRepository $repository)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('search')) {
            $all_brand=Brand::where('name', 'like', '%'.request('search').'%')->paginate(20);
        } else {
            $all_brand=Brand::orderBy('id','DESC')->paginate(6);
        }
        return view('Admin.brand.show_all_brand')->with(compact('all_brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Brand.create');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBrandRequest $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  RoleUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update()
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function delete()
    {

    }

    /**
     * Display a listing of soft delete.
     *
     * @return \Illuminate\Http\Response
     */
    public function listSoftDelete()
    {

    }

    /**
     * Restore of soft delete.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {

    }

    /**
     * Force delete of soft-delete.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function forceDelete($id)
    {

    }
}
