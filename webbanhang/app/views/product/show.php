<?php include 'app/views/shares/header.php'; ?>

<!-- Product Details -->
<div class="container my-5">
    <h1 class="text-center mb-4">Chi tiết sản phẩm</h1>

    <div class="row">
        <div class="col-md-6">
            <!-- Product Image -->
            <?php if ($product->image): ?>
                <img src="/webbanhang/<?php echo $product->image; ?>" class="img-fluid" alt="Product Image" style="max-height: 500px; object-fit: cover;">
            <?php else: ?>
                <p>Chưa có hình ảnh cho sản phẩm này.</p>
            <?php endif; ?>
        </div>

        <div class="col-md-6">
            <!-- Product Name -->
            <h2><?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?></h2>

            <!-- Product Description -->
            <p><strong>Mô tả:</strong> <?php echo nl2br(htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8')); ?></p>

            <!-- Product Price -->
            <p><strong>Giá:</strong> <?php echo number_format($product->price, 0, ',', '.'); ?> VND</p>

            <!-- Product Category -->
            <p><strong>Danh mục:</strong> <?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?></p>

            <!-- Action Buttons -->
            <div class="d-flex justify-content-start">
                <!-- Add to Cart Button -->
                <a href="/webbanhang/Product/addToCart/<?php echo $product->id; ?>" class="btn btn-primary mr-2">Thêm vào giỏ hàng</a>
                
                <!-- Edit Product Button (For admin) -->
                <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']): ?>
                    <a href="/webbanhang/Product/edit/<?php echo $product->id; ?>" class="btn btn-warning mr-2">Sửa</a>
                <?php endif; ?>

                <!-- Delete Product Button (For admin) -->
                <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']): ?>
                    <a href="/webbanhang/Product/delete/<?php echo $product->id; ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Back to product list -->
    <div class="text-center mt-4">
        <a href="/webbanhang/Product" class="btn btn-secondary">Quay lại danh sách sản phẩm</a>
    </div>

</div>

<?php include 'app/views/shares/footer.php'; ?>
