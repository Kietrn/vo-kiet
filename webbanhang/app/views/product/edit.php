<?php include 'app/views/shares/header.php'; ?>

<div class="container my-5" style="max-width: 700px;">
    <h1 class="mb-4 text-center">Sửa sản phẩm</h1>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="/webbanhang/Product/update" enctype="multipart/form-data" onsubmit="return validateForm();">
        <input type="hidden" name="id" value="<?php echo $product->id; ?>">

        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm:</label>
            <input type="text" id="name" name="name" class="form-control" 
                   value="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" 
                   required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Mô tả:</label>
            <textarea id="description" name="description" class="form-control" rows="4" required><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Giá:</label>
            <input type="number" id="price" name="price" class="form-control" step="0.01" 
                   value="<?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>" 
                   required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Danh mục:</label>
            <select id="category_id" name="category_id" class="form-select" required>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category->id; ?>" <?php echo ($category->id == $product->category_id) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-4">
            <label for="image" class="form-label">Hình ảnh:</label>
            <input type="file" id="image" name="image" class="form-control">
            <input type="hidden" name="existing_image" value="<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>">
            <?php if ($product->image): ?>
                <div class="mt-3">
                    <img src="/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>" alt="Product Image" style="max-width: 150px; border-radius: 8px; box-shadow: 0 0 8px rgba(0,0,0,0.1);">
                </div>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary w-100">Lưu thay đổi</button>
    </form>

    <a href="/webbanhang/Product" class="btn btn-secondary mt-3 d-block text-center">Quay lại danh sách sản phẩm</a>
</div>

<?php include 'app/views/shares/footer.php'; ?>
