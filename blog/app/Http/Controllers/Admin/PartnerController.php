<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddPartnerRequest;
use App\Http\Requests\EditPartnerRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Partner;
class PartnerController extends Controller
{
	public function index(){
		$data = Partner::paginate(1);

		return view('admin.partner.index', compact('data'));

	}

    public function showFormEdit($id){
    	$data = Partner::find($id);
    	return view('admin.partner.edit', compact('data'));
    }

    public function Update($id, EditPartnerRequest $request)
    {
    	$find = Partner::find($id);
    	$image= $find->image;
		$file_path = public_path().'/uploads/partners/'.$image;

    	$title = $request->title;
		$image = $request->image;
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
                if($file->move(public_path('uploads/partners/'),$namefile)){
                    $checkUpload = true;
                }
            }
        }
        if(!$checkUpload && $namefile == ''){

            return redirect()->route('admin.partner.dashboard')->with('fail', 'Moi chon lai file');
        } else {
            // insert data
          $update = [
				'title' => $title,
				'content' => $contentPd,
				'image' => $namefile,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => null
			];
			
            if(DB::table('partners')->where('id', $id)->update($update)&& unlink($file_path)){
                // dd('thanh cong');
                return redirect()->route('admin.partner.dashboard')->with('message', 'Them thành công');
            } else {
                return redirect()->route('admin.partner.edit')->with('fail', 'Thêm mới thất bại');
            }
        }

    }
	public function addAbout()
	{
		return view('admin.partner.add');
	}

	public function add(AddPartnerRequest $request){
		$title = $request->title;
		$image = $request->image;
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
				if($file->move(public_path('uploads/partners/'),$namefile)){
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
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => null
			];

			if(DB::table('partners')->insert($dataInsert)){
                // dd('thanh cong');
				return redirect()->route('admin.partner.dashboard')->with('message', 'Them thành công');
			} else {
				return redirect()->route('admin.partner.addAbout')->with('fail', 'Thêm mới thất bại');
			}
		}
	}
	public function destroy($id){
		$delete = Partner::find($id);
		$image= $delete->image;
		$file_path = public_path().'/uploads/partners/'.$image;
		if ($delete->delete()&& unlink($file_path)) {

			return redirect()->back()->with('message', 'Đã xóa thành công');
		}
		else{
			return view('admin.page.dashboard')->with('fail', 'Thêm mới thất bại');

		}
	}
}
