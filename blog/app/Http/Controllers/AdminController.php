<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Models\Product;

class AdminController extends Controller
{
    public function index()
    {
    	$data = Product::paginate(5);

    	return view('ckfinder.index', compact('data'));
    }

    public function getadd(){
    	return view('ckfinder.add');
    }

    public function add(AdminRequest $request){
    	$insert = new Product;
    	$insert->name = $request->name;
    	$insert->phone = $request->phone;

    	if ($insert->save()) {
    		return redirect()->route('dashboard')->with('message',  'add thanh cong');
    	}
    	else
    	{
    		return redirect()->route('dashboard')->with('fail', 'add khong thanhf cong');
    	}
    }
}
