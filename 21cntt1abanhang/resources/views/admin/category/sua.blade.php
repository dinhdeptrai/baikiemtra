@extends('admin.category.layouts.master')
@section('content1')
    <br>
    <div class="container">
        <h1>Sữa sản phẩm</h1>
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
        @isset($products) 
        <form action="{{route('admin.postCateEdit',$products[0]->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put') 
            <div class="form-group">
                <label for="uname">Tên sản phẩm</label>
                <input type="text" class="form-control" id="name" value="{{isset($products[0]->name)?$products[0]->name:''}}" name="name"/>
            </div>
            <div class="form-group">
                <label for="">Loại sản phẩm</label>
                <select class="form-control" name="id_type" id="">  
                    <option value="{{$products[0]->Typeproduct->id}}">{{$products[0]->Typeproduct->name}}</option>
                    @isset($typeproduct)
                        @foreach($typeproduct as $type)
                            @if($type->id != $products[0]->id)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                            @endif
                        @endforeach
                    @endisset
                </select>
            </div>
            <div class="form-group">
              <label for="">Mô tả</label>
              <textarea class="form-control" name="description" id="" rows="3">{{ isset($products[0]->description)?$products[0]->description:'' }}</textarea>
            </div>
            <div class="form-group">
                <label for="uname">Giá tiền</label>
                <input type="number" class="form-control" id="name" value="{{isset($products[0]->unit_price)?$products[0]->unit_price:''}}" name="unit_price"/>
            </div>
            <div class="form-group">
                <label for="uname">Giá sau khi giảm</label>
                <input type="number" class="form-control" id="name" value="{{isset($products[0]->promotion_price)?$products[0]->promotion_price:''}}" name="promotion_price"/>
            </div>
            <div class="form-group">
              <label for="">Hình ảnh</label>
              <input type="file" class="form-control-file" name="image" id="" onchange="previewImage(this);" />
              Hình ảnh trước khi đổi: <img src="{{ asset('/source/image/product/'.$products[0]->image) }}" width="200" height="100" class="img-thumbnail"/>  Hình ảnh sau khi đổi:<img id="preview"width="200" height="100" class="img-thumbnail"/>
            </div>
            <div class="form-group">
              <label for="">Đơn vị</label>
              <input type="text" class="form-control" id="name" value="{{isset($products[0]->unit)?$products[0]->unit:''}}" name="unit"/>
            </div>
            <div class="form-group">
                <label for="">Sản phẩm: </label>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="new" id="new" value="1" {{ $products[0]->new == '1' ? 'checked' : '' }}> Sản phẩm mới
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Sữa sản phẩm</button>
        </form>
        @endisset
    </div>
@endsection
<script src="{{asset('source/assets/dest/js/preview-img.js')}}"></script>