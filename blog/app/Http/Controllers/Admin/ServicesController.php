<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Banner;
use App\Models\Package;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\EditServiceRequest;
use Illuminate\Support\Facades\Storage;
use File;
class ServicesController extends Controller
{
    public function index(){
    	// $data = DB::table('services')
     //        ->join('banners', 'services.banner_id', '=', 'banners.id')
     //        ->select('services.*', 'banners.name')
     //        ->paginate(2);
        $data = Service::paginate(2);

         return view('admin.service.index', compact('data'));
         
    }

    public function showFormEdit($id){
    	$data = Service::find($id);
    	$package = Package::all();
    	return view('admin.service.edit', compact('data', 'package'));
    }

    public function Update($id, EditServiceRequest $request)
    {
    	$titlePd = $request->title_pa;
    	$icon = $request->image;
        $title_child = $request->title_child;
        $package_id = $request->package_id;
    	$contentPd = $request->content;
        // $banner_id = $request->banner_id;
    	$checkUpload = false;
        // $namefile = '';
        // dd($request->file('image'));
        if($request->hasFile('image')){
            $file = $request->file('image');
            // lay ten file
            $icon = $file->getClientOriginalName();

            if($file->getError() == 0){
                // upload
                if($file->move(public_path('uploads/images/'),$icon)){
                    $checkUpload = true;
                }
            }
        }
        if(!$checkUpload && $namefile == ''){
            dd('that bai');
            // $request->session()->flash('errUpload', 'Vui long chon file upload');
            // return redirect()->route('admin.service.dashboard',['state'=>'fail']);
        } else {
            // insert data
            $dataUp = [
                'title' => $titlePd,
                'content' => $contentPd,
                'icon' => $icon,
                'title_child' => $title_child,
                'packageid' => $package_id,
                // 'banner_id' => $banner_id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null
            ];
            // dd($dataInsert);
            // die();
            if(DB::table('services')->where('id', $id)->update($dataUp)){
                // dd('thanh cong');
                return redirect()->route('admin.service.dashboard')->with('message', 'Sửa thành công');
            } else {
                // dd('that bai');
                return redirect()->route('admin.service.dashboard')->with('fail', 'Thêm mới thất bại');
            }
        }
    	
    }
    public function addService()
    {
        $banner = Banner::all();
        $package = Package::all();
        return view('admin.service.add', compact('package', 'banner'));
    }

    public function add(Request $request){
       $titlePd = $request->title_pa;
        $icon = $request->image;
        $title_child = $request->title_child;
        $package_id = $request->package_id;
        $contentPd = $request->content;
        $banner_id = $request->banner_id;
        $title_id = $request->title_id;
        $checkUpload = false;
        $namefile = '';
        // dd($request->file('image'));
        if($request->hasFile('image')){
            $file = $request->file('image');
            // lay ten file
            $namefile = $file->getClientOriginalName();

            if($file->getError() == 0){
                // upload
                if($file->move(public_path('uploads/images/'),$namefile)){
                    $checkUpload = true;
                }
            }
        }
        if(!$checkUpload && $namefile == ''){
            dd('that bai');
            // $request->session()->flash('errUpload', 'Vui long chon file upload');
            // return redirect()->route('admin.service.dashboard',['state'=>'fail']);
        } else {
            // insert data
            $dataInsert = [
                'title' => $titlePd,
                'content' => $contentPd,
                'icon' => $namefile,
                'title_child' => $title_child,
                'packageid' => $package_id,
                'titleid'  =>$title_id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null
            ];
            // dd($dataInsert);
            // die();
            if(DB::table('services')->insert($dataInsert)){
                // dd('thanh cong');
                return redirect()->route('admin.service.dashboard')->with('message', 'Them thành công');
            } else {
                // dd('that bai');
                return redirect()->route('admin.service.dashboard')->with('fail', 'Thêm mới thất bại');
            }
        }
    }
    public function destroy($id){
        $delete = Service::find($id);
        $image= $delete->icon;
        $file_path = public_path().'/uploads/images/'.$image;
        if ($delete->delete()&& unlink($file_path)) {
            
            return redirect()->back()->with('message', 'Đã xóa thành công');
            }
        else{
            return view('admin.page.dashboard')->with('fail', 'Thêm mới thất bại');
        }
    }
}
