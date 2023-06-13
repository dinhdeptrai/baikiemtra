<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Typeproduct;
use App\Models\Product;

class CategoryController extends Controller
{
    //
    public function getCateList(){
        $products=Product::orderBy('created_at', 'desc')->get();
        return view('admin.category.danhsach',compact('products'));
    }
    public function getCateAdd(){
        $products=Typeproduct::all();
        return view('admin.category.them',compact('products'));
    }
    public function postCateAdd(Request $request){
        $name='';
        if($request->hasfile('image')){
            $this->validate($request,[
                'image'=>'mimes:jpg,png,gif,jpeg|max: 2048',
                'name'=>'required',
                'description'=>'required',
                'unit_price'=>'required|numeric',
                'promotion_price'=>'required|numeric',
            ],[
                'image.mimes'=>'Chỉ chấp nhận file hình ảnh',
                'image.max'=>'Chỉ chấp nhận hình ảnh dưới 2Mb',
                'name.required'=>'Bạn chưa nhập mô tả',
                'description.required'=>'Bạn chưa nhập mô tả',
                'unit_price.required'=>'Bạn chưa nhập giá tiền',
                'unit_price.numeric'=>'Giá tiền phải là kiểu số',
                'promotion_price.required'=>'Bạn chưa nhập giá giảm',
                'promotion_price.numeric'=>'Giá giảm phải là kiểu số',

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
            'unit_price'=>'required|numeric',
            'promotion_price'=>'required|numeric',
        ],[
            'name.required'=>'Bạn chưa nhập mô tả',
            'description.required'=>'Bạn chưa nhập mô tả',
            'unit_price.required'=>'Bạn chưa nhập giá tiền',
            'unit_price.numeric'=>'Giá tiền phải là kiểu số',
            'promotion_price.required'=>'Bạn chưa nhập giá giảm',
            'promotion_price.numeric'=>'Giá giảm phải là kiểu số',
        ]);
        }
        $products=new Product();
        $products->name=$request->name;
        $products->id_type=$request->id_type;
        $products->description=$request->description;
        $products->unit_price=$request->unit_price;
        $products->promotion_price=$request->promotion_price;
        $products->image=$name;
        $products->unit=$request->unit;
        $myCheckboxValue = $request->input('new');
        if ($myCheckboxValue == '1') {
            $products->new = 1;
        } else {
            $products->new = 0;
        }
        $products->save();
        return redirect()->route('admin.getCateList')->with('success','Bạn đã thêm thành công!');  
    }
    public function getCateDelete(string $id){
        $products = Product::find($id);
        $products->delete();
        return redirect()->route('admin.getCateList')->with('success','Bạn đã xóa thành công!');
    }
    public function getCateEdit(string $id){
        $products=Product::where('id',$id)->get();
        $typeproduct=Typeproduct::all();
        return view('admin.category.sua',array('products'=>$products),compact('typeproduct'));
    }
    public function postCateEdit(Request $request, string $id){
        $name='';
        if($request->hasfile('image')){
            $this->validate($request,[
                'image'=>'mimes:jpg,png,gif,jpeg|max: 2048',
                'name'=>'required',
                'description'=>'required',
                'unit_price'=>'required|numeric',
                'promotion_price'=>'required|numeric',
            ],[
                'image.mimes'=>'Chỉ chấp nhận file hình ảnh',
                'image.max'=>'Chỉ chấp nhận hình ảnh dưới 2Mb',
                'name.required'=>'Bạn chưa nhập mô tả',
                'description.required'=>'Bạn chưa nhập mô tả',
                'unit_price.required'=>'Bạn chưa nhập giá tiền',
                'unit_price.numeric'=>'Giá tiền phải là kiểu số',
                'promotion_price.required'=>'Bạn chưa nhập giá giảm',
                'promotion_price.numeric'=>'Giá giảm phải là kiểu số',

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
            'unit_price'=>'required|numeric',
            'promotion_price'=>'required|numeric',
        ],[
            'name.required'=>'Bạn chưa nhập mô tả',
            'description.required'=>'Bạn chưa nhập mô tả',
            'unit_price.required'=>'Bạn chưa nhập giá tiền',
            'unit_price.numeric'=>'Giá tiền phải là kiểu số',
            'promotion_price.required'=>'Bạn chưa nhập giá giảm',
            'promotion_price.numeric'=>'Giá giảm phải là kiểu số',
        ]);
        }
        $products=Product::find($id);
        $products->name=$request->name;
        $products->id_type=$request->id_type;
        $products->description=$request->description;
        $products->unit_price=$request->unit_price;
        $products->promotion_price=$request->promotion_price;
        if($name=='')
        {
            $name=$products->image;
        }
        $products->image=$name;
        $products->unit=$request->unit;
        $myCheckboxValue = $request->input('new');
        if ($myCheckboxValue == '1') {
            $products->new = 1;
        } else {
            $products->new = 0;
        }
        $products->save();
        return redirect()->route('admin.getCateList')->with('success','Bạn đã sữa thành công!');  
    }
}
