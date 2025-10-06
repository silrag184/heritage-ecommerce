<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productView(){
        return view('admin-panel.pages.product.index');
    }

    public function productAdd(){
        return view('admin-panel.pages.product.add');
    }

    public function productStore(Request $request){
        return view('admin-panel.pages.product.add');
    }


}
