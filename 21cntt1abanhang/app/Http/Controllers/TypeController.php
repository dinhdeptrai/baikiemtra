<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Typeproduct;
use App\Models\Product;

class TypeController extends Controller
{
    //
    public function getTypeList(){
        $type_products=Typeproduct::orderBy('created_at', 'desc')->get();
        return view('admin.typeproducts.danhsach',compact('type_products'));
    }
    public function getTypeAdd(){
        $type_products=Typeproduct::all();
        return view('admin.typeproducts.them',compact('type_products'));
    }
    public function postTypeAdd(Request $request){
        $name='';
        if($request->hasfile('image')){
            $this->validate($request,[
                'image'=>'mimes:jpg,png,gif,jpeg|max: 2048',
                'name'=>'required',
                'description'=>'required',
            ],[
                'image.mimes'=>'Chỉ chấp nhận file hình ảnh',
                'image.max'=>'Chỉ chấp nhận hình ảnh dưới 2Mb',
                'name.required'=>'Bạn chưa nhập mô tả',
                'description.required'=>'Bạn chưa nhập mô tả',

            ]);
            $file = $request->file('image');
            $name=time().'_'.$file->getClientOriginalName();
            $destinationPath=public_path('/source/image/product'); //project\public\car, public_path(): trả về đường dẫn tới thư mục public
            $file->move($destinationPath, $name); //lưu hình ảnh vào thư mục public/car
        }
        else{
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
        ],[
            'name.required'=>'Bạn chưa nhập mô tả',
            'description.required'=>'Bạn chưa nhập mô tả',
        ]);
        }
        $type_products=new Typeproduct();
        $type_products->name=$request->name;
        $type_products->description=$request->description;
        $type_products->image=$name;
        $type_products->save();
        return redirect()->route('admin.getTypeList')->with('success','Bạn đã thêm thành công!');  
    }
    public function getTypeDelete(string $id){
        $type_products = Typeproduct::find($id);
        $type_products->delete();
        return redirect()->route('admin.getTypeList')->with('success','Bạn đã xóa thành công!');
    }
    public function getTypeEdit(string $id){
        $type_products=Typeproduct::where('id',$id)->get();
        $typeproduct=Typeproduct::all();
        return view('admin.typeproducts.sua',array('products'=>$type_products),compact('typeproduct','type_products'));
    }
    public function postTypeEdit(Request $request, string $id){
        $name='';
        if($request->hasfile('image')){
            $this->validate($request,[
                'image'=>'mimes:jpg,png,gif,jpeg|max: 2048',
                'name'=>'required',
                'description'=>'required',
            ],[
                'image.mimes'=>'Chỉ chấp nhận file hình ảnh',
                'image.max'=>'Chỉ chấp nhận hình ảnh dưới 2Mb',
                'name.required'=>'Bạn chưa nhập mô tả',
                'description.required'=>'Bạn chưa nhập mô tả',

            ]);
            $file = $request->file('image');
            $name=time().'_'.$file->getClientOriginalName();
            $destinationPath=public_path('/source/image/product'); //project\public\car, public_path(): trả về đường dẫn tới thư mục public
            $file->move($destinationPath, $name); //lưu hình ảnh vào thư mục public/car
        }
        else{
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
        ],[
            'name.required'=>'Bạn chưa nhập mô tả',
            'description.required'=>'Bạn chưa nhập mô tả',
        ]);
        }
        $type_products=Typeproduct::find($id);
        $type_products->name=$request->name;
        $type_products->description=$request->description;
        if($name=='')
        {
            $name=$type_products->image;
        }
        $type_products->image=$name;
        
        $type_products->save();
        return redirect()->route('admin.getTypeList')->with('success','Bạn đã sữa thành công!');  
    }
}
