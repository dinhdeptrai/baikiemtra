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
        <a href="{{ route('admin.getTypeAdd') }}">
                <button type="button" class="btn btn-outline-primary">Thêm mới</button>
            </a>
        </div>
        <br>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Mô tả</th>
                    <th>Hình ảnh</th>
                    <th colspan='2'><center>Cài đặt</center></th>
                </tr>
            </thead>
            <tbody>
                @isset($type_products)
                    @php
                        $i=1;
                    @endphp
                    @foreach($type_products as $product)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td><img src="{{ asset('/source/image/product/'.$product->image) }}" alt="" width="100px" height="50px" /></td>
                            <td>
                                <a href="{{ route('admin.getTypeEdit', [$product->id]) }}">
                                    <button class="btn btn-outline-primary"><i class="fas fa-cog fa-lg"></i></button>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('admin.getTypeDelete', [$product->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-primary" type="submit"><i class="fa fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        @php
                            $i = $i + 1;
                        @endphp
                    @endforeach
                @endisset
            </tbody>
        </table>
    </div>
@endsection
