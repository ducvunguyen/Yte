<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Http\Requests\AddBannerRequest;
use App\Http\Requests\EditBannerRequest;
use Illuminate\Support\Facades\DB;
class BannerController extends Controller
{
    public function index(){
        $data = Banner::paginate(1);

         return view('admin.banner.index', compact('data'));
         
    }

    public function showFormEdit($id){
    	$data = Banner::find($id);
    	return view('admin.banner.edit', compact('data'));
    }

    public function Update($id, EditBannerRequest $request)
    {
         $find = Partner::find($id);
        $image= $find->image;
        $file_path = public_path().'/uploads/banners/'.$image;

    	$name = $request->name;
        $image = $request->image;
        $checkUpload = false;
        $namefile = '';
        // dd($request->file('image'));
        if($request->hasFile('image')){
            $file = $request->file('image');
            // lay ten file
            $namefile = $file->getClientOriginalName();

            if($file->getError() == 0){
                // upload
                if($file->move(public_path('uploads/banners/'),$namefile)){
                    $checkUpload = true;
                }
            }
        }

        if(!$checkUpload && $namefile == ''){
            
            return redirect()->route('admin.banner.dashboard')->with('fail', 'Moi chon lai file');
        } else {
            // insert data
            $dataInsert = [
                'name' => $name,
                'image' => $namefile,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
            ];
          
            if(DB::table('banners')->where('id', $id)->update($dataInsert)){
                // dd('thanh cong');
                return redirect()->route('admin.banner.dashboard')->with('message', 'Them thành công');
            } else {
                return redirect()->route('admin.banner.addBanner')->with('fail', 'Thêm mới thất bại');
            }
        }
    	
    }
    public function addAbout()
    {
        return view('admin.banner.add');
    }

    public function add(AddBannerRequest $request){
       $name = $request->name;
        $image = $request->image;
        $checkUpload = false;
        $namefile = '';
        // dd($request->file('image'));
        if($request->hasFile('image')){
            $file = $request->file('image');
            // lay ten file
            $namefile = $file->getClientOriginalName();

            if($file->getError() == 0){
                // upload
                if($file->move(public_path('uploads/banners/'),$namefile)){
                    $checkUpload = true;
                }
            }
        }

        if(!$checkUpload && $namefile == ''){
            
            return redirect()->route('admin.banner.dashboard')->with('fail', 'Moi chon lai file');
        } else {
            // insert data
            $dataInsert = [
                'name' => $name,
                'image' => $namefile,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
            ];
          
            if(DB::table('banners')->insert($dataInsert)){
                // dd('thanh cong');
                return redirect()->route('admin.banner.dashboard')->with('message', 'Them thành công');
            } else {
                return redirect()->route('admin.banner.addBanner')->with('fail', 'Thêm mới thất bại');
            }
        }
    }
    public function destroy($id){
        $delete = Banner::find($id);
        $image= $delete->image;
        $file_path = public_path().'/uploads/banners/'.$image;
        if ($delete->delete()&& unlink($file_path)) {
            
            return redirect()->back()->with('message', 'Đã xóa thành công');
            }
        else{
            return view('admin.page.dashboard')->with('fail', 'Thêm mới thất bại');
        }
    }
}
