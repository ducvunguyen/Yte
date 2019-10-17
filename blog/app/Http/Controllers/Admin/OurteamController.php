<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OurTeam;
use App\Http\Requests\AddOurteamRequest;
use App\Http\Requests\EditOurteamRequest;
use Illuminate\Support\Facades\DB;

class OurteamController extends Controller
{
    public function index(){
        $data = OurTeam::paginate(1);

         return view('admin.ourteam.index', compact('data'));
         
    }

    public function showFormEdit($id){
    	$data = OurTeam::find($id);
    	return view('admin.ourteam.edit', compact('data'));
    }

    public function Update($id, EditOurteamRequest $request)
    {
        $find = Partner::find($id);
        $image= $find->image;
        $file_path = public_path().'/uploads/ourteams/'.$image;

    	$name = $request->name;
        $image = $request->image;
        $position = $request->position;
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
                if($file->move(public_path('uploads/ourteams/'),$namefile)){
                    $checkUpload = true;
                }
            }
        }
        if(!$checkUpload && $namefile == ''){
            
            return redirect()->route('admin.about.dashboard')->with('fail', 'Moi chon lai file');
        } else {
            // insert data
            $update = [
                'name' => $name,
                'content' => $contentPd,
                'image' => $namefile,
                'position' => $position,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null
            ];
          
            if(DB::table('ourteams')->where('id', $id)->update($update)&&unlink($file_path)){
                // dd('thanh cong');
                return redirect()->route('admin.ourteam.dashboard')->with('message', 'Them thành công');
            } else {
                return redirect()->route('admin.ourteam.edit')->with('fail', 'Thêm mới thất bại');
            }
        }
    	
    }
    public function addAbout()
    {
        return view('admin.ourteam.add');
    }

    public function add(AddOurteamRequest $request){
       $name = $request->name;
        $image = $request->image;
        $position = $request->position;
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
                if($file->move(public_path('uploads/ourteams/'),$namefile)){
                    $checkUpload = true;
                }
            }
        }

        if(!$checkUpload && $namefile == ''){
            
            return redirect()->route('admin.about.dashboard')->with('fail', 'Moi chon lai file');
        } else {
            // insert data
            $dataInsert = [
                'name' => $name,
                'content' => $contentPd,
                'image' => $namefile,
                'position' => $position,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null
            ];
          
            if(DB::table('ourteams')->insert($dataInsert)){
                // dd('thanh cong');
                return redirect()->route('admin.ourteam.dashboard')->with('message', 'Them thành công');
            } else {
                return redirect()->route('admin.ourteam.addAbout')->with('fail', 'Thêm mới thất bại');
            }
        }
    }
    public function destroy($id){
        $delete = OurTeam::find($id);
        $image= $delete->image;
        $file_path = public_path().'/uploads/ourteams/'.$image;
        if ($delete->delete()&& unlink($file_path)) {
            
            return redirect()->back()->with('message', 'Đã xóa thành công');
            }
        else{
            return view('admin.page.dashboard')->with('fail', 'Thêm mới thất bại');
        }
    }
}
