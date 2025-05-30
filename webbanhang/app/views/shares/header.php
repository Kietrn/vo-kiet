<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/webbanhang/Product/">Danh sách sản phẩm</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/webbanhang/Product/add">Thêm sản phẩm</a>
      </li>
    </ul>

    <!-- Giỏ hàng bên phải -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="/webbanhang/Product/Cart/">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1h1a.5.5 0 0 1 .485.379L2.89 5H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 14H4a.5.5 0 0 1-.491-.408L1.01 2H.5a.5.5 0 0 1-.5-.5zM3.14 6l1.25 6h7.22l1.25-6H3.14z"/>
            <path d="M5.5 16a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zm6 0a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
          </svg>
          <span id="cart-count" class="badge badge-pill badge-danger" style="display:none;">0</span>
        </a>
      </li>
    </ul>
  </div>
</nav>

<script>
  // Giả sử bạn lấy số lượng sản phẩm trong giỏ từ biến JS (ví dụ lấy từ API hoặc localStorage)
  // Thay số dưới đây thành số lượng thực tế
  const cartItemCount = 0; // Ví dụ: 0 để test ẩn badge, >0 để hiện badge

  const cartCountElem = document.getElementById('cart-count');
  if (cartItemCount > 0) {
    cartCountElem.textContent = cartItemCount;
    cartCountElem.style.display = 'inline-block'; // hiện badge
  } else {
    cartCountElem.style.display = 'none'; // ẩn badge khi = 0
  }
</script>
