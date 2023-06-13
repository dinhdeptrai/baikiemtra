@extends('admin.bill.layouts.master')

@section('content3')
    <br>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        <br>
    @endif
    <div>
        <form class="form-inline" method="GET" action="{{ route('admin.getLhList', ['trangthai' => 'trangthai']) }}">
            <label for="">Trạng thái</label>&nbsp;&nbsp;
            <select class="form-control" name="trangthai" id="">
                @if(isset($status))
                    @if($status == "Đã liên hệ")
                        <option value="Đã liên hệ" selected>Đã liên hệ</option>
                        <option value="Chưa liên hệ">Chưa liên hệ</option>
                    @elseif($status == "Chưa liên hệ")
                        <option value="Đã liên hệ" selected>Đã liên hệ</option>
                        <option value="Chưa liên hệ">Chưa liên hệ</option>
                    @else
                        <option value="Đã liên hệ" selected>Đã liên hệ</option>
                        <option value="Chưa liên hệ">Chưa liên hệ</option>
                    @endif
                @else
                    <option value="Đã liên hệ" selected>Đã liên hệ</option>
                    <option value="Chưa liên hệ">Chưa liên hệ</option>
                @endif
            </select>&nbsp;&nbsp;
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <br>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>STT</th>
                    <th>Tên khách hàng</th>
                    <th>Trạng thái</th>
                    <th colspan="2">Cài đặt</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i=1;
                    $listcontacts=[];
                    if(isset($contactsstatus))
                        $listcontacts=$contactsstatus;
                    else
                        $listcontacts=$contacts;
                @endphp
                @isset($listcontacts)
                    @foreach($listcontacts as $bill)
                        <tr>
                            <td>{{ $i; }}</td>
                            <td>{{ $bill->name ?? 'N/A' }}</td>
                            <td>{{ $bill->trangthai }}</td>
                            <td>
                                <a href="{{ route('admin.updateLhStatus', ['id' => $bill->id, 'trangthai' => $bill->trangthai]) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-cog"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('admin.cancelLh', ['id' => $bill->id]) }}" method="post" enctype="multipart/form-data">
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
