<style>
    .navbar {
        background-color: #17a2b8;
    }

    .navbar-brand {
        color: #fff;
        font-family: "Arial", sans-serif;
        font-size: 24px;
        font-weight: bold;
    }

    .navbar-nav .nav-link {
        color: #fff;
        font-family: "Arial", sans-serif;
        font-size: 16px;
    }

    .navbar-nav .nav-link:hover {
        color: #fff;
        background-color: #138496;
    }

    .btn-outline-light {
        border-color: #fff;
        color: #fff;
    }

    .btn-outline-light:hover {
        background-color: #fff;
        color: #17a2b8;
    }
</style>

<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="#">Tên Trang Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.getCateList') }}">Quản lý sản phẩm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.getUserList') }}">Quản lý người dùng</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.listBillAll') }}">Quản lý hóa đơn</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.getBannerList') }}">Quản lý banner</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.getTypeList') }}">Quản lý loại sản phẩm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.listLhAll') }}">Quản lý liên hệ</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="get" action="{{ route('admin.postLogin') }}">
            @csrf
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">
                <i class="fas fa-sign-out-alt"></i> Đăng xuất
            </button>
        </form>
    </div>
</nav>
