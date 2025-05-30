<?php include 'app/views/shares/header.php'; ?>

<h1>Danh sách sản phẩm</h1>
<a href="/webbanhang/Product/add" class="btn btn-success mb-2">Thêm sản phẩm mới</a>

<ul class="list-group">
    <?php foreach ($products as $product): ?>
        <li class="list-group-item">
            <h2>
                <a href="/webbanhang/Product/list/<?php echo $product->id; ?>">
                    <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                </a>
            </h2>

            <p><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>

            <p>Giá: <?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?></p>

            <a href="/webbanhang/Product/edit/<?php echo $product->id; ?>" class="btn btn-warning">Sửa</a>

            <a href="/webbanhang/Product/delete/<?php echo $product->id; ?>"
               class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</a>
        </li>
        <style>
/* General form styling */
/* General Page Styling */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f9fa;
    margin-top: 20px;
}

/* Container for the content */
.container {
    max-width: 900px;
    margin: 0 auto;
    padding: 15px;
}

/* Header Styling */
h1 {
    color: #007bff;
    font-size: 36px;
    font-weight: 600;
    margin-bottom: 30px;
}

/* Product List Styling */
.list-group {
    list-style-type: none;
    padding: 0;
}

.list-group-item {
    background-color: #fff;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.3s ease;
}

.list-group-item:hover {
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
}

.product-link {
    text-decoration: none;
    color: #007bff;
    transition: color 0.3s ease;
}

.product-link:hover {
    color: #0056b3;
}

.price {
    font-size: 18px;
    font-weight: 500;
    color: #333;
}

.product-actions {
    display: flex;
    gap: 10px;
}

/* Button Styling */
.btn {
    font-size: 14px;
    padding: 8px 16px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.btn-sm {
    padding: 5px 10px;
}

/* Success Button */
.btn-success {
    background-color: #28a745;
    border-color: #28a745;
    color: white;
}

.btn-success:hover {
    background-color: #218838;
    border-color: #1e7e34;
}

/* Warning Button */
.btn-warning {
    background-color: #ffc107;
    border-color: #ffc107;
    color: #212529;
}

.btn-warning:hover {
    background-color: #e0a800;
    border-color: #d39e00;
}

/* Danger Button */
.btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
    color: white;
}

.btn-danger:hover {
    background-color: #c82333;
    border-color: #bd2130;
}

/* Text Right (for the "Add New Product" button) */
.text-right {
    text-align: right;
}

/* Responsive Design for Mobile */
@media (max-width: 768px) {
    .container {
        padding: 10px;
    }

    h1 {
        font-size: 28px;
    }

    .btn {
        font-size: 12px;
    }

    .product-actions {
        flex-direction: column;
        gap: 5px;
    }
}

</style>
    <?php endforeach; ?>
   
</ul>

<?php include 'app/views/shares/footer.php'; ?>
