<?php include 'app/views/shares/header.php'; ?>

<!-- Giỏ hàng -->
<div class="container my-5">
    <h1 class="text-center mb-4">Giỏ Hàng</h1>

    <?php if (!empty($cart)): ?>
        <div class="row">
            <div class="col-md-12">
                <ul class="list-group">
                    <?php foreach ($cart as $id => $item): ?>
                        <li class="list-group-item d-flex align-items-center shadow-sm mb-3">
                            <!-- Product Image -->
                            <?php if ($item['image']): ?>
                                <img src="/webbanhang/<?php echo $item['image']; ?>" alt="Product Image" style="max-width: 100px; height: auto;" class="mr-3">
                            <?php endif; ?>

                            <!-- Product Details -->
                            <div class="flex-grow-1">
                                <h5 class="mb-2"><?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?></h5>
                                <p><strong>Giá:</strong> <?php echo number_format($item['price'], 0, ',', '.'); ?> VND</p>
                                <p><strong>Số lượng:</strong> <?php echo htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8'); ?></p>
                            </div>

                            <!-- Delete Button -->
                            <a href="/webbanhang/Product/removeFromCart/<?php echo $id; ?>" class="btn btn-danger btn-sm ml-2" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?');">
                                Xóa
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <!-- Cart Summary -->
        <?php
$total = array_reduce($cart, function($carry, $item) {
    return $carry + $item['price'] * $item['quantity'];
}, 0);
?>
<div class="text-right mt-4">
    <h4>Tổng tiền: 
        <strong><?php echo number_format($total, 0, ',', '.'); ?> VND</strong>
    </h4>
</div>


        <!-- Action Buttons -->
        <div class="text-center mt-4">
            <a href="/webbanhang/Product" class="btn btn-secondary">Tiếp tục mua sắm</a>
            <a href="/webbanhang/Product/checkout" class="btn btn-primary">Thanh Toán</a>
        </div>

    <?php else: ?>
        <div class="text-center">
            <p>Giỏ hàng của bạn đang trống.</p>
            <a href="/webbanhang/Product" class="btn btn-primary">Tiếp tục mua sắm</a>
        </div>
    <?php endif; ?>

</div>

<?php include 'app/views/shares/footer.php'; ?>
