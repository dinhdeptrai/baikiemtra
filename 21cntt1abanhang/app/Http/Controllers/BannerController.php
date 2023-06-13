<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Slide;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners=Slide::all();

        return view('admin.banner.listbanner',compact('banners'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $banner = DB::table('slide') ->where('id',$id)->get();

        return view('admin.banner.editbanner', array('banner' => $banner));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $name='';
        if($request->hasfile('image')){
            $this->validate($request,[
                'image'=>'mimes:jpg,png,gif,jpeg|max: 2048',
            ],[
                'image.mimes'=>'Chỉ chấp nhận file hình ảnh',
                'image.max'=>'Chỉ chấp nhận hình ảnh dưới 2Mb',
            ]);
            $file = $request->file('image');
            $name=time().'_'.$file->getClientOriginalName();
            $destinationPath=public_path('/source/image/slide');             
            $file->move($destinationPath, $name);
        }
        $banner=Slide::find($id);
        $banner->link=$request->link;
        if($name=='')
        {
            $name=$banner->image;
        }
        $banner->image=$name;
        $banner->save();
        return redirect()->route('admin.getBannerList')->with('success','Bạn đã sữa thành công!');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $banner=Slide::find($id);
        $banner->delete();
        return redirect()->route('admin.getBannerList')->with('success','Bạn đã xóa thành công!');
    }
    public function getBannerAdd(){
        $banners=Slide::all();
        return view('admin.banner.addbanner',compact('banners'));
    }
    public function postBannerAdd(Request $request){
        $name='';
        if($request->hasfile('image')){
            $this->validate($request,[
                'image'=>'mimes:jpg,png,gif,jpeg|max: 2048',
            ],[
                'image.mimes'=>'Chỉ chấp nhận file hình ảnh',
                'image.max'=>'Chỉ chấp nhận hình ảnh dưới 2Mb',

            ]);
            $file = $request->file('image');
            $name=time().'_'.$file->getClientOriginalName();
            $destinationPath=public_path('/source/image/slide'); 
            $file->move($destinationPath, $name);
        }
        $banners=new Slide();
        $banners->link=$request->link;
        $banners->image=$name;
        $banners->save();
        return redirect()->route('admin.getBannerList')->with('success','Bạn đã thêm thành công!');  
    }
}
