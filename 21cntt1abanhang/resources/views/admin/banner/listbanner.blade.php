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
            <a href="{{ route('admin.getBannerAdd') }}">
                <button type="button" class="btn btn-outline-primary">Thêm mới</button>
            </a>
        </div>
        <br>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>STT</th>
                    <th>Link</th>
                    <th>Image</th>
                    <th colspan='2'> <center>Cài đặt</center></th>
                </tr>
            </thead>
            <tbody>
                @isset($banners)
                    @php
                        $i=1;
                    @endphp
                    @foreach($banners as $banner)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $banner->Link }}</td>
                            <td>
                                <img src="{{ asset('/source/image/slide/'.$banner->image) }}" alt="" width="100px" height="50px"/>
                            </td>               
                            <td>
                                <a href="{{ route('admin.getBannerEdit', [$banner->id]) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-cog"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('admin.getBannerDelete', [$banner->id]) }}" method="post">
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
