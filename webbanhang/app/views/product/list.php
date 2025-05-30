<?php include 'app/views/shares/header.php'; ?>

<!-- Heading -->
<h1 class="text-center my-4">Danh sách sản phẩm</h1>

<!-- Button to add new product -->
<div class="text-center mb-4">
    <a href="/webbanhang/Product/add" class="btn btn-success">Thêm sản phẩm mới</a>
</div>

<!-- Product List -->
<div class="container">
    <div class="row">
        <?php foreach ($products as $product): ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <!-- Product Image -->
                    <?php if ($product->image): ?>
                        <img src="/webbanhang/<?php echo $product->image; ?>" class="card-img-top" alt="Product Image" style="max-height: 400px; object-fit: cover;">
                    <?php endif; ?>

                    <div class="card-body">
                        <!-- Product Name -->
                        <h5 class="card-title">
                            <a href="/webbanhang/Product/show/<?php echo $product->id; ?>" class="text-decoration-none text-dark">
                                <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                            </a>
                        </h5>
                        
                        <!-- Product Description -->
                        <p class="card-text"><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>

                        <!-- Product Price -->
                        <p class="text-muted">Giá: <?php echo number_format($product->price, 0, ',', '.'); ?> VND</p>

                        <!-- Product Category -->
                        <p class="text-muted">Danh mục: <?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?></p>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-between align-items-center">
    <a href="/webbanhang/Product/edit/<?php echo $product->id; ?>" 
       class="btn btn-warning btn-sm mx-1" 
       title="Sửa sản phẩm">
       <i class="fas fa-edit me-1"></i> Sửa
    </a>

    <a href="/webbanhang/Product/show/<?php echo $product->id; ?>" 
       class="btn btn-info btn-sm mx-1" 
       title="Xem chi tiết sản phẩm">
       <i class="fas fa-eye me-1"></i> Xem
    </a>

    <a href="/webbanhang/Product/addToCart/<?php echo $product->id; ?>" 
       class="btn btn-primary btn-sm mx-1" 
       title="Thêm vào giỏ hàng">
       <i class="fas fa-shopping-cart me-1"></i> Thêm
    </a>

    <a href="/webbanhang/Product/delete/<?php echo $product->id; ?>" 
       class="btn btn-danger btn-sm mx-1" 
       onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');" 
       title="Xóa sản phẩm">
       <i class="fas fa-trash me-1"></i> Xóa
    </a>
</div>

</div>

</div>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
