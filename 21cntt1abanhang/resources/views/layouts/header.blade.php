
	<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i> 90-92 Lê Thị Riêng, Bến Thành, Quận 1</a></li>
						<li><a href=""><i class="fa fa-phone"></i> 0163 296 7751</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						<li><a href="#"><i class="fa fa-user"></i>Tài khoản</a></li>
						<li><a href="{{route('getsignin')}}">Đăng kí</a></li>
						<li><a href="{{route('admin.getLogin')}}">Đăng nhập</a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="index.html" id="logo"><img src="/source/assets/dest/images/logo-cake.png" width="200px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="/">
					        <input type="text" value="" name="s" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
					<div class="cart">
						<div class="beta-select">
							<i class="fa fa-shopping-cart"></i> Giỏ hàng (@if(Session::has('cart')){{Session('cart')->totalQty}}
							@else Trống @endif)<i class="fa fa-chevron-down"></i>
						</div>
						<div class="beta-dropdown cart-body">
							@isset($productCarts)
							@foreach($productCarts as $product)
							<div class="cart-item">
								<a class="cart-item-delete" href="{{route('banhang.xoagiohang',$product['item']->id) }}">
									<i class="fa fa-times"></i>
								</a>
								<div class="media">
									<a class="pull-left" href="#"><img src="/source/image/product/{{$product['item']->image}}"
											alt=""></a>
									<div class="media-body">
										<span class="cart-item-title">{{$product['item']->name}}</span>
										<span class="cart-item-options">Size: XS; Colar: Navy</span>
										<span class="cart-item-amount">{{$product['qty']}}*<span>{{$product['item']->promotion_price !=0 ? $product['item']->promotion_price : $product['item']->unit_price}}</span></span>
									</div>
								</div>
							</div>
							@endforeach
							@endisset
							<div class="cart-caption">
								<div class="cart-total text-right">Tổng tiền: <span
										class="cart-total-value">{{isset($totalPrice) ? $totalPrice : 0}}</span></div>
								<div class="clearfix"></div>

								<div class="center">
									<div class="space10">&nbsp;</div>
									<a href="{{route('banhang.getdathang')}}" class="beta-btn primary text-center">Đặt hàng <i
											class="fa fa-chevron-right"></i></a>
								</div>
							</div>
						</div>
					</div>

					<script>
						// shopping_cart.js

window.addEventListener('DOMContentLoaded', (event) => {
    // Gắn sự kiện cho nút "Update Cart"
    const updateCartButton = document.querySelector('.beta-btn.primary.text-center');
    updateCartButton.addEventListener('click', function () {
        updateCartItems();
    });
});

// Hàm cập nhật thông tin tất cả sản phẩm trong giỏ hàng
function updateCartItems() {
    const quantityInputs = document.querySelectorAll('select[name="product-qty"]');
    const cartTotalElement = document.querySelector('.cart-total-value');

    let cartTotal = 0;
    const productCarts = [];

    // Duyệt qua tất cả các phần tử select số lượng và cập nhật giỏ hàng
    quantityInputs.forEach(function (select) {
        const qty = parseInt(select.value);
        const price = parseFloat(select.dataset.price);
        const subtotal = qty * price;

        // Cập nhật tổng số tiền trong cột "Total"
        const subtotalElement = select.closest('.cart-item').querySelector('.cart-item-amount span');
        subtotalElement.textContent = subtotal.toFixed(2);

        // Tính tổng số tiền của giỏ hàng
        cartTotal += subtotal;

        // Lấy thông tin sản phẩm và số lượng
        const itemTitle = select.closest('.cart-item').querySelector('.cart-item-title').textContent;
        const itemOptions = select.closest('.cart-item').querySelector('.cart-item-options').textContent;
        const itemAmount = select.closest('.cart-item').querySelector('.cart-item-amount span').textContent;
        const cartItemData = {
            title: itemTitle,
            options: itemOptions,
            amount: itemAmount
        };
        productCarts.push(cartItemData);
    });

    // Cập nhật tổng số tiền của giỏ hàng
    cartTotalElement.textContent = cartTotal.toFixed(2);

    // Gửi yêu cầu AJAX để cập nhật thông tin giỏ hàng trên server
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '{{ route('update_cart') }}', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onload = function () {
        if (xhr.status === 200) {
            // Xử lý kết quả từ server (nếu cần)
        }
    };
    const cartData = {
        productCarts: productCarts,
        totalPrice: cartTotal
    };
    xhr.send(JSON.stringify(cartData));
}

					</script>
					<!-- .cart -->
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="/tc">Trang chủ</a></li>
						<li><a href="#">Sản phẩm</a>
							@if(Session::has('typeproduct'))
								@php
									$typeproduct = Session::get('typeproduct');
								@endphp
								<ul class="sub-menu">
									@foreach($typeproduct as $type)
										<li><a href="{{ route('producttype', $type->id) }}">{{$type->name }}</a></li>
									@endforeach
								</ul>
							@endif
						</li>
						<li><a href="/about">Giới thiệu</a></li>
						<li><a href="/contacts">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->