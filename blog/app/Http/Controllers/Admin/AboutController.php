<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Http\Requests\AddAboutRequest;
use App\Http\Requests\EditAboutRequest;
use Illuminate\Support\Facades\DB;
class AboutController extends Controller
{
    public function index(){
    	// $data = DB::table('services')
     //        ->join('banners', 'services.banner_id', '=', 'banners.id')
     //        ->select('services.*', 'banners.name')
     //        ->paginate(2);
        $data = About::paginate(1);

         return view('admin.about.index', compact('data'));
         
    }

    public function showFormEdit($id){
    	$data = About::find($id);
    	return view('admin.about.edit', compact('data'));
    }

    public function Update($id, EditAboutRequest $request)
    {
    	$title = $request->title;
        $image = $request->image;
        $link = $request->link;
        $contentPd = $request->content;
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
            
            return redirect()->route('admin.about.dashboard')->with('fail', 'Moi chon lai file');
        } else {
            // insert data
            $update = [
                'title' => $title,
                'content' => $contentPd,
                'image' => $namefile,
                'links' => $link,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null
            ];
          
            if(DB::table('abouts')->where('id', $id)->update($update)){
                // dd('thanh cong');
                return redirect()->route('admin.about.dashboard')->with('message', 'Them thành công');
            } else {
                return redirect()->route('admin.about.edit')->with('fail', 'Thêm mới thất bại');
            }
        }
    	
    }
    public function addAbout()
    {
        return view('admin.about.add');
    }

    public function add(AddAboutRequest $request){
       $title = $request->title;
        $image = $request->image;
        $link = $request->link;
        $contentPd = $request->content;
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
            
            return redirect()->route('admin.about.dashboard')->with('fail', 'Moi chon lai file');
        } else {
            // insert data
            $dataInsert = [
                'title' => $title,
                'content' => $contentPd,
                'image' => $namefile,
                'links' => $link,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null
            ];
          
            if(DB::table('abouts')->insert($dataInsert)){
                // dd('thanh cong');
                return redirect()->route('admin.about.dashboard')->with('message', 'Them thành công');
            } else {
                return redirect()->route('admin.about.addAbout')->with('fail', 'Thêm mới thất bại');
            }
        }
    }
    public function destroy($id){
        $delete = About::find($id);
        $image= $delete->image;
        $file_path = public_path().'/uploads/images/'.$image;
        if ($delete->delete()&& unlink($file_path)) {
            
            return redirect()->back()->with('message', 'Đã xóa thành công');
            }
        else{
            return view('admin.page.dashboard')->with('fail', 'Thêm mới thất bại');
        }
    }
}
