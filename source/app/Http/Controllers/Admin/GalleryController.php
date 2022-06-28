<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Gallery;
use Illuminate\Support\Facades\Redirect;
use Session;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        //
    }
    public function gallery_product($id){
        $pro_id = $id;
        return view('Admin.image.product_image')->with(compact('pro_id'));

    }
    public function update_gallery_name(Request $request){
        $gal_id = $request->gal_id;
        $gal_text = $request->gal_text;
        $gallery = Gallery::find($gal_id);
        $gallery->gallery_name = $gal_text;
        $gallery->save();
    }
    public function insert_gallery(Request $request,$pro_id){
        $get_image = $request->file('file');

        if($get_image){
            foreach($get_image as $image){
                $get_name_image = $image->getClientOriginalName();
                $name_image = current(explode('.',$get_name_image));
                $new_image =  $name_image.rand(0,99).'.'.$image->getClientOriginalExtension();
                $image->move('public/upload/gallery',$new_image);
                $gallery = new Gallery();
                $gallery->gallery_name = $new_image;
                $gallery->gallery_image = $new_image;
                $gallery->product_id = $pro_id;
                $gallery->save();
            }
            Session::put('message','Thêm thư viện ảnh thành công');
        }else{
            Session::put('message','Chưa có ảnh tải lên');
        }

        return redirect()->back();

    }
    public function delete_gallery(Request $request){
        $gal_id = $request->gal_id;
        $gallery = Gallery::find($gal_id);
        unlink('public/upload/gallery/'.$gallery->gallery_image);
        $gallery->delete();
    }
    public function update_gallery(Request $request){
        $get_image = $request->file('file');
        $gal_id = $request->gal_id;
        if($get_image){
                $gallery = Gallery::find($gal_id);
                unlink('public/upload/gallery/'.$gallery->gallery_image);
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode('.',$get_name_image));
                $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                $get_image->move('public/upload/gallery',$new_image);
                $gallery->gallery_image = $new_image;
                $gallery->save();

        }
    }
    public function load_gallery(Request $request){
        $product_id = $request->pro_id;
        $gallery = Gallery::where('product_id',$product_id)->get();
        $gallery_count = $gallery->count();
        $output = ' <form>
                        '.csrf_field().'

                        <table class="table table-hover">
                                    <thead>
                                      <tr>
                                        <th>Thứ tự</th>
                                        <th>Tên hình ảnh</th>
                                        <th>Hình ảnh</th>
                                        <th>Quản lý</th>
                                      </tr>
                        </thead>
                        <tbody>
        ';
        if($gallery_count>0){
            $i = 0;
            foreach($gallery as $key => $gal){
                $i++;
                $output.='
                    <tr>
                        <td>'.$i.'</td>
                        <td contenteditable class="edit_gal_name" data-gal_id="'.$gal->id.'">'.$gal->gallery_name.'</td>
                        <td>

                        <img src="'.url('public/upload/gallery/'.$gal->gallery_image).'" class="img-thumbnail" width="120" height="120">

                        <input type="file" class="file_image" style="width:40%" data-gal_id="'.$gal->id.'" id="file-'.$gal->id.'" name="file" accept="image/*" />

                        </td>
                        <td>
                            <button type="button" data-gal_id="'.$gal->id.'" class="btn btn-xs btn-danger delete-gallery">Xóa</button>
                        </td>
                    </tr>
                ';
            }
        }else{
            $output.='
                    <tr>
                       <td colspan="4">Sản phẩm chưa có thư viện ảnh</td>

                    </tr>
                ';
        }
        $output.='
                     </tbody>
                     </table>
                     </form>
                ';
        echo $output;
    }
}
