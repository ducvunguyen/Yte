<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Http\Requests\AddPackagePost;
use App\Http\Requests\EditPackagePost;
use Illuminate\Support\Facades\DB;

class PackagesController extends Controller
{
	public function showDataPackage(){
		$data = Package::paginate(5);
		return view('admin.package.index', compact('data'));
	}
	public function showDetailPackage($id){
		$data = Package::find($id)->first();

		return view('admin.package.detail', compact('data'));
	}
    public function showFormAddPackage()
    {
    	return view('admin.package.addpackage');
    }
    public function addPackage(AddPackagePost $request){
     	$dataInsert = new Package;
        $dataInsert->name = $request->name; 
        $dataInsert->address = $request->address; 
        $dataInsert->content = $request->content; 
        $dataInsert->date = $request->date;
        
        if ($dataInsert->save()) {
        	return redirect()->back()->with('message', 'Thêm thành công');
        }
        else{
        	return view('admin.page.login')->with('fail', 'Thêm mới thất bại');
        }   
    }

    public function showFormEditPackage($id, Request $request){	
    	$data = Package::find($id);
    	return view('admin.package.edit', compact('data'));
    }

    public function update($id, EditPackagePost $request)
    {
    	$dataUp = Package::find($id);
        $dataUp->name = $request->name; 
        $dataUp->address = $request->address; 
        $dataUp->content = $request->content; 
        $dataUp->date = $request->date;

        if ($dataUp->save()) {
        		return redirect()->route('admin.package.showPackage')->with('message', 'Sửa thành công');;
        }
        else{
        	return view('admin.package.showPackage')->with('fail', 'Thêm mới thất bại');
        }

    }

    public function destroy($id){
    	$delete = Package::find($id);
    	if ($delete->delete()) {

    		return redirect()->back()->with('message', 'Đã xóa thành công');
    	}
    	else{
        	return view('admin.page.login')->with('fail', 'Thêm mới thất bại');
        }
    }

}
