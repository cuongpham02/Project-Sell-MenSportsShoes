
@extends('Admin.layouts_admin.admin_layout')
@section('admin_content')
    <div class="panel-heading">
        List Brand
    </div>
    </div>
    <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
            <a href="{{ route('admin.brands.create') }}" class="btn btn-sm btn-success">Create Brand</a>
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
            <form method="get">
                <div class="input-group">
                    <input type="text" class="input-sm form-control"  name="search" value="{{ request('search') }}" placeholder="Search">
                    <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="submit">Go!</button>
            </span>
                </div>
            </form>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped b-t b-light">
            <?php
            $message=Session::get('message');
            if ($message) {
                echo '<span class="textalert">'.$message.'</span>';
                Session::put('message',null);
            }
            $i=1;
            ?>
            <thead>
            <tr>
                <th style="width:20px;">
                    <label class="i-checks m-b-none">
                        STT
                    </label>
                </th>
                <th>Name</th>
                <th>Description</th>
                <th>Create</th>
                <th>Status</th>
                <th style="width:30px;"></th>
            </tr>
            </thead>
            <tbody>

            @foreach ($all_brand as $key => $brand_pro)
                <tr>
                    <td><?= $i++;?></td>
                    <td>{{$brand_pro->name}}</td>
                    <td>{!! $brand_pro->desc !!}</td>

                    <!-- ẩn hiện-status của thương hiệu(tạm chưa dùng đến)
            <td><span class="text-ellipsis">
              <?php
                    if ($brand_pro->brand_status == 0) {
                    ?>
                        <a href="{{URL::to('/unactive-brand-product/'.$brand_pro->brand_id)}}"><span class="fa fa-thumbs-up"></span></a>

              <?php  } else { ?>
                        <a href="{{URL::to('/active-brand-product/'.$brand_pro->brand_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
              <?php
                    }
                    ?>
                        </span></td> -->

                    <td><span class="text-ellipsis">{{ $brand_pro->created_at }}</span></td>
                    <td></td>
                    <!-- Sửa và Xóa -->
                    <td>
                        <a href="{{URL::to('/Admin/brand/edit-brand/'.$brand_pro->id)}}" class="active" ui-toggle-class="">
                            <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                        <a onclick="return confirm('Bạn muốn xóa thương hiệu này?')" href="{{URL::to('/Admin/brand/delete-brand/'.$brand_pro->id)}}">
                            <i class="fa fa-times text-danger text"></i></a>
                    </td>
                    <!-- end Sửa và Xóa -->
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <footer class="panel-footer">
        <div class="row">

            <div class="col-sm-5 text-center">
            </div>
            <div class="col-sm-7 text-right text-center-xs">
                {{ $all_brand->links() }}
            </div>
        </div>
    </footer>
    </div>
    </div>

@endsection
