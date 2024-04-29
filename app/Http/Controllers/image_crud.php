<?php

namespace App\Http\Controllers;

use App\Models\image_crud as ModelsImage_crud;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class image_crud extends Controller
{
    public function index()
    {
        return view('product-list');
    }
    public function new_product(){
        return view('product-create');
    }
    public function product_store(Request $request){
        $request->validate([
            'Pname'=>'required',
            'Pimage'=>'required|image|mimes:png,jpg,jpeg'
        ]);
        $imageName = '';
        if($rImage = $request->file('Pimage') ){
            $imageName = date('dmy').'-'.uniqid().'.'.$rImage->getClientOriginalExtension();
            $rImage->move('images/products',$imageName);
        }
        ModelsImage_crud::create([
            'name'=>$request->Pname,
            'image'=>$imageName
        ]);

    }
}