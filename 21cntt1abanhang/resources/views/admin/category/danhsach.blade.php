@extends('admin.category.layouts.master')

@section('content1')
    <div>
        @if(session('success'))
            <br>
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <br>
        <div>
            <a href="{{ route('admin.getCateAdd') }}">
                <button type="button" class="btn btn-outline-primary">Thêm mới</button>
            </a>
        </div>
        <br>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Loại sản phẩm</th>
                    <th>Giá gốc</th>
                    <th>Giá giảm</th>
                    <th>Hình ảnh</th>
                    <th>Đơn vị</th>
                    <th>Sản phẩm mới</th>
                    <th colspan='2'> <center>Cài đặt</center></th>
                </tr>
            </thead>
            <tbody>
                @isset($products)
                    @php
                        $i=1;
                    @endphp
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->Typeproduct->name }}</td>
                            <td>{{ $product->unit_price }}</td>
                            <td>{{ $product->promotion_price }}</td>
                            <td>
                                <img src="{{ asset('/source/image/product/'.$product->image) }}" alt="" width="100px" height="50px"/>
                            </td>
                            <td>{{ $product->unit }}</td>
                            <td>
                                @if($product->new == '1')
                                    Sản phẩm mới
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.getCateEdit', [$product->id]) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-cog"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('admin.getCateDelete', [$product->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" type="submit">
                                        <i class="fa fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                @endisset
            </tbody>
        </table>
    </div>
@endsection
