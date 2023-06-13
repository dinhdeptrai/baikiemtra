@extends('admin.category.layouts.master')
@section('content1')
    <br>
    <div class="container">
        <h1>Sửa sản phẩm</h1>
        <br>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @isset($type_products) 
        <form action="{{route('admin.postTypeEdit',$type_products[0]->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put') 
            <div class="form-group">
                <label for="uname">Tên sản phẩm</label>
                <input type="text" class="form-control" id="name" value="{{isset($type_products[0]->name)?$type_products[0]->name:''}}" name="name"/>
            </div>
            
            <div class="form-group">
              <label for="">Mô tả</label>
              <textarea class="form-control" name="description" id="" rows="3">{{ isset($type_products[0]->description)?$type_products[0]->description:'' }}</textarea>
            </div>
            <div class="form-group">
              <label for="">Hình ảnh</label>
              <input type="file" class="form-control-file" name="image" id="" onchange="previewImage(this);" />
              Hình ảnh trước khi đổi: <img src="{{ asset('/source/image/product/'.$type_products[0]->image) }}" width="200" height="100" class="img-thumbnail"/>  Hình ảnh sau khi đổi:<img id="preview"width="200" height="100" class="img-thumbnail"/>
            </div>
            <button type="submit" class="btn btn-primary">Sửa sản phẩm</button>
        </form>
        @endisset
    </div>
@endsection
<script src="{{asset('source/assets/dest/js/preview-img.js')}}"></script>