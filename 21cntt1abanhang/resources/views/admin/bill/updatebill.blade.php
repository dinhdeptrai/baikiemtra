@extends('admin.bill.layouts.master')
@section('content3')
<div class="container">
    @isset($bill)
        @php
            $i=1;
        @endphp
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 30%;" >Chủ đề</th>
                    <th style="width: 70%;">Nội dung</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tên khách hàng</td>
                    <td>{{$bill[0]->customer->name}}</td>
                </tr>
                <tr>
                    <td>Giới tính</td>
                    <td>{{$bill[0]->customer->gender}}</td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td>{{$bill[0]->customer->address}}</td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td>{{$bill[0]->customer->phone_number}}</td>
                </tr>
                <tr>
                    <td>Ghi chú</td>
                    <td>{{$bill[0]->note}}</td>
                </tr>
                @isset($billdetail)
                    @foreach($billdetail as $billdetail)
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Sản phẩm {{$i}}</td>
                        <td>{{$billdetail->product->name}}</td>
                    </tr>
                    <tr>
                        <td>Số lượng</td>
                        <td>{{$billdetail->quantity}}</td>
                    </tr>
                    <tr>
                        <td>Hình ảnh</td>
                        <td><img src="{{ asset('/source/image/product/'.$billdetail->product->image) }}" class="img-thumbnail" alt="" width="200px" height="100px"/></td>
                    </tr>
                    <tr>
                        <td>Giá tiền</td>
                        <td>{{$billdetail->unit_price}} VNĐ</td>
                    </tr>
                    @php
                        $i=$i+1;
                    @endphp
                    @endforeach
                @endisset
                <tr>
                    <td>Thành tiền</td>
                    <td>{{$bill[0]->total}} VNĐ</td>
                </tr>
                <tr>
                    <td>Phương thức thanh toán</td>
                    <td>
                        @if($bill[0]->payment=="COD")
                            Tiền mặt
                        @else
                            Chuyển khoảng
                        @endif
                    </td>
                </tr>
                <form action="{{ route('admin.updateBillStatusAjax', ['id' => $bill[0]->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <tr>
                        <td >Trang thái</td>
                        <td>
                            <select class="form-control" style="width: 30%;" name="status" id="">
                                @if($bill[0]->status == "đang chuẩn bị hàng")
                                    <option value="đang chuẩn bị hàng" selected>Đang chuẩn bị hàng</option>
                                    <option value="đang giao hàng">Đang giao hàng</option>
                                    <option value="đã giao hàng">Đã giao hàng</option>
                                    <option value="đã hủy đơn hàng">Đã hủy đơn hàng</option>
                                @elseif($bill[0]->status == "đang giao hàng")
                                    <option value="đang chuẩn bị hàng">Đang chuẩn bị hàng</option>
                                    <option value="đang giao hàng" selected>Đang giao hàng</option>
                                    <option value="đã giao hàng">Đã giao hàng</option>
                                    <option value="đã hủy đơn hàng">Đã hủy đơn hàng</option>
                                    @elseif($bill[0]->status == "đã hủy đơn hàng")
                                    <option value="đang chuẩn bị hàng">Đang chuẩn bị hàng</option>
                                    <option value="đang giao hàng" >Đang giao hàng</option>
                                    <option value="đã giao hàng">Đã giao hàng</option>
                                    <option value="đã hủy đơn hàng" selected>Đã hủy đơn hàng</option>
                                @else
                                    <option value="đang chuẩn bị hàng">Đang chuẩn bị hàng</option>
                                    <option value="đang giao hàng">Đang giao hàng</option>
                                    <option value="đã giao hàng" selected>Đã giao hàng</option>
                                    <option value="đã hủy đơn hàng">Đã hủy đơn hàng</option>
                                @endif
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button type="submit" class="btn btn-primary">Xác nhận</button></td>
                    </tr>
                </form>
            </tbody>
        </table>
    @endisset
</div>
@endsection